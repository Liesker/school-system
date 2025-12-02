<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Opdrachten Beheer</h1>

<a href="{{ route('opdracht.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
    + Nieuwe Opdracht
</a>

<table class="table-auto border border-collapse border-gray-300 w-full">
    <thead>
        <tr class="bg-gray-100">
            <th class="border p-2 text-left">Naam</th>
            <th class="border p-2 text-left">Module</th>
            <th class="border p-2 text-left">Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($opdrachten as $opdracht)
            <tr class="hover:bg-gray-50">
                <td class="border p-2">{{ $opdracht->naam }}</td>
                <td class="border p-2">{{ $opdracht->module->naam }}</td>
                <td class="border p-2 flex space-x-2">
                    <a href="{{ route('opdracht.edit', $opdracht) }}" class="px-3 py-1 bg-orange-500 text-white rounded hover:bg-orange-600">Bewerken</a>
                    <form method="POST" action="{{ route('opdracht.destroy', $opdracht) }}" onsubmit="return confirm('Weet je zeker dat je deze opdracht wilt verwijderen?');">
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
