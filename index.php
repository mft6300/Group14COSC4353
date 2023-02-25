<?php
include_once 'header.php';
include_once 'navbar.php';
?>
<div class="container d-flex justify-content-center align-items-center">
	<div class="card" style="width: 25rem">
		<div class="card-body">
			<div class="d-flex justify-content-center">
				<h5 class="card-title">Login</h5>
			</div>
			<form>
				<div class="form-outline mb-4">
					<input type="email" name="username" id="username" class="form-control" placeholder="Email address" required/>
				</div>
				
				<div class="form-outline mb-4">
					<input type="password" name="password" id="password"  class="form-control" placeholder="Password" required/>
				</div>
				
				<div class="row mb-4">
					<div class="col d-flex justify-content-center">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="rememberMe" checked />
						<label class="form-check-label" for="rememberMe"> Remember me </label>
					</div>
					</div>
				
					<div class="col">
					<a href="#!">Forgot password?</a>
					</div>
				</div>
				
				<div class="d-grid gap-2">
					<button type="button" class="btn btn-primary mb-4">Sign in</button>
				</div>
				<?php
				if (isset($_GET["error"])) {
				if ($_GET["error"] === "emptyinput") {
					echo "<p>Fill in all fields.</p>";
				} else if ($_GET["error"] === "wronglogin") {
					echo "<p>Wrong login information. Try again.</p>";
				} else if ($_GET["error"] === "stmtfailed") {
					echo "<p>Something went wrong. Try again.</p>";
				}
				}
				?>
				<div class="text-center">
					<p>Not a member? <a href="#!">Register</a></p>
				</div>
				</form>
		</div>
	</div>
</div>
<?php
include_once 'footer.php';
?>

