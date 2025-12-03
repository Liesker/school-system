<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Opdracht Bewerken: {{ $opdracht->naam }}</h1>

<form method="POST" action="{{ route('opdracht.update', $opdracht) }}" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Naam:</label>
        <input type="text" name="naam" value="{{ $opdracht->naam }}" required class="border rounded px-3 py-2 w-full">
    </div>

    <div>
        <label class="block font-semibold">Beschrijving:</label>
        <textarea name="beschrijving" class="border rounded px-3 py-2 w-full">{{ $opdracht->beschrijving }}</textarea>
    </div>

    <div>
        <label class="block font-semibold">Uitleg:</label>
        <textarea name="uitleg" class="border rounded px-3 py-2 w-full">{{ $opdracht->uitleg }}</textarea>
    </div>

    <div>
        <label class="block font-semibold">Module:</label>
        <select name="module_id" class="border rounded px-3 py-2 w-full" required>
            @foreach($modules as $module)
                <option value="{{ $module->id }}" @selected($opdracht->module_id == $module->id)>
                    {{ $module->naam }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">Bijwerken</button>
</form>

</x-guest-layout>
