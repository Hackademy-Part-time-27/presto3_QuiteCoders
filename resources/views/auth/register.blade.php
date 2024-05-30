<x-layout title="Registrati">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="scrol"></div>
            <!--

            <div class="mt-5">
                <form action="/register" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            @error('name') <span class="small text-danger">{{ $message }}</span> @enderror
                        </div>
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
                        <div class="col-12">
                            <label for="password_confirmation">Conferma Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="col-12 spa">
                            <button type="submit" class="btn btn-primary">Registrati</button>
                        </div>
                    </div>
                </form>
            </div> -->


            <div class="login-box">
            
            <form action="/register" method="POST">
            @csrf
                <div class="user-box">
                     <input type="text" name="name" id="name" value="{{ old('name') }}">
                        @error('name') <span class="small text-danger">{{ $message }}</span> @enderror
                    <label for="name">Nome</label>
                </div>
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
            <div class="user-box">
                <input type="password" name="password_confirmation" id="password_confirmation">
                <label for="password_confirmation">Conferma Password</label>
            </div>

            <button class="btn bianco " type="submit"><a>Registrati<span></span></a></button>
            </form>
            </div>
        </div>
    </div>
    <div class="scrol"></div>

</x-layout>