@if($question->exists)
	<h1>Edit Question</h1>
@else
	<h1>Create Question</h1>
@endif


<form method="POST" action="{{ Request::url() }}" accept-charset="utf-8">
	<div class="control-group">
		<div class="controls">
			<textarea name="question" class="span6" rows="5" placeholder="Question">{{ Input::old('question') }}</textarea>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<select name="type" class="question-type">
				<option selected="selected" disabled="disabled">Type</option>
				<option value="multiple">Multiple Choice</option>
				<option value="checkboxes">Checkboxes</option>
				<option value="short">Short Answer</option>
				<option value="response">Response</option>
			</select>
		</div>
	</div>

	<div id="multiple" style="display:none;">
		<p class="muted">* The student is presented multipe choices, but only one is correct.</p>

		<table class="table table-striped table-bordered" style="display:none;">
			<thead>
				<tr>
					<th>Answer</th>
					<th>Correct</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody class="multiple-answers">

			</tbody>
		</table>

		<a href="#" class="add-answer btn">Add Answer</a>
	</div>

	<div id="checkboxes" style="display:none;">
		<p class="muted">* The student is presented multiple choices, of which one or more may be correct.<p> 
		<table class="table table-striped table-bordered" style="display:none;">
			<thead>
				<tr>
					<th>Answer</th>
					<th>Correct</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody class="checkboxes-answers">

			</tbody>
		</table>

		<a href="#" class="add-answer btn">Add Answer</a>
	</div>

	<div id="short" style="display:none;">
		<p class="muted">* The student must type in an answer. Anything but the correct answer will be marked incorrect.</p>

		<input type="text" name="answer" placeholder="Correct Answer">
	</div>

	<div id="response" style="display:none;">
		<p class="muted">* The student may write anything. The teacher must read the student's response and manually grade it.</p>
	</div>

	<input type="submit" value="Save" class="btn">
</form>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
	var currentType;
	var id = 0;

	$('.question-type').change(function()
	{
		$('#multiple').hide();
		$('#checkboxes').hide();
		$('#short').hide();
		$('#response').hide();

		currentType = this.value;

		$('#'+this.value).show();
	});

	$('.add-answer').click(function()
	{
		$('.table').show();

		var element = currentType+'-answers';
		var type;

		if(currentType == 'multiple')
		{
			type = 'radio';
		}

		else
		{
			type = 'checkbox';
		}

		$('.'+element).append('<tr class="answer-'+type+'-'+id+'"><td><input type="text" name="'+type+'-answer-'+id+'" placeholder="Value"></td><td><input type="'+type+'" name="'+type+'-answer" value="answer-'+id+'"></td><td><a href="#" class="btn btn-danger" onclick="removeAnswer(\''+type+'-'+id+'\')">Remove</a></tr>');
	
		id += 1;
	});

	function removeAnswer(element)
	{
		$('.answer-'+element).remove();
	}
</script>