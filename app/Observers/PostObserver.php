<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        /* Esta condicion se utiliza ya que si usamos los seeders no puede crear el post desde aqui si no desde la consola entonces esta parte da error
        por lo tanto si no creamos el post desde la consola ! \App::runningInConsole si utiliza  $post->user_id = auth()->user()->id;*/
        if (! App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
    
        if ($post->image) {
            Storage::disk('public_images')->delete($post->image->url);
        }

    }
}
