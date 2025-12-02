<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Opdrachten</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
    @foreach($opdrachten as $opdracht)
        <a href="{{ route('opdracht.show', $opdracht) }}" class="block border rounded p-4 bg-white shadow hover:bg-gray-50">
            <h2 class="text-lg font-semibold">{{ $opdracht->naam }}</h2>
            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($opdracht->beschrijving, 80) }}</p>
            <p class="text-xs text-gray-500 mt-1">Module: {{ $opdracht->module->naam }}</p>
        </a>
    @endforeach
</div>

</x-guest-layout>
