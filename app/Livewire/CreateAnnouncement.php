<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

    public function store()
    {
        Announcement::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
    }
    public function render()
    {
        return view('livewire.create-announcement');
    }
}
