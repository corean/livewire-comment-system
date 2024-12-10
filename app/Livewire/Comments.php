<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateComment;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Comments extends Component
{
    public Model $model;

    public CreateComment $form;

    public function createComment()
    {
        $this->form->validate();

        $comment = $this->model->comments()->make($this->form->only('body'));
        $comment->user()->associate(auth()->user());
        $comment->save();

        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->model->comments()->latest()->get(),
        ]);
    }
}
