<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Si a laravel collective le pasamos un objeto no va a entender el tipo de dato por eso no podemos pasar
        Category::all() ya que pasa los valores en formato objeto {} pluck genera un array y sólo toma el valor del campo name y además 
        hay que indicarle que propiedad del objeto es la llave, en este caso id*/
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all();
        
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* 
        StorePostRequest es una regla de validación personalizada.
     */
    public function store(PostRequest $request)
    {        
        $post = Post::create($request->all());

        /* Si se está enviando una imagen la guardamos */
        if ($request->file('file')) {

            /* Guardamos la imagen en la carpeta public/images/posts */
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = 'posts';        
            $url = Storage::disk('public_images')->put($path, $file);

            $post->image()->create([
                'url' => $url
            ]);
        }

        /* Guardamos las imagenes que estan en CKEDIOR */
        if (isset($request['body']) && !empty($request['body'])) {
            $re_extractImages = '/src=["\']([^ ^"^\']*)["\']/ims';
            preg_match_all($re_extractImages, $request['body'], $matches);
            $images = $matches[1];
        
            $post->image()->createMany(
                collect($images)->map(function ($image) use ($post) {
                    $imageName = pathinfo($image, PATHINFO_BASENAME);
                    $imageUrl = 'posts/' . $post->id . '/' . $imageName;
        
                    return [
                        'url' => $imageUrl,
                    ];
                })->toArray()
            );
        }


        /* Para crear el valor de tags tabla de muchos a muchos utilizamos attach
            attach entiende que debe guardar el id del post junto con los id de las etiquetas tags
            en la tabla posts_tags
        */
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Publicación creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        /* Creamos una policy:  Si el usuario es el autor del post, se le permite 
        realizar la acción de actualizar. Si no es el autor, se le deniega el permiso y se le niega la acción. */
        $this->authorize('author', $post);

        $post->update($request->all());

        /* Si se está enviando una imagen la guardamos */
        if ($request->file('file')) {

            /* Guardamos la imagen en la carpeta public/images/posts */
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = 'posts';        
            $url = Storage::disk('public_images')->put($path, $file);

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

        return redirect()->route('admin.posts.index')->with('success', 'Publicación actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /* Creamos una policy:  Si el usuario es el autor del post, se le permite 
        realizar la acción de eliminar. Si no es el autor, se le deniega el permiso y se le niega la acción. */
        $this->authorize('author', $post);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Publicación eliminada correctamente');
    }
}
