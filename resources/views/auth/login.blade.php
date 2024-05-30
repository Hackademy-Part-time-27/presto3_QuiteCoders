<x-layout title="Accedi">
    <!--
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1>Accedi con il tuo Account</h1>

            <div class="mt-5">
                <form action="/login" method="POST">
                    @csrf
                    <div class="row g-3 spa">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12" >
                            <button type="submit" class="btn btn-primary">Accedi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
-->

<div class="scrol"></div>

<div class="login-box">
 
 <form action="/login" method="POST">
 @csrf
   <div class="user-box">
     <input type="email" name="email" id="email" value="{{ old('email') }}">
     <label for="email">Email</label>
     @error('email') <span class="small text-danger">{{ $message }}</span> @enderror</span>
   </div>
   <div class="user-box">
    <input type="password" name="password" id="password">
     <label for="password" class="label">Password</label>
     @error('password') <span class="small text-danger">{{ $message }}</span> @enderror</span>
   </div>

   <button class="btn bianco " type="submit"><a>Accedi<span></span></a></button>
   
   <a class="m-0" href="/register">Registrati</a></span>
 </form>
</div>

<div class="scrol"></div>


</x-layout>