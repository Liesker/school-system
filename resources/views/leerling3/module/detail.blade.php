<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">{{ $module->naam }}</h1>

<p class="mb-4">{{ $module->beschrijving }}</p>

@if($module->afbeelding)
    <img src="{{ $module->afbeelding }}" class="w-64 rounded shadow mb-4">
@endif

<h2 class="text-xl font-semibold mt-6 mb-2">Opdrachten</h2>

<ul class="list-disc ml-5">
    @foreach($module->opdrachten as $opdracht)
        <li>{{ $opdracht->naam }}</li>
    @endforeach
</ul>

</x-guest-layout>
