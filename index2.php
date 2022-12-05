<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<br>
<div class="row">
<form action="import.php" method="post" enctype="multipart/form-data" id="import_form">
<div class="col-md-3">
<input type="file" name="file" />
</div>
<div class="col-md-5">
<input type="submit" class="btn btn-primary" name="import_data" value="IMPORT">
</div>
</form>
</div>
<br>
<div class="row">
<table class="table table-bordered">
<thead>
<tr>
<th>Emp Id</th>
<th>Emp Name</th>
<th>Emp Email</th>
<th>Emp Age</th>
<th>Salary ($)</th>
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT emp_id, emp_name, emp_email, emp_salary, emp_age FROM emp ORDER BY emp_id DESC LIMIT 10";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if(mysqli_num_rows($resultset)) {
while( $rows = mysqli_fetch_assoc($resultset) ) {
?>
<tr>
<td><?php echo $rows['emp_id']; ?></td>
<td><?php echo $rows['emp_name']; ?></td>
<td><?php echo $rows['emp_email']; ?></td>
<td><?php echo $rows['emp_salary']; ?></td>
<td><?php echo $rows['emp_age']; ?></td>
</tr>
<?php } } else { ?>
<tr><td colspan="5">No records to display.....</td></tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>