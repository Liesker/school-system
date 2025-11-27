<x-guest-layout>

<h1>Vak Bewerken: {{ $vak->naam }}</h1><br>

<form method="POST" action="{{ route('vak.update', $vak) }}">
    @csrf
    @method('PUT')

    <label>Naam:</label><br>
    <input type="text" name="naam" value="{{ $vak->naam }}" required><br>

    <label>Beschrijving:</label><br>
    <textarea name="beschrijving">{{ $vak->beschrijving }}</textarea><br>

    <label>Afbeelding:</label><br>
    <input type="text" name="afbeelding" value="{{ $vak->afbeelding }}"><br>

    <br><button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">Bijwerken</button>
</form>

</x-guest-layout>

