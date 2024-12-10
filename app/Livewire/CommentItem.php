<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateComment;
use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;

    public CreateComment $form;

    public function replyComment()
    {
        $this->form->validate();

        $reply = $this->comment->replies()->make($this->form->only('body'));
        $reply->user()->associate(auth()->user());
        $reply->save();

        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.comment-item');
    }
}
