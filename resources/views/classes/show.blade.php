
<x-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6">Klasse Details</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">{{ $class->name }}</h2>
            <p class="mb-2"><strong>Beschrijving:</strong> {{ $class->description }}</p>
            <p class="mb-2"><strong>Capaciteit:</strong> {{ $class->capacity }}</p>
            <p class="mb-2"><strong>Beschikbaarheid:</strong> {{ $class->is_available ? 'Beschikbaar' : 'Niet Beschikbaar' }}</p>
            <p class="mb-2"><strong>Rooster:</strong> {{ $class->roster->term ?? 'N/A' }} {{ $class->roster->year ?? '' }}</p>
            <p class="mb-2"><strong>Lesuur:</strong> {{ $class->roster->lesson_hour ?? 'N/A' }}</p>
            <p class="mb-2"><strong>Klasnummer:</strong> {{ $class->roster->class_number ?? 'N/A' }}</p>

            <a href="{{ route('classrooms') }}" class="text-blue-500 hover:underline mt-4 inline-block">Terug naar Klassen Overzicht</a>
        </div>
    </div>
</x-layout>