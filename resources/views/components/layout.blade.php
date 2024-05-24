<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Nunito+Sans:opsz,wght@6..12,700&family=Oswald:wght@500&family=PT+Serif&family=Whisper&display=swap" rel="stylesheet">
    
</head>
<body class="pt-serif-regular">
    <x-navbar />

    <div class="container mt-5">
        {{ $slot }}
    </div>
    {{ $extra ?? '' }}   
    
    

    <x-footer />
    @livewireScripts
</body>
</html>