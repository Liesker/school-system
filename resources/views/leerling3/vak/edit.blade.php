<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Vak Bewerken: {{ $vak->naam }}</h1>

<form method="POST" action="{{ route('vak.update', $vak) }}" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Naam:</label>
        <input type="text" name="naam" value="{{ $vak->naam }}" required class="border rounded px-3 py-2 w-full">
    </div>

    <div>
        <label class="block font-semibold">Beschrijving:</label>
        <textarea name="beschrijving" class="border rounded px-3 py-2 w-full">{{ $vak->beschrijving }}</textarea>
    </div>

    <div>
        <label class="block font-semibold">Afbeelding (URL):</label>
        <input type="text" name="afbeelding" value="{{ $vak->afbeelding }}" class="border rounded px-3 py-2 w-full">
    </div>

    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">
        Bijwerken
    </button>
</form>

</x-guest-layout>
