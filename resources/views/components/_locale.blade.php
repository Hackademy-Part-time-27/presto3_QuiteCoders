<form action="{{route('set_language_locale', $lang)}}" class="d-inline" method="post">
@csrf
<button type="submit" class="but">
    <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="32" height="32" alt="..."/>
</button>
</form>