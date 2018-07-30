<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Add New Book</h1>
	<div class="row">
		<div class="col-sm-9">
			<form method="post"  action="<?php echo site_url()."books/save"?>">
				<?php
				 if ($this->session->flashdata('success')) {
				?>
					<div class="alert alert-success alert-dismissible">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <?php echo $this->session->flashdata('success');?>
					</div>
				<?php
				 }
				?>
				<div class="form-group">
					<label>Book Name</label>
					<input type="text" name="bookname" required="required" class="form-control">
				</div>
				<div class="form-group">
					<label>ISBN Number</label>
					<input type="number" name="isbn" required="required"  class="form-control">
				</div>
				<div class="form-group ">
					<label>Subject</label>
					<select class="form-control" required="required" name="subject">
						<option value="">Select One</option>
						<?php
							foreach ($subjects as $subject) {
						?>

						<option value="<?php echo $subject->subject_id?>"><?php echo $subject->subject_name?></option>

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

						<option value="<?php echo $author->author_id?>"><?php echo $author->author_name?></option>

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

						<option value="<?php echo $publisher->publisher_id?>"><?php echo $publisher->publisher_name?></option>

						<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Language</label>
					<select class="form-control" required="required" name="language">
						<option value="">Select One</option>
						<?php
							foreach ($publishers as $publisher) {
						?>

						<option value="<?php echo $publisher->publisher_id?>"><?php echo $publisher->publisher_name?></option>

						<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Condition</label>
					<select class="form-control" required>
						<option value="">Select One</option>
						<option>New</option>
						<option>Used</option>
					</select>
				</div>
				<div class="form-group">
					<label>Grades</label>
					<select class="form-control" required>
						<option value="">Select One</option>
						<option>A+</option>
						<option>A</option>
						<option>B</option>
						<option>C</option>
						<option>D</option>
					</select>
				</div>
				<div class="form-group">
					<label>Binding</label>
					<select class="form-control" required>
						<option value="">Select One</option>
						<option>Soft</option>
						<option>Hard</option>
						<option>Bundle</option>
					</select>
				</div>
				<div class="form-group">
					<label>Pages</label>
					<input type="number" name="isbn" required="required"  class="form-control">
				</div>
				<div class="form-group">
					<label>Quantity</label>
					<input type="number" name="quantity" required="required"  class="form-control">
				</div>

				<div class="form-group">
					
					<input type="submit" name="submit" class="btn btn-primary">
				</div>
			</form>
		</div>
		<div class="col-sm-3">
			<h2>Add More</h2>
			<form  action="/action_page.php">
			    <div class="form-group">
			      <label>Subject:</label>
			      <input type="text" class="form-control">
			    </div>
			    <button type="submit" class="btn btn-default">Add Subject</button>
		  </form>
		  <br>
		  <form  action="/action_page.php">
			    <div class="form-group">
			      <label>Publisher:</label>
			      <input type="text" class="form-control" placeholder="publier name"><br>
			      <input type="text" class="form-control" placeholder="publier Address">
			    </div>
			    <button type="submit" class="btn btn-default">Add Publisher</button>
		  </form>
		</div>
	</div>
	

<!-- page footer -->
<?php
$this->view('footer');
?>