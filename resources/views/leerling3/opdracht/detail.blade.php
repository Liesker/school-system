<x-guest-layout>

<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold mb-4">{{ $opdracht->naam }}</h1>
    <p class="text-gray-700 mb-4">{{ $opdracht->beschrijving }}</p>
    @if($opdracht->uitleg)
        <h2 class="text-xl font-semibold mb-2">Uitleg:</h2>
        <p class="text-gray-700 mb-4">{{ $opdracht->uitleg }}</p>
    @endif
    <p class="text-sm text-gray-500">Module: 
        <a href="{{ route('module.show', $opdracht->module) }}" class="text-blue-500 hover:underline">
            {{ $opdracht->module->naam }}
        </a>
    </p>
</div>

</x-guest-layout>
