<html>
<head>
	<title>Interfejs treningowy</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.min.css ">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
	<script src="http://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-secondary"> 
		<div class = "container">
			<font size= "4" face="Comic Sans MS" ><span class = navbar-brand"><img src="<?php echo base_url('assets/img/basketball.png'); ?>" width="90" height="60"> On Fire - Basketball Development </span></font>
		
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav mx-auto">
			<li class="list-inline-item">
			<strong><a href="<?php echo base_url(); ?>">Strona Główna</a></li>
			<li class="list-inline-item">
				<a href="<?php echo base_url(); ?>about">O nas</a></li>   
			<li class="list-inline-item">
				<a href="<?php echo base_url(); ?>posts">Blog</a></li>
			<?php if($this->session->userdata('logged_in')) : ?>
			<li class="list-inline-item">
				<a href="<?php echo base_url(); ?>posts/create"> Utwórz Wpis</a></li>
			<?php endif; ?>	
			</ul><br>
		</div> 
		<div class = "nav navbar-nav navbar-right">

			<?php if(!$this->session->userdata('logged_in')) : ?>
			<li class="list-inline-item">
				<a href="<?php echo base_url(); ?>users/login">Zaloguj się</a></li>
			<li class="list-inline-item">
				<a href="<?php echo base_url(); ?>users/register">Zarejestruj się</a></li>
			<?php endif; ?>	
			<?php if($this->session->userdata('logged_in')) : ?>
			<li class="list-inline-item">
				<a href="<?php echo base_url(); ?>users/logout">Wyloguj się</a></li>
				<?php endif; ?>	
		</div></strong>


	</div>


</nav>
<br>

<div class="container">
	<?php if($this->session->flashdata('user_registered')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_created')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_updated')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_deleted')): ?>
		<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('login_failed')): ?>
		<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedin')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_loggedout')): ?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
	<?php endif; ?>



