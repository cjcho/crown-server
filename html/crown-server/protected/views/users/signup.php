<h2>Sign up</h2>

<p>Please fill out the form below to register your account.</p>

<form class="cms" method="post" action="/signup">

	<? if($success) : ?>

		<p class="text-info">Thank you for your information.</p>
		<a href="/login" class="btn btn-small">Login</a>

	<? else : ?>

		<? if($error != '') : ?>
			<p class="text-error"><?=$error;?></p>
		<? endif ; ?>

		<label for="email">Email:</label>
		<input type="text" name="email" id="email">

		<label for="name">Your full name:</label>
		<input type="text" name="name" id="name">

		<label for="password">Password:</label>
		<input type="password" name="password" id="password">

		<label for="password-confirmation">Confirm password:</label>
		<input type="password" name="password-confirmation" id="password-confirmation">

		<br>

		<input type="submit" value="Sign up" name="signup" class="btn btn-inverse">
		
		<a href="/login" class="muted btn-secondary">Log in</a>

	<? endif ; ?>

</form>