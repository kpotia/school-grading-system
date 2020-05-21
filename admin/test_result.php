<!-- test_result.php -->
<!-- create result -->
<!-- get std ID, get class and year, get examinerID -->

	<table>

		<form method="post">
		<tr>
			<th>Module</th>
			<th>Grade</th>
		</tr>
		<tr>
			<td>Mathematics</td>
			<td>
				<input type="number" name="module['Mathematics']">
			</td>
		</tr>

		<tr>
			<td>History</td>
			<td>
				<input type="number" name="module['History']">
			</td>
		</tr>


		<tr>
			<td>Geography</td>
			<td>
				<input type="number" name="module['Geography']">
			</td>
		</tr>

		<tr>
			<td>Spelling</td>
			<td>
				<input type="number" name="module['Spelling']">
			</td>
		</tr>

		<tr>
			<td>Spelling</td>
			<td>
				<input type="number" name="module['Civic']">
			</td>
		</tr>

		<button type="submit">Submit</button>
		</form>
	</table>


<?php 

	print_r($_POST);
	$count =0;
	$sum = 0;
	foreach ($_POST['module'] as $mod => $grad) {
		if($grad!=null){
			$count += 1;
			$sum += $grad;
		}
	}
	$avg = $sum/$grad;

	$result = [
		'STD_ID' => $STD_ID,
		'EMX_ID' => $EXM_ID,
		'class' => $form,
		'year' => $year,
		'modules' => $_POST['module'],
		'avg' => $avg
	];


	include_once '../db.php';

	
 ?>