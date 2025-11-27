<x-guest-layout>

<h1>Nieuw Vak Aanmaken</h1><br>

<form method="POST" action="{{ route('vak.store') }}">
    @csrf

    <label>Naam:</label><br>
    <input type="text" name="naam" required><br>

    <label>Beschrijving:</label><br>
    <textarea name="beschrijving"></textarea><br>

    <label>Afbeelding (URL):</label><br>
    <input type="text" name="afbeelding"><br>

    <br><button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">Opslaan</button>
</form>

</x-guest-layout>

