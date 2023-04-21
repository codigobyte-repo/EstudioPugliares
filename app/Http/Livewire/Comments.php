<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $message;
    public $post_id;
    public $countComments = 0;
    public $replyingToCommentId = null;

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }

    public function render()
    {
        $comments = Comment::where('post_id', $this->post_id)->whereNull('parent_id')->get();
        $replies = Comment::where('post_id', $this->post_id)->whereNotNull('parent_id')->get();

        $this->countComments = $comments->count();
        
        return view('livewire.comments', [
            'comments' => $comments,
            'replies' => $replies,
        ]);
    }

    public function addComment()
    {
        $this->validate([
            'message' => 'required|min:3',
        ],
        [   
            'message.required' => 'Debe introducir una consulta',
            'message.min' => 'El campo mensaje debe contener al menos 5 caracteres.',
        ]);

        if ($this->replyingToCommentId) {
            $parentComment = Comment::findOrFail($this->replyingToCommentId);
    
            $parentComment->replies()->create([
                'message' => $this->message,
                'post_id' => $this->post_id,
                'user_id' => Auth()->User()->id,
            ]);
        } else {
            Comment::create([
                'message' => $this->message,
                'post_id' => $this->post_id,
                'user_id' => Auth()->User()->id,
            ]);
        }
    
        $this->message = '';
        $this->replyingToCommentId = null;
    
        session()->flash('message', 'Comentario agregado correctamente.');
    }

    public function replyTo($commentId)
    {
        $this->replyingToCommentId = $commentId;
    }
}
