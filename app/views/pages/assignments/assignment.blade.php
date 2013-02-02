@if($assignment->exists)
	<h1>Edit Assignment</h1>
@else
	<h1>Create Assignment</h1>
@endif


<form method="POST" action="{{ Request::url() }}" accept-charset="utf-8">
	<div class="control-group">
		<div class="controls">
			<input type="text" name="name" value="{{ Input::old('Name', $assignment->name) }}" placeholder="Name" class="input-large">
		</div>
	</div>

	<input type="submit" value="Save" class="btn">
</form>

@if($assignment->exists)
	<h1>Manage Assignment Questions</h1>

	@if(count($assignment->questions) == 0)
		<p>This assignment has no questions! Why not make some?</p>
	@else
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Question</th>
					<th>Type</th>
					<td>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($assignment->questions as $question)
					<tr>
						<td>{{ $question->text }}</td>
						<td>{{ $question->type }}</td>
						<td>
							<a href="{{ URL::to('assignment/'.$assignment->id.'/delete/'.$question->id) }}" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif

	<a href="{{ URL::to('assignment/'.$assignment->id.'/create') }}" class="btn">Create Question</a>
@endif