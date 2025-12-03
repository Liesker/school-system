<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Studiegids Bewerken</h1>

<form method="POST" action="{{ route('gids.update', $gids) }}" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="font-semibold block">Naam</label>
        <input type="text" name="naam" required value="{{ $gids->naam }}" 
            class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold block">Beschrijving</label>
        <textarea name="beschrijving" class="w-full border rounded px-3 py-2">{{ $gids->beschrijving }}</textarea>
    </div>

    <div>
        <label class="font-semibold block">Jaar</label>
        <input type="number" name="jaar" value="{{ $gids->jaar }}" class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="font-semibold block">Koppel aan Vakken</label>
        <div class="space-y-2">
            @foreach($vakken as $vak)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" 
                           name="vak_ids[]" 
                           value="{{ $vak->id }}" 
                           @checked(in_array($vak->id, $selected))>
                    <span>{{ $vak->naam }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <button class="bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded">
        Bijwerken
    </button>
</form>

</x-guest-layout>
