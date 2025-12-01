<x-guest-layout>

<h1 class="text-2xl font-bold mb-4">Modules</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
    @foreach($modules as $module)
        <a href="{{ route('module.show', $module) }}" class="block border rounded p-4 bg-white shadow hover:bg-gray-50">
            <h2 class="text-lg font-semibold">{{ $module->naam }}</h2>
            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($module->beschrijving, 80) }}</p>
        </a>
    @endforeach
</div>

</x-guest-layout>
