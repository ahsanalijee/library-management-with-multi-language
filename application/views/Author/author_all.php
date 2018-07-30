<?php
$this->view('header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->
<h2 align="center">All Authors</h2>
<a class="btn btn-primary" href="<?php echo site_url()."authors/index"?>">Add New</a>
<table id="myTable">
	<tr>
		<th>Author Name</th>
		<th>Actions</th>
	</tr>
	<?php
		foreach ($data as $d) {
	?>

	<tr>
		<td><?php echo $d->author_name?></td>
		<td>
			<a class="btn btn-warning" href="<?php echo site_url()."authors/edit/".$d->author_id?>">Edit</a>
			<a class="btn btn-danger" onclick="return confirm('Are You Sure You Wanna Delete This?')" href="<?php echo site_url()."authors/delete/".$d->author_id?>">Delete</a>
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
