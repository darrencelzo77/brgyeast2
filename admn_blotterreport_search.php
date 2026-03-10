<?php
// require the database connection
require 'classes/conn.php';
if (isset($_POST['search_bspermit'])) {
	$keyword = $_POST['keyword'];
?>
	<table class="table table-hover text-center table-bordered table-responsive">
		<thead class="alert-info">

			<tr>
				<th> Actions</th>
				<th> Resident ID </th>
				<th> Surname </th>
				<th> First Name </th>
				<th> Middle Name </th>
				<th> Address </th>
				<th> Contact # </th>
				<th> Narrative Report </th>
				<th> Date & Time Applied</th>
			</tr>
		</thead>
		<tbody>


			<?php

			$stmnt = $conn->prepare("SELECT * FROM `tbl_blotter` WHERE `lname` LIKE '%$keyword%' or  `mi` LIKE '%$keyword%' or  `fname` LIKE '%$keyword%' 
				or `bsname` LIKE '%$keyword%' or  `id_resident` LIKE '%$keyword%' or  `houseno` LIKE '%$keyword%' or  `street` LIKE '%$keyword%'
				or `brgy` LIKE '%$keyword%' or `municipal` LIKE '%$keyword%' or `bsindustry` LIKE '%$keyword%' or `aoe` LIKE '%$keyword%' order by id_blotter DESC ");
			$stmnt->execute();

			while ($view = $stmnt->fetch()) {
			?>
				<tr>
					<td>
						<form action="" method="post">
							<a class="btn btn-success" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="update_blotter_form.php?id_blotter=<?= $view['id_blotter']; ?>">Update</a>
							<input type="hidden" name="id_blotter" value="<?= $view['id_blotter']; ?>">
							<button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_blotter"> Delete </button>
						</form>
					</td>
					<td> <?= $view['id_resident']; ?> </td>
					<td> <?= $view['lname']; ?> </td>
					<td> <?= $view['fname']; ?> </td>
					<td> <?= $view['mi']; ?> </td>
					<td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?> </td>
					<td>
						<?php
						$narrative = $view['narrative'];
						$maxLength = 100; // Maximum length of the text to display

						// Check if the text exceeds the maximum length
						if (strlen($narrative) > $maxLength) {
							// Truncate the text and add "..."
							$truncatedText = substr($narrative, 0, $maxLength) . '...';
							echo $truncatedText;
						} else {
							// Display the full text
							echo $narrative;
						}
						?>
					</td>

					<td> <?= $view['timeapplied']; ?> </td>
					
				</tr>
			<?php
			}
			?>


		</tbody>
	</table>
<?php
} else {
?>
	<table class="table table-hover text-center table-bordered table-responsive">
		<thead class="alert-info">
			<tr>
				<th> Resident ID </th>
				<th> Surname </th>
				<th> First Name </th>
				<th> Middle Name </th>
				<th> Address </th>
				<th> Contact # </th>
				<th> Narrative Report </th>
				<th> Date & Time Applied</th>
				<th> Status</th>
				<th> Actions</th>
				<th> Update Status </th>

			</tr>
		</thead>
		<tbody>
			<?php if (is_array($view)) { ?>
				<?php foreach ($view as $view) { ?>
					<tr>

						<td> <?= $view['id_blotter']; ?> </td>
						<td> <?= $view['lname']; ?> </td>
						<td> <?= $view['fname']; ?> </td>
						<td> <?= $view['mi']; ?> </td>
						<td> <?= $view['houseno']; ?>, <?= $view['street']; ?>, <?= $view['brgy']; ?>, <?= $view['municipal']; ?> </td>
						<td> <?= $view['contact']; ?> </td>
						<td>
							<?php
							$narrative = $view['narrative'];
							$maxLength = 100; // Maximum length of the text to display

							// Check if the text exceeds the maximum length
							if (strlen($narrative) > $maxLength) {
								// Truncate the text and add "..."
								$truncatedText = substr($narrative, 0, $maxLength) . '...';
								echo $truncatedText;
							} else {
								// Display the full text
								echo $narrative;
							}
							?>
						</td>

						<td> <?= $view['timeapplied']; ?> </td>
						<?php include('include_statuses.php'); ?>
						<td>
							<form action="" method="post">
								<a class="btn btn-success" style="width: 80px; font-size: 15px; border-radius:5px; margin-bottom: 2px;" href="update_blotter_form.php?id_blotter=<?= $view['id_blotter']; ?>">Update</a>
								<input type="hidden" name="id_blotter" value="<?= $view['id_blotter']; ?>">
								<!-- <button class="btn btn-danger" style="width: 80px; font-size: 15px; border-radius:5px;" type="submit" name="delete_blotter"> Delete </button> -->
							</form>
						</td>
						<td style="width:180px;">
							<form method="POST" action="update_status.php">

								<input type="hidden" name="id_rescert" value="<?= $view['id_rescert']; ?>">

								<select name="status" class="form-control form-control-sm" onchange="this.form.submit()">

									<option value="PENDING" <?= $view['status'] == 'PENDING' ? 'selected' : '' ?>>PENDING</option>

									<option value="APPROVED" <?= $view['status'] == 'APPROVED' ? 'selected' : '' ?>>APPROVED</option>

									<option value="REJECTED" <?= $view['status'] == 'REJECTED' ? 'selected' : '' ?>>REJECTED</option>

									<option value="READY FOR PICKUP" <?= $view['status'] == 'READY FOR PICKUP' ? 'selected' : '' ?>>READY FOR PICKUP</option>

									<option value="CLAIMED" <?= $view['status'] == 'CLAIMED' ? 'selected' : '' ?>>CLAIMED</option>

									<option value="DELETED" <?= $view['status'] == 'DELETED' ? 'selected' : '' ?>>DELETED</option>

								</select>

							</form>
						</td>

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