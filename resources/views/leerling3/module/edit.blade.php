<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Module Bewerken: {{ $module->naam }}</h1>

<form method="POST" action="{{ route('module.update', $module) }}" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Naam:</label>
        <input type="text" name="naam" value="{{ $module->naam }}" required class="border rounded px-3 py-2 w-full">
    </div>

    <div>
        <label class="block font-semibold">Beschrijving:</label>
        <textarea name="beschrijving" class="border rounded px-3 py-2 w-full">{{ $module->beschrijving }}</textarea>
    </div>

    <div>
        <label class="block font-semibold">Afbeelding:</label>
        <input type="text" name="afbeelding" value="{{ $module->afbeelding }}" class="border rounded px-3 py-2 w-full">
    </div>

    <div>
        <label class="block font-semibold">Vak:</label>
        <select name="vak_id" class="border rounded px-3 py-2 w-full" required>
            @foreach($vakken as $vak)
                <option value="{{ $vak->id }}" @selected($module->vak_id == $vak->id)>
                    {{ $vak->naam }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">
        Bijwerken
    </button>
</form>

</x-guest-layout>
