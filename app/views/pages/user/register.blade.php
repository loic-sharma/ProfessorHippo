<h1>Register</h1>

<form method="POST" action="{{ URL::to('register') }}" accept-charset="utf-8">
	<div class="control-group">
		<div class="controls">
			<input type="text" name="email" value="{{ Input::old('email') }}" placeholder="Email" class="input-large">
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<input type="password" name="password" placeholder="Password" class="input-large">
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<input type="password" name="password_confirmation" placeholder="Confirm Password" class="input-large">
		</div>
	</div>

	<input type="submit" value="Register" class="btn">
</form>