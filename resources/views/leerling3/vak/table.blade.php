<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Vakken Beheer</h1>

<a href="{{ route('vak.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">+ Nieuw Vak</a>


<table class="table-auto border border-collapse border-gray-300 w-full">
    <thead>
        <tr class="bg-gray-100">
            <th class="border p-2 text-left">Naam</th>
            <th class="border p-2 text-left">Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vakken as $vak)
            <tr class="hover:bg-gray-50">
                <td class="border p-2">{{ $vak->naam }}</td>
                <td class="border p-2 flex space-x-2">
                    <!-- Bewerken knop -->
                    <a href="{{ route('vak.edit', $vak) }}" class="px-3 py-1 bg-orange-500 text-white rounded hover:bg-orange-600">Bewerken</a>

                    <!-- Verwijderen knop -->
                    <form method="POST" action="{{ route('vak.destroy', $vak) }}" onsubmit="return confirm('Weet je zeker dat je dit vak wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Verwijderen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</x-guest-layout>
