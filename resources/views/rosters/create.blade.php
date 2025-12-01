/*create page */
<x-layout>
    <div class="container" style="max-width:700px;margin:2rem auto;">
        <h1>Maak Nieuw Rooster Aan</h1>

        @if ($errors->any())
        <div style="color:#b00020;margin-bottom:1rem;">
            <strong>Er zijn enkele problemen met uw invoer:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ url('/rosters') }}">
            @csrf

            <div style="margin-bottom:0.75rem;">
                <label for="term">Termijn</label><br>
                <input id="term" name="term" type="text" value="{{ old('term') }}" style="width:100%;padding:0.5rem;" />
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="year">Jaar</label><br>
                <input id="year" name="year" type="number" value="{{ old('year') }}" style="width:6rem;padding:0.5rem;" />
            </div>

            <div style="margin-top:1rem;">
                <button type="submit" style="padding:0.5rem 1rem;">Aanmaken</button>
                <a href="{{ url('/rosters') }}" style="margin-left:1rem;">Annuleren</a>
            </div>
        </form>
    </div>
</x-layout>