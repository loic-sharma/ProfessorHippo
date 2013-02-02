<h1>Assignments</h1>

@if(count($assignments) == 0)
	<p>You have no assignments. Make some!</p>
@else
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Questions</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $assignment->name }}</td>
				<td>{{ $assignment->timeAgo }}</td>
				<td>{{ $assignment->questions->count() }}</td>
				<td><a href="{{ URL::to('assignment/'.$assignment->id.'/delete') }}" class="btn danger">Delete</a></td>
		</tbody>
	</table>
@endif

<a href="{{ URL::to('assignment/create') }}" class="btn">Create Assignment</a>