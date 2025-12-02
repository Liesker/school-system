<x-guest-layout>



    <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $vak->naam }}</h1>
    <p class="text-gray-700 mb-6">{{ $vak->beschrijving }}</p>


    @if($vak->modules->count() > 0)
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Modules:</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            @foreach($vak->modules as $module)
                <a href="{{ route('module.show', $module) }}" 
                   class="block p-4 bg-blue-50 rounded-lg border border-blue-200 shadow hover:bg-blue-100 transition">
                    <h3 class="text-lg font-bold text-blue-800">{{ $module->naam }}</h3>
                    <p class="text-sm text-blue-700 mt-1">{{ Str::limit($module->beschrijving, 60) }}</p>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Geen modules beschikbaar voor dit vak.</p>
    @endif


</x-guest-layout>
 