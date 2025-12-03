<x-layout>
	<div class="max-w-lg w-full mx-auto bg-white rounded-xl shadow-2xl p-8 mt-8">
		<h1 class="mb-6 text-2xl font-extrabold text-gray-800 text-center tracking-tight">Presence Details</h1>
		<div class="space-y-4">
			<div>
				<span class="font-semibold text-gray-700">Date:</span>
				<span class="ml-2 text-gray-900">{{ $presence->date }}</span>
			</div>
			<div>
				<span class="font-semibold text-gray-700">Time:</span>
				<span class="ml-2 text-gray-900">{{ $presence->time }}</span>
			</div>
			<div>
				<span class="font-semibold text-gray-700">Status:</span>
				<span class="ml-2 px-2 py-1 rounded-full font-medium
					@if($presence->option === 'present') bg-green-100 text-green-700
					@elseif($presence->option === 'absent') bg-red-100 text-red-700
					@else bg-gray-100 text-gray-700 @endif">
					{{ ucfirst($presence->option ?? '') }}
				</span>
			</div>
			<div>
				<span class="font-semibold text-gray-700">Description:</span>
				<span class="ml-2 text-gray-600">{{ $presence->description ?? '-' }}</span>
			</div>
		</div>
		<div class="mt-8 flex gap-3 justify-end">
			<a href="{{ route('presence.edit', $presence->id) }}" class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded hover:bg-yellow-200 text-sm font-semibold transition">Edit</a>
			<form action="{{ route('presence.destroy', $presence->id) }}" method="POST" class="inline">
				@csrf
				@method('DELETE')
				<button type="submit" onclick="return confirm('Are you sure you want to delete this presence?')" class="bg-red-100 text-red-700 px-4 py-2 rounded hover:bg-red-200 text-sm font-semibold transition">Delete</button>
			</form>
			<a href="{{ route('presence.index') }}" class="bg-blue-100 text-blue-700 px-4 py-2 rounded hover:bg-blue-200 text-sm font-semibold transition">Back</a>
		</div>
	</div>
</x-layout>
