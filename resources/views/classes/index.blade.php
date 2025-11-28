<x-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">Rooster – Klassen Overzicht</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <a href="{{ route('classrooms.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4">Nieuwe Klasse Aanmaken</a>
            </div>

            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-3">Naam</th>
                        <th class="px-4 py-3">Beschrijving</th>
                        <th class="px-4 py-3">Capaciteit</th>
                        <th class="px-4 py-3">Beschikbaarheid</th>
                        <th class="px-4 py-3">Rooster</th>
                        <th class="px-4 py-3">Lesuur</th>
                        <th class="px-4 py-3">Klasnummer</th>
                        <th class="px-4 py-3">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classes as $classroom)
                    <tr class="border-b">
                        <td class="px-4 py-3 font-medium">{{ $classroom->name }}</td>
                        <td class="px-4 py-3">{{ $classroom->description }}</td>
                        <td class="px-4 py-3">{{ $classroom->capacity }}</td>
                        <td>{{ $classroom->is_available ? 'Beschikbaar' : 'Niet Beschikbaar' }}</td>
                        <td class="px-4 py-3">
                            {{ $classroom->roster->term ?? 'N/A' }} {{ $classroom->roster->year ?? '' }}
                        
                        </td>
                        <td>
                            Lesuur: {{ $classroom->roster->lesson_hour ?? 'N/A' }}

                        </td>
                        <td>
                             Klasnummer: {{ $classroom->roster->class_number ?? 'N/A' }}
                        </td>

                        <td class="px-4 py-3">
                            <a href="{{ route('classrooms.show', $classroom->id) }}" class="text-blue-500 hover:underline">Bekijken</a>
                            <a href="{{ route('classrooms.edit', $classroom->id) }}" class="text-green-500 hover:underline ml-4">Bewerken</a>
                            <a href="{{ route('classrooms.delete', $classroom->id) }}" class="text-red-500 hover:underline ml-4">Verwijderen</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">Geen klassen gevonden.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>