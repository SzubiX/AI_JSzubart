<h2 ><?php echo $post['title']; ?></h2>
<div class="post-body">
	<small class = "post-date">Data wstawienia: <?php echo $post['created_at']; ?> </small><br>
	<?php echo $post['body']; ?>
</div>

<hr>
<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
<a class= "btn btn-dark" href="<?php echo base_url();?>posts/edit/<?php echo $post['slug']; ?>">Edytuj</a>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
<input type="submit" value="Usuń" class="btn btn-danger">
</form>
<?php endif; ?>
