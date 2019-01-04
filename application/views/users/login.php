<?php echo form_open('users/login'); ?>
<div class="row">
		<div class="col-5 mx-auto">
			<h1 class="text"><?php echo $title; ?></h1>
			<br>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Login" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Hasło" required autofocus>
			</div>
			<button type="submit" class="btn btn-dark btn-block">Login</button>
		</div>
<?php echo form_close(); ?>