<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Mail\PostMaillable;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    
    /* Para aplicar permisos segun el rol y segun lo que puede realizar cada usuario aplicamos el middleware en cada método */
    public function __construct()
    {
        /* En este caso aplicamos el permiso sólo al index */
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        /* En este caso aplicamos el permiso sólo al edit y update */
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');

    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        /* Si a laravel collective le pasamos un objeto no va a entender el tipo de dato por eso no podemos pasar
        Category::all() ya que pasa los valores en formato objeto {} pluck genera un array y sólo toma el valor del campo name y además 
        hay que indicarle que propiedad del objeto es la llave, en este caso id*/
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();
        
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {        
        $post = Post::create($request->all());

        /* Si se está enviando una imagen la guardamos */
        if ($request->file('file')) {

            /* Guardamos la imagen en la carpeta public/images/posts */
            $file = $request->file('file');
            $path = 'posts';
            $url = Storage::disk('public_images')->put($path, $file);

            
            /* Intervention Image */
            $ruta = public_path('images/' . $url);

            $InterventionImg = Image::make($file);

            $InterventionImg->resize(1200, null, function ($constraint){
                $constraint->aspectRatio();
            });
            $InterventionImg->save($ruta);

            $post->image()->create([
                'url' => $url
            ]);
        }

        /* Guardamos las imagenes que estan en CKEDITOR */
        /* Este tramo funciona pero no reduce las imagenes de ckeditor, si lo cambiamos por el de abajo comentado funciona igual */
        if (isset($request['body']) && !empty($request['body'])) {
            $re_extractImages = '/src=["\']([^ ^"^\']*)["\']/ims';
            preg_match_all($re_extractImages, $request['body'], $matches);
            $images = $matches[1];
        
            foreach ($images as $image) {
                $imageName = pathinfo($image, PATHINFO_BASENAME);
                $imageUrl = 'posts/' . $post->id . '/' . $imageName;
        
                if (file_exists(public_path('images/' . $imageUrl))) {
                    $InterventionImg = Image::make(public_path('images/' . $imageUrl));
        
                    $InterventionImg->resize(1200, null, function ($constraint){
                        $constraint->aspectRatio();
                    });
        
                    $InterventionImg->save(public_path('images/' . $imageUrl));
                }
        
                $post->image()->create([
                    'url' => $imageUrl
                ]);
            }
        }
                
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        
        /* Si el estado del post es publicado mandamos el mail */
        if($request->get('status') == 2) {
            $this->envioMailsSubscriptores($request->get('name'),$request->get('slug'));
        }

        return redirect()->route('admin.posts.index')->with('success', 'Publicación creada correctamente');
    }

    /* Mandmaos mail a todos los subscriptores */
    public function envioMailsSubscriptores($name, $slug)
    {
        $count = Subscriber::count();

        if ($count > 0) {
            $subscriptores = Subscriber::all();
            
            foreach ($subscriptores as $subscriptor) {
                Mail::to($subscriptor->email)->send(new PostMaillable($name,$slug, $subscriptor->name));
            }
        }
    }

    public function edit(Post $post)
    {
        /* Creamos una policy:  Si el usuario es el autor del post, se le permite 
        realizar la acción de editar. Si no es el autor, se le deniega el permiso y se le niega la acción. */
        $this->authorize('author', $post);

        /* Si a laravel collective le pasamos un objeto no va a entender el tipo de dato por eso no podemos pasar
        Category::all() ya que pasa los valores en formato objeto {} pluck genera un array y sólo toma el valor del campo name y además 
        hay que indicarle que propiedad del objeto es la llave, en este caso id*/
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {

        /* Creamos una policy:  Si el usuario es el autor del post, se le permite 
        realizar la acción de actualizar. Si no es el autor, se le deniega el permiso y se le niega la acción. */
        $this->authorize('author', $post);

        $post->update($request->all());

        /* Si se está enviando una imagen la guardamos */
        if ($request->file('file')) {

            /* Guardamos la imagen en la carpeta public/images/posts */
            /* Guardamos la imagen en la carpeta public/images/posts */
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = 'posts';
            $url = Storage::disk('public_images')->put($path, $file);

            
            /* Intervention Image */
            $ruta = public_path('images/' . $url);

            $InterventionImg = Image::make($file);

            $InterventionImg->resize(1200, null, function ($constraint){
                $constraint->aspectRatio();
            });
            $InterventionImg->save($ruta);

            if ($post->image) {
                Storage::delete($post->image->url);
                
                $post->image()->update([
                    'url' => $url
                ]);
            }else{
                $post->image()->create([
                    'url' => $url
                ]);
            }

        }

        /* sync envía los id de la setiquetas a la taba post-tag pero si hay un duplicado no lo registra */
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        /* Si el estado del post es publicado mandamos el mail */
        if($request->get('status') == 2) {
            $this->envioMailsSubscriptores($request->get('name'),$request->get('slug'));
        }

        return redirect()->route('admin.posts.index')->with('success', 'Publicación actualizada correctamente');

    }

    public function destroy(Post $post)
    {
        /* Creamos una policy:  Si el usuario es el autor del post, se le permite 
        realizar la acción de eliminar. Si no es el autor, se le deniega el permiso y se le niega la acción. */
        $this->authorize('author', $post);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Publicación eliminada correctamente');
    }
}
