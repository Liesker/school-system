<x-guest-layout>



    <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $gids->naam }}</h1>

    <p class="text-gray-700 mb-6">{{ $gids->beschrijving }}</p>

    @if($gids->jaar)
        <p class="text-sm text-gray-500 mb-4">Jaar: {{ $gids->jaar }}</p>
    @endif

    <h2 class="text-2xl font-semibold mb-4">Vakken in deze gids</h2>

    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
        @foreach($gids->vakken as $vak)
            <a href="{{ route('vak.show', $vak) }}"
               class="block p-4 bg-blue-50 rounded-lg border border-blue-200 shadow hover:bg-blue-100 transition">
                <h3 class="font-bold text-blue-800">{{ $vak->naam }}</h3>
                <p class="text-blue-700 text-sm">{{ Str::limit($vak->beschrijving, 60) }}</p>
            </a>
        @endforeach
    </div>


</x-guest-layout>
