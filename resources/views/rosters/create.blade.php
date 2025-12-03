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
                <label for="classyear">Jaar</label><br>
                <input id="classyear" name="classyear" type="number" value="{{ old('classyear') }}" style="width:6rem;padding:0.5rem;" />
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="lesson_hour">Lesuur</label><br>
                <input id="lesson_hour" name="lesson_hour" type="number" value="{{ old('lesson_hour') }}" style="width:6rem;padding:0.5rem;" />
            </div>

            <div style="margin-bottom:0.75rem;">
                <label for="class_number">Klasnummer</label><br>
                <input id="class_number" name="class_number" type="number" value="{{ old('class_number') }}" style="width:6rem;padding:0.5rem;" />
            </div>

            <div style="margin-top:1rem;">
                <button type="submit" style="padding:0.5rem 1rem;">Aanmaken</button>
                <a href="{{ url('/rosters') }}" style="margin-left:1rem;">Annuleren</a>
            </div>
        </form>
    </div>
</x-layout>