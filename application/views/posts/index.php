<h2 class="text"><?= $title ?> </h2>

<?php foreach ($posts as $post) : ?> 

		<h3 class= "navbar-brand"><?php echo $post['title']; ?></h3>
		<small class = "post-date">Kategoria: <strong><?php echo $post['name']; ?></strong> </small>
		<p class = "paragraph" ><?php echo word_limiter($post['body'],75 ); ?></p>

		<p><a class= "btn btn-dark" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></p>

	<?php endforeach; ?>
