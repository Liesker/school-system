<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Gidsen Beheer</h1>

<a href="{{ route('gids.create') }}" 
   class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
    + Nieuwe Gids
</a>

<table class="table-auto border border-collapse border-gray-300 w-full">
    <thead>
        <tr class="bg-gray-100">
            <th class="border p-2 text-left">Naam</th>
            <th class="border p-2 text-left">Jaar</th>
            <th class="border p-2 text-left">Vakken</th>
            <th class="border p-2 text-left">Acties</th>
        </tr>
    </thead>

    <tbody>
        @foreach($gidsen as $gids)
            <tr class="hover:bg-gray-50">
                
                <!-- Naam -->
                <td class="border p-2">
                    <a href="{{ route('gids.show', $gids) }}" 
                       class="text-blue-600 hover:underline">
                        {{ $gids->naam }}
                    </a>
                </td>

                <!-- Jaar -->
                <td class="border p-2">
                    {{ $gids->jaar ?? '—' }}
                </td>

                <!-- Vakken -->
                <td class="border p-2">
                    @if($gids->vakken->count() > 0)
                        <div class="flex flex-wrap gap-1">
                            @foreach($gids->vakken as $vak)
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-sm">
                                    {{ $vak->naam }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <span class="text-gray-500">Geen</span>
                    @endif
                </td>

                <!-- Acties -->
                <td class="border p-2 flex space-x-2">
                    
                    <!-- Bewerken knop -->
                    <a href="{{ route('gids.edit', $gids) }}" 
                       class="px-3 py-1 bg-orange-500 text-white rounded hover:bg-orange-600">
                        Bewerken
                    </a>

                    <!-- Verwijderen knop -->
                    <form method="POST" action="{{ route('gids.destroy', $gids) }}" 
                          onsubmit="return confirm('Weet je zeker dat je deze gids wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                            Verwijderen
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</x-guest-layout>
