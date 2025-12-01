<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Vakken</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
    @foreach($vakken as $vak)
        <a href="{{ route('vak.show', $vak) }}" class="block border rounded p-4 bg-white shadow hover:bg-gray-50">
            <h2 class="text-lg font-semibold">{{ $vak->naam }}</h2>
            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($vak->beschrijving, 80) }}</p>
        </a>
    @endforeach
</div>

</x-guest-layout>
