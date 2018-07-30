<?php
$this->view('header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->

<h2 align="center">Publishers</h2>
<a class="btn btn-primary" href="<?php echo site_url()."publishers/index"?>">Add New</a>
<table id="myTable">
	<tr>
		<th>Name</th>
		<th>Address</th>
		<th>Country</th>
		<th>Actions</th>
	</tr>
	<?php
		foreach ($data as $d) {
	?>

	<tr>
		<td><?php echo $d->publisher_name?></td>
		<td><?php echo $d->publisher_address?></td>
		<td><?php echo $d->name?></td>
		<td>
			<a class="btn btn-warning" href="<?php echo site_url()."publishers/edit/".$d->publisher_id?>">Edit</a>
			<a class="btn btn-danger" onclick="return confirm('Are You Sure You Wanna Delete This?')" href="<?php echo site_url()."publishers/delete/".$d->publisher_id?>">Delete</a>
		</td>
	</tr>

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
