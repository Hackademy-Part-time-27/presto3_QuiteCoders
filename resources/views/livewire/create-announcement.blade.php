<div>
    <h1>Crea il tuo annuncio!</h1>

    @if (session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{ session('message')}}
        </div>
    @endif

    <form wire:submit="store">
        @csrf

        <div class="mb-3">
            <label for="title">Titolo Annuncio</label>
            <input wire:model.live="title" type="text" class="form-control @error('title') is-invalid @enderror" >
            @error('title')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="body">Descrizione</label>
            <textarea wire:model.live="body" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price">Prezzo</label>
            <input wire:model.live="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror">
            @error('price')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category">Categoria</label>
            <select wire:model.defer="category" id="category" class="form-control">
                <option value="">Scegli la categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image">Inserisci un'immagine</label>
            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img">
            @error('temporary_images.*')
            <span class="text-danger">
                <p class="text-danger mt-2">{{ $message }}</p>
            </span>
            @enderror
        </div>
        @if (!empty($images))
        

        <div class="row">
            <div class="col-12 mb-3">
                <p>Photo preview:</p>
                    <div class="row border border-4 border-info rounded shadow py-4">
                        @foreach ($images as $key => $image)
                        <div class="col my-3">
                            <div class="img-preview mx-auto shadow rounded" style="background-image: url({{ $image->temporaryUrl() }})"></div>
                            <button class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{ $key }})">Cancella</button>
                        </div>
                        @endforeach
                    </div>            
            </div>
        </div>
        @endif
        
        <button wire:loading.attr="disabled" type="submit" class="btn btn-primary shadow px-4 py-2">Crea</button>

    </form>
</div>
