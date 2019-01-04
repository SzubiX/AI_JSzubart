<h2 class="text"><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <b><label> Tytuł</label></b>
    <input type="text" class="form-control" name="title" placeholder="Dodaj tytuł">
  </div>
  <div class="form-group">
    <b><label>Twój wpis</label></b>
    <textarea id="editor1" class="form-control" name="body" placeholder="Dodaj Wpis"> </textarea>
  </div>
  <div class ="form-group">
  	<b><label>Kategoria</label></b>
  	<select name="category_id" class=form-control">
  		<?php foreach ($categories as $category): ?>
  			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
  		<?php endforeach; ?>	
    </select>
  </div>
  <button type="submit" class="btn btn-secondary">Dodaj wpis</button>
</form>