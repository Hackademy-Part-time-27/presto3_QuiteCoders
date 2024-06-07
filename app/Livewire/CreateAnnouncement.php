<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $image;
    public $form_id;
    public $announcement;

    
    protected $rules = [
        'title' =>'required|min:4|max:20',
        'body' =>'required|min:4|max:250',
        'category' =>'required',
        'price' =>'required|numeric',
    ];

    protected $messages = [
        'required' =>'Il campo :attribute è richiesto',
        'min' => 'Il campo :attribute deve contenere almeno 4 caratteri',
        'title.max' => 'Il campo :attribute deve contenere massimo 20 caratteri',
        'body.max' => 'Il campo :attribute deve contenere massimo 250 caratteri',
        'numeric' => 'Il campo :attribute dev\'essere un numero',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 1mb',
        'images.image' => 'L\'immagine dev\'essere un\'immagine',
        'images.max' => 'L\'immagine dev\'essere massimo di 1mb',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:3024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    protected $validationAttributes = [
        'title' => 'titolo',
        'body' => 'descrizione',
        'category' => 'categoria',
        'price' => 'prezzo',
    ];
    

    public function store()
    {
        
        $this->validate();
        /* $category = Category::find($this->category);
        
        $announcement = $category->announcements()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
        Auth::user()->announcements()->save($announcement);
        */

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if(count($this->images)) {
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path'=> $image->store('images', 'public')]);
                $newFileName ="announcements/{$this->announcement->id}";
                $newImage=$this->announcement->images()->create(['path'=> $image->store($newFileName , 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 400 , 267),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
                
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('message', 'Annuncio inserito con successo, sarà pubblicato dopo la revisione.');
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
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];
        $this->form_id = rand();
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
