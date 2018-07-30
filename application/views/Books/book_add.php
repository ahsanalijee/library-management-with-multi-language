<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Add New Book</h1>
	<div class="row">
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
			<div class="form-group col-xs-6">
				<label>Book Name</label>
				<input type="text" name="bookname" required="required" class="form-control">
			</div>
			<div class="form-group col-xs-6">
				<label>ISBN Number</label>
				<input type="number" name="isbn" required="required"  class="form-control">
			</div>
			
			<div class="form-group col-xs-12">
				<label class="col-xs-12">Subject</label>
				<div class="col-xs-9">
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
				<div class="col-xs-3">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#subject">Add Subject</button>
				</div>					
			</div>

			<div class="form-group col-xs-12">
				<label class="col-xs-12">Author</label>
				<div class="col-xs-9">
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
				<div class="col-xs-3">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#author">Add Author</button>
				</div>					
			</div>
			<div class="form-group col-xs-12">
				<label class="col-xs-12">Publisher</label>
				<div class="col-xs-9">
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
				<div class="col-xs-3">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#publisher">Add Publisher</button>
				</div>					
			</div>
			<div class="form-group col-xs-6">
				<label>Language</label>
				<select class="form-control" required="required" name="language">
					<option value="">Select One</option>
					<?php
						foreach ($languages as $language) {
					?>

					<option value="<?php echo $language->language_id?>"><?php echo $language->language_name?></option>

					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group col-xs-6"> 
				<label>Condition</label>
				<select class="form-control" required name="condition">
					<option value="">Select One</option>
					<option>New</option>
					<option>Used</option>
				</select>
			</div>
			<div class="form-group col-xs-6">
				<label>Grades</label>
				<select class="form-control" required name="grades">
					<option value="">Select One</option>
					<option>A+</option>
					<option>A</option>
					<option>B</option>
					<option>C</option>
					<option>D</option>
				</select>
			</div>
			<div class="form-group col-xs-6">
				<label>Binding</label>
				<select class="form-control" required name="binding">
					<option value="">Select One</option>
					<option>Soft</option>
					<option>Hard</option>
					<option>Bundle</option>
				</select>
			</div>
			<div class="form-group col-xs-6">
				<label>Pages</label>
				<input type="number" name="pages" required="required"  class="form-control">
			</div>
			<div class="form-group col-xs-6">
				<label>Quantity</label>
				<input type="number" name="quantity" required="required"  class="form-control">
			</div>

			<div class="form-group col-xs-12">
				
				<input type="submit" name="submit" class="btn btn-primary">
			</div>
		</form>
	</div>
<div id="author" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Author</h4>
      </div>
      <div class="modal-body">
	    <form method="post"  action="<?php echo site_url()."books/saveauthor"?>">
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
				<label>Author Name</label>
				<input type="text" name="subject" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
			</div>
			<div class="form-group">
				
				<input type="submit" name="submit" class="btn btn-primary">
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="subject" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Subject</h4>
      </div>
      <div class="modal-body">
		    <form method="post"  action="<?php echo site_url()."books/savesubjects"?>">
				<div class="form-group">
					<label>Subject Name</label>
					<input type="text" name="subject" required="required" value="<?php echo set_value('subject'); ?>" class="form-control">
				</div>
				<div class="form-group">
					
					<input type="submit" name="submit" class="btn btn-primary">
				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="publisher" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Publisher</h4>
      </div>
      <div class="modal-body">
	    <form method="post"  action="<?php echo site_url()."books/savepublisher"?>">
			<div class="form-group">
				<label>Publisher Name</label>
				<input type="text" name="pname" value="<?php echo set_value('pname'); ?>" required="required" class="form-control">
			</div>
			<div class="form-group">
				<label>Publisher Address</label>
				<input type="text" name="paddress" required="required"  class="form-control">
			</div>
			<div class="form-group">
				<label>Publisher Country</label>
				<select class="form-control" required="required" name="country">
					<option value="">Select One</option>
					<?php
						foreach ($countrys as $country) {
					?>

					<option value="<?php echo $country->country_id?>"><?php echo $country->name?></option>

					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				
				<input type="submit" name="submit" class="btn btn-primary">
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- page footer -->
<?php
$this->view('footer');
?>