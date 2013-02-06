<h2>Login</h2>

<form class="cms" method="post" action="/site/login">

	<? if($error) : ?>

		<div class="error">

			<p class="text-error">Your username or password are invalid. Stop trying to hack around dude.</p>

		</div>
		
	<? endif; ?>

	<label for="user">User:</label>
	<input type="text" name="user" id="user">

	<label for="password">Password:</label>
	<input type="password" name="password" id="password">

	<br>

	<input type="submit" value="Login" name="login" class="btn btn-inverse">

</form>