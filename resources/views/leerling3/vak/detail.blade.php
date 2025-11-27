<x-guest-layout>

<h1>{{ $vak->naam }}</h1>

<p>{{ $vak->beschrijving }}</p><br>

@if($vak->modules->count() > 0)
    <h3>Modules:</h3>
    <ul>
        @foreach($vak->modules as $module)
            <li>{{ $module->naam }}</li>
        @endforeach
    </ul>
@endif


</x-guest-layout>

