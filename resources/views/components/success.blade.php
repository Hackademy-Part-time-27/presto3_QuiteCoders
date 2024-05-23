
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

.dropdown {

position: relative;
cursor: pointer;
}
.dropdown > .aa {
display: flex;
align-items: center;
gap: 2px;
height: 72px;
}

.dropdown .aa > .span { 
font-size: 20px;
color:rgb(255 255 255 / 24%); 
translate: 2px;
}
.menu {
position: absolute;
top: 60px;
right: -20px;
width: 180px; 
border-radius: 10px;
border:
    1px solid
    var(--color-border);
padding: 8px 0;
display: grid;
background: #181818;
opacity: 0;
visibility: hidden;
transition: 0.3s;
}

.dropdown:hover .menu { 
opacity: 1;
visibility: visible;
}
.menu::before { 
content:"";
position: absolute; 
background: inherit; 
border-top:
1px solid var(--color-border); 
border-right:
1px solid var(--color-border); 
top: -7px;
right: 22px;
width: 12px;
height: 12px;
rotate: -45deg;
}
.menu > .aa {
padding: 12px 20px; 
font-size: 14px;
}

.menu> .aa:hover {
background: rgb(255 255 255 / 4%);
}

<div class="container-fluid mt-4 p-5 bg-dark text-light">
    <div class="row">
        <div class="col-12 text-center">
            <p>Presto.it</p>
            <p>Vuoi lavorare con noi?</p>
            <p>Registrati e clicca qui!</p>
            <a href="{{ route('become.revisor') }}" class="btn btn-warning text-light shadow my-3">Diventa revisore!</a>
        </div>
    </div>
</div>