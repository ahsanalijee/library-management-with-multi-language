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
	<form method="post"  action="<?php echo site_url()."borrows/update"?>">
		<input type="hidden" name="editid" value="<?php echo $data['0']->book_id; ?>">
		<div class="form-group">
			<label>Member</label>
			<select class="form-control" required="required" name="member">
				<option value="">Select One</option>
				<?php
					foreach ($members as $member) {
				?>

				<option value="<?php echo $member->member_id?>" <?php 
				if ($data['0']->member_id==$member->member_id) {
				 	echo "selected";
				 }  ?>><?php echo $member->member_id." ".$member->member_name?></option>

				<?php
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Book</label>
			<select class="form-control" required="required" name="book">
				<option value="">Select One</option>
				<?php
					foreach ($books as $book) {
				?>

				<option value="<?php echo $book->book_id?>" <?php 
				if ($data['0']->book_id==$book->book_id) {
				 	echo "selected";
				 }  ?>><?php echo $book->book_name." by: ".$book->author_name?></option>

				<?php
					}
				?>
			</select>
		</div>
		<div class="form-group">
			
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>