<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Presences</title>
	<meta name="viewport" content="width=device-width,initial-scale=1" />
</head>
<body>
	<h1 style="margin:0 0 12px 0;font-size:18px">Presences</h1>

	@if(isset($presences) && $presences->count())
		<table>
			<thead>
				<tr>
					<th>Date</th>
					<th>Time</th>
					<th>Status</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				@foreach($presences as $presence)
					<tr>
						<td>{{ $presence->date }}</td>
						<td>{{ $presence->time }}</td>
						<td class="small">{{ ucfirst($presence->option ?? '') }}</td>
						<td class="small">{{ $presence->description ?? '-' }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="empty">No presences found.</div>
	@endif
</body>
</html>
