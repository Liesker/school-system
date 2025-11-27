/*create classroom page */
<x-layout>
    <div class="container" style="max-width:700px;margin:2rem auto;">
        <h1>Maak Nieuwe Klasse Aan</h1>

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
        <form method="POST" action="{{ url('/classrooms') }}">
            @csrf

            <div style="margin-bottom:0.75rem;">
                <label for="name">Naam</label><br>
                <input id="name" name="name" type="text" value="{{ old('name') }}" style="width:100%;padding:0.5rem;" />
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="description">Beschrijving</label><br>
                <textarea id="description" name="description" rows="4" style="width:100%;padding:0.5rem;">{{ old('description') }}</textarea>
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="capacity">Capaciteit</label><br>
                <input id="capacity" name="capacity" type="number" value="{{ old('capacity') }}" style="width:6rem;padding:0.5rem;" />
            </div>

            <div style="margin-top:1rem;">
                <button type="submit" style="padding:0.5rem 1rem;">Aanmaken</button>
                <a href="{{ url('/classrooms') }}" style="margin-left:1rem;">Annuleren</a>
            </div>
        </form>
    </div>

</x-layout>