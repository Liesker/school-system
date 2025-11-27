<h1>Vakken</h1>

@foreach($vakken as $vak)
    <div>
        <h3>{{ $vak->naam }}</h3>
        <p>{{ $vak->beschrijving }}</p>
        <a href="{{ route('vak.show', $vak) }}">Bekijk vak</a>
    </div>
@endforeach
