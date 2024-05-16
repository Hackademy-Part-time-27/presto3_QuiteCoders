<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

    
    protected $rules = [
        'title' =>'required|min:4',
        'body' =>'required|min:8',
        'price' =>'required|numeric',
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=> 'Il campo :attribute è troppo corto',
        'numeric'=> 'Il campo :attribute dev\'essere un numero',
    ];
    

    public function store()
    {
        $this->validate();
        Announcement::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
        session()->flash('message', 'Annuncio inserito con successo');
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
