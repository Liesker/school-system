<x-layout>
	<div class="max-w-lg w-full mx-auto bg-white rounded-xl shadow-2xl p-8 mt-8">
		<h1 class="mb-6 text-2xl font-extrabold text-gray-800 text-center tracking-tight">Edit Presence</h1>
		{{-- Show all errors at the top --}}
		@if ($errors->any())
			<div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
				<ul class="list-disc pl-5">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ route('presence.update', $presence->id) }}" method="POST" class="space-y-6">
			@csrf
			@method('PUT')
 			<div>
				<label class="block text-gray-700 font-semibold mb-1" for="date">Date</label>
				<input type="date" name="date" id="date" value="{{ old('date', $presence->date) }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
				@error('date')
					<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label class="block text-gray-700 font-semibold mb-1" for="time">Time</label>
				<input type="time" name="time" id="time" value="{{ old('time', $presence->time) }}" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
				<small class="text-gray-500">Format: HH:mm (e.g. 08:05)</small>
				@error('time')
					<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label class="block text-gray-700 font-semibold mb-1" for="option">Status</label>
				<select name="option" id="option" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
					<option value="present" @if(old('option', $presence->option) === 'present') selected @endif>Present</option>
					<option value="absent" @if(old('option', $presence->option) === 'absent') selected @endif>Absent</option>
				</select>
				@error('option')
					<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<label class="block text-gray-700 font-semibold mb-1" for="description">Description</label>
				<textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">{{ old('description', $presence->description) }}</textarea>
				@error('description')
					<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
				@enderror
			</div>
			<div class="flex gap-3 justify-end pt-4">
				<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold transition">Save</button>
			</div>
		</form>
	</div>
</x-layout>
