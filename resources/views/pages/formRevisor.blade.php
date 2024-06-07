<x-layout title="Diventa revisore">
@if (session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success">
            {{ session('message')}}
        </div>
    @endif

@if (Auth::user()->is_revisor)

<div class="text-center">
    <h2>Sei già revisore</h2>
</div>
@else

<h1>Lavora con noi</h1>
<div class="login-box">
 
 <form action="{{ route('become.revisor')}}" method="GET">
 @csrf
   <div class="user-box">
     <div class="py-4">
        <label for="email">Email</label>
     </div>
     <input class="form-control" disabled type="email" name="email" id="email" value="{{ auth()->user()->email }}">
    
     
     @error('email') <span class="small text-danger">{{ $message }}</span> @enderror</span>
   </div>
   

   <button class="btn bianco " type="submit"><a>Invia la tua candidatura<span></span></a></button>
   
  
 </form>
</div>

@endif
</x-layout>