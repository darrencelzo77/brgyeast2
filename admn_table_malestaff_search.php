<?php
	// require the database connection
	require 'classes/conn.php';
	if(isset($_POST['search_totalstaff'])){
		$keyword = $_POST['keyword'];
?>

<table class="table table-hover table-bordered text-center table-responsive" >
	<thead class="alert-info">
		<tr>
			<th> Email </th>
			<th> Surname </th>
			<th> First name </th>
			<th> Middle name </th>
			<th> Age </th>
			<th> Position </th>
		</tr>
	</thead>

	<tbody>     
		<?php
			$stmnt = $conn->prepare("SELECT * FROM `tbl_user` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%' 
			or `age` LIKE '%$keyword%' or  `contact` LIKE '%$keyword%'");
			$stmnt->execute();
			
			while($view = $stmnt->fetch()){
		?>
			<tr>
				<td> <?= $view['email'];?> </td>
				<td> <?= $view['lname'];?> </td>
				<td> <?= $view['fname'];?> </td>
				<td> <?= $view['mi'];?> </td>
				<td> <?= $view['age'];?> </td>
				<td> <?= $view['contact'];?> </td>
				<td> <?= $view['position'];?> </td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>

<?php		
	}else{
?>

<table class="table table-hover table-bordered text-center table-responsive">
	<thead class="alert-info">
		<tr>
			<th> Email </th>
			<th> Surname </th>
			<th> First name </th>
			<th> Middle name </th>
			<th> Age </th>
			<th> Contact # </th>
			<th> Position </th>
		</tr>
	</thead>

	<tbody>
		<?php if(is_array($view)) {?>
			<?php foreach($view as $view) {?>
				<tr>
					<td> <?= $view['email'];?> </td>
					<td> <?= $view['lname'];?> </td>
					<td> <?= $view['fname'];?> </td>
					<td> <?= $view['mi'];?> </td>
					<td> <?= $view['age'];?> </td>
					<td> <?= $view['contact'];?> </td>
					<td> <?= $view['position'];?> </td>
				</tr>
			
			<?php
				}
			?>
		<?php
			}
		?>
	</tbody>
</table>

<?php
	}
$con = null;
?>