<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<h2 align="center" style="margin: 50px 0">Member Details</h2>

	<table id="members" cellspacing="5px" cellpadding="15px">
		<?php
			foreach ($data as $d) {
		?>	
		<tr>
			<td width="300px"><b>ID</b></td>
			<td ><?php echo $d->member_key?></td>	
		</tr>
		<tr>
			<td><b>Name</b></td>
			<td><?php echo $d->member_name?></td>	
		</tr>
		<tr>
			<td><b>Address</b></td>
			<td><?php echo $d->member_address?></td>
		</tr>
		<tr>
			<td><b>Join Date</b></td>
			<td><?php echo $d->join_date?></td>	
		</tr>
		<tr>
			<td><b>Expiry Date</b></td>
			<td><?php echo $d->expiry_date?></td>	
		</tr>
		<?php
			}
		?>
	</table>
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
	<h4   style="margin: 50px 0">Assigned Books</h4>
	<table id="myTable" class="table">
		<tr>
			
			<th>Book</th>
			<th>Assigned By</th>
			<th>Assign Date</th>
			<th>Actions/Return Date</th>
		</tr>
		<?php
			// echo "<pre>";
			// print_r($assigns);
			foreach ($assigns as $d) {
		?>
		<tr>
			<td><?php echo $d->book_name?></td>
			<td><?php echo $d->libname?></td>
			<td><?php echo $d->issuedate?></td>
			<?php
				if ($d->status!='1') {
			?>
			<td>
				<button type="button" class="btn btn-default" onclick="openmodal(<?php echo $d->borrowed_id?>,<?php echo $d->book_id?>,<?php echo $d->member_id?>)">Return</button>				
			</td>
			<?php
				}else{
					echo "<td>".$d->return_date."</td>";
				}
			?>
		</tr>
		<?php
			}
		?>
	</table>
<!-- page footer -->
<?php
$this->view('footer');
?>
<!-- Modal -->
<form method="post" action="<?php echo site_url()."borrows/returned"?>">
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Return Status</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-xs-6">
	      			Fine Not Applicable<input type="radio" id="a" checked value="0" name="fa">
	      		</div>
	      		<div class="col-xs-6">
	      			Fine Applicable<input type="radio" id="a" value="1" name="fa">
	      		</div>
	      	</div>
	        <input type="hidden" name="book_id"   id="book_id"  value="">
	        <input type="hidden" name="borrowed_id" id="borrowed_id" value="">
	        <input type="hidden" name="member_id"  id="member_id" value="">
	        
	        <table cellpadding="10" cellspacing="10" class="table">
	        	<tr>
	        		<td width="20%">Condition</td>
	        		<td width="80%">
	        			<select class="form-control" id="condition" name="condition" disabled>
	        				<option value="">Select One</option>
	        				<option>A+</option>
							<option>A</option>
							<option>B</option>
							<option>C</option>
							<option>D</option>
	        			</select>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Fine</td>
	        		<td><input type="number" id="fine" name="fine" class="form-control" disabled></td>
	        	</tr>
	        	<tr>
	        		<td>Comments</td>
	        		<td><textarea rows="7" id="comments" name="comments" class="form-control" disabled></textarea></td>
	        	</tr>
	        </table>
	      </div>
	      <div class="modal-footer">
	      	<input type="submit"  value="Submit" class="btn btn-primary" id="submit">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <script type="text/javascript">
	   //      	$('#submit').click(function(){
	   //      		var borrow=$('#borrowed_id').val();
				// 	var book=$('#book_id').val();
				// 	var member=$('#member_id').val();
				// 	var condition=$('#condition').val();
				// 	var fine=$('#fine').val();
				// 	var comments=$('#comments').val();
				// 	$.ajax({
		  //               type: "POST",
		  //               url: "<?php //echo base_url(); ?>borrows/returned",
		  //               data: {borrowed_id: borrow,book_id:book,member_id:member,condition:condition,fine:fine,comments:comments},
		  //               success: function (data) {
		  //                   // return success
		  //                   if (data.length > 0) {
		  //                       alert("Book Returned")
		  //                   }else{
		  //                       $('#autoSuggestionsList').html("No data found");
		  //                   }
		  //               }
		  //           });
				// });	
	        </script>
	      </div>
	    </div>
	</div>
</div>

</form>
<script type="text/javascript">
	function openmodal(a,b,c){
		$('#borrowed_id').val(a);
		$('#book_id').val(b);
		$('#member_id').val(c);
		$("#myModal").modal({backdrop: 'static', keyboard: false});	

	}
	
	$("input[name='fa']").click(function() {
		var a=$("input[name='fa']:checked"). val();
		if (a==0) {
			$("#fine").prop('disabled', true);
			$("#condition").prop('disabled', true);
			$("#comments").prop('disabled', true);
		}else{
			$("#fine").prop('disabled', false);
			$("#condition").prop('disabled', false);
			$("#comments").prop('disabled', false);
		} 
	})
</script>