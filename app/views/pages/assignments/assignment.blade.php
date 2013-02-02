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

	<input type="submit" value="Create" class="btn">
</form>