<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row">
	<div class="col-5 mx-auto">
		<h1 class="text"><?= $title; ?></h1>
		<div class = "form-group">
			<strong><label>Name</label>
			<input type="text" class="form-control" name="Name" placeholder="Name">
			<label>Kod Pocztowy</label>
			<input type="text" class="form-control" name="zipcode" placeholder="Kod Pocztowy">
			<label>Email</label>
			<input type="email" class="form-control" name="email" placeholder="Email">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
			<label>Potwierdzenie hasła</label>
			<input type="password" class="form-control" name="password2" placeholder="Potwierdzenie hasła"></strong>
		</div>
		<button type="submit" class="btn btn-dark btn-block">Potwierdź</button>
	</div>
</div>
<?php echo form_close(); ?>