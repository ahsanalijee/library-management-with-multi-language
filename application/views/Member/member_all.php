<?php
$this->view('header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->

<h2 align="center">All Members</h2>
<a class="btn btn-primary" href="<?php echo site_url()."members/index"?>">Add New</a>
<br><br><br>
<table id="members">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Address</th>
			<th>Join Date</th>
			<th>Expiry Date </th>
			<th>Actions</th>
		</tr>
	</thead>
	<?php
		foreach ($data as $d) {
	?>
	<tbody>
		<tr>
			<td><?php echo $d->member_key?></td>
			<td><?php echo $d->member_name?></td>
			<td><?php echo $d->member_address?></td>
			<td><?php echo $d->join_date?></td>
			<td><?php echo $d->expiry_date?></td>
			<td>
				<a class="btn btn-warning" href="<?php echo site_url()."members/edit/".$d->member_id?>">Edit</a>
				<a class="btn btn-danger" onclick="return confirm('Are You Sure You Wanna Delete This?')" href="<?php echo site_url()."members/delete/".$d->member_id?>">Delete</a>
			</td>
		</tr>
	</tbody>
	<?php
		}
	?>
	
</table>

<!-- page footer -->
<?php
$this->view('footer');
?>

<script type="text/javascript">
	jQuery(document).ready( function () {
	    jQuery('#myTable').DataTable();
	} );
</script>
