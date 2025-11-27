<x-guest-layout>

    
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Vakken Overzicht
    </h2>
   

    <div class="py-6">
        @foreach($vakken as $vak)
            <div class="bg-white shadow rounded p-4 mb-4">
                <h3 class="text-lg font-bold">{{ $vak->naam }}</h3>
                <p>{{ $vak->beschrijving }}</p>
                <a href="{{ route('vak.show', $vak) }}" class="text-blue-500">Bekijk vak</a>
            </div>
        @endforeach
    </div>

</x-guest-layout>
