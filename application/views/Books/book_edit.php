<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Update Subject</h1>
	<?php
		// echo "<pre>";
		// print_r($data);
		//exit();
	?>
	<form method="post"  action="<?php echo site_url()."books/update"?>">
		<input type="hidden" name="editid" value="<?php echo $data['0']->book_id; ?>">
		<div class="form-group">
			<label>Book Name</label>
			<input type="text" name="bookname" required="required" value="<?php echo $data['0']->book_name; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>ISBN Number</label>
			<input type="number" name="isbn" value="<?php echo $data['0']->isbn; ?>" required="required"  class="form-control">
		</div>
		<div class="form-group">
			<label>Subject</label>
			<select class="form-control" required="required" name="subject">
				<option value="">Select One</option>
				<?php
					foreach ($subjects as $subject) {
				?>

				<option value="<?php echo $subject->subject_id?>" <?php 
				if ($data['0']->subject_id==$subject->subject_id) {
				 	echo "selected";
				 }  ?>><?php echo $subject->subject_name?></option>

				<?php
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Author</label>
			<select class="form-control" required="required" name="author">
				<option value="">Select One</option>
				<?php
					foreach ($authors as $author) {
				?>

				<option value="<?php echo $author->author_id?>" <?php 
				if ($data['0']->author_id==$author->author_id) {
				 	echo "selected";
				 }  ?>><?php echo $author->author_name?></option>

				<?php
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Publisher</label>
			<select class="form-control" required="required" name="publisher">
				<option value="">Select One</option>
				<?php
					foreach ($publishers as $publisher) {
				?>

				<option value="<?php echo $publisher->publisher_id?>" <?php 
				if ($data['0']->publisher_id==$publisher->publisher_id) {
				 	echo "selected";
				 }  ?>><?php echo $publisher->publisher_name?></option>

				<?php
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Quantity</label>
			<input type="number" value="<?php echo $data['0']->quantity; ?>" name="quantity" required="required"  class="form-control">
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>