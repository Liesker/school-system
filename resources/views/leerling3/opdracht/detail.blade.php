<x-guest-layout>


    <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $opdracht->naam }}</h1>
    <p class="text-gray-700 mb-4">{{ $opdracht->beschrijving }}</p>
    
    @if($opdracht->uitleg)
        <h2 class="text-xl font-semibold mb-2 text-gray-800">Uitleg:</h2>
        <p class="text-gray-700 mb-4">{{ $opdracht->uitleg }}</p>
    @endif

    <h2 class="text-xl font-semibold mb-2 text-gray-800">Module:</h2>
    <a href="{{ route('module.show', $opdracht->module) }}" 
       class="block p-4 bg-blue-50 rounded-lg border border-blue-200 shadow hover:bg-blue-100 transition">
        <h3 class="text-lg font-bold text-blue-800">{{ $opdracht->module->naam }}</h3>
        <p class="text-sm text-blue-700 mt-1">{{ Str::limit($opdracht->module->beschrijving, 60) }}</p>
    </a>


</x-guest-layout>
