<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<a onclick="window.history.back()" class="btn btn-warning">Go Back</a>
	<h1 align="center">Assign  Book</h1>
	<form method="post"  action="<?php echo site_url()."borrows/save"?>">
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
			<label>Member ID</label>
			<input type="text" name="key" class="form-control" id="member">
		</div>
		
		<div class="form-group">
			<label>Book ISBN</label>
			<input type="text" name="isbn" value="<?php echo$this->uri->segment(3);?>" class="form-control" id="book">
		</div>
		<div class="form-group col-xs-12" style="margin: 10px 0">
			<input type="submit" name="submit" class="btn btn-primary">
		</div>
	</form>

<!-- page footer -->
<?php
$this->view('footer');
?>
<script type="text/javascript">
	$("#checkbook").click(function(){
		var bookid=$("#book").val();
		if (bookid=='') {
			return $("#cbook").text("Please Insert Book ISBN");
		}
		//alert(memid);
		$.ajax({
			type: "POST",
			url: "<?php echo site_url()."borrows/checkbook"?>",
			dataType: 'json',
			data: {bookid:bookid},
		}).done(function(res) {
		    $("#cbook").text(res);
		  })
		  .fail(function() {
		   $("#cbook").text("Book Not Found");
		  })
	});
</script>