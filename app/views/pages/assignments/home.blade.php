<h1>Assignments</h1>

@if(count($assignments) == 0)
	<p>You have no assignments. Make some!</p>
@else
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Key</th>
				<th>Date</th>
				<th>Questions</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($assignments as $assignment)
				<tr>
					<td>{{ $assignment->name }}</td>
					<td>{{ $assignment->id }}</td>
					<td>{{ $assignment->timeAgo }}</td>
					<td>{{ $assignment->questions->count() }}</td>
					<td><a href="{{ URL::to('assignments/'.$assignment->id.'/delete') }}" class="btn btn-danger">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<a href="{{ URL::to('assignments/create') }}" class="btn">Create Assignment</a>