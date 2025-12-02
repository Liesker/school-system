<x-guest-layout>

<h1 class="text-2xl font-bold mb-6">Studiegidsen</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
@foreach($gidsen as $gids)
    <a href="{{ route('gids.show', $gids) }}"
       class="block p-4 bg-white shadow rounded-lg border hover:bg-gray-50 transition">
        <h2 class="text-lg font-bold">{{ $gids->naam }}</h2>
        <p class="text-gray-600 text-sm">{{ Str::limit($gids->beschrijving, 80) }}</p>
    </a>
@endforeach
</div>

</x-guest-layout>
