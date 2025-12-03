<x-guest-layout>


    <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $module->naam }}</h1>
    <p class="text-gray-700 mb-6">{{ $module->beschrijving }}</p>

    @if($module->afbeelding)
        <img src="{{ $module->afbeelding }}" class="w-full md:w-64 rounded shadow mb-6">
    @endif

    @if($module->opdrachten->count() > 0)
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Opdrachten:</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            @foreach($module->opdrachten as $opdracht)
                <a href="{{ route('opdracht.show', $opdracht) }}" 
                   class="block p-4 bg-blue-50 rounded-lg border border-blue-200 shadow hover:bg-blue-100 transition">
                    <h3 class="text-lg font-bold text-blue-800">{{ $opdracht->naam }}</h3>
                    <p class="text-sm text-blue-700 mt-1">{{ Str::limit($opdracht->beschrijving, 60) }}</p>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Er zijn nog geen opdrachten voor deze module.</p>
    @endif


</x-guest-layout>
