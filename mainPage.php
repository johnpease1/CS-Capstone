<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home: Motobase</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="capstoneStylesheet.css" rel="stylesheet">
</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="mainPage.php"><img src="images/motobaseLogo.png"></a>
		</div>
	</nav>

	<!--Brand Selection -->
	<?php
	// Create connection
	$conn =  mysqli_connect('localhost', 'root', '', 'vehicleBrands');
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM `brandname`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$brands = array();
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$brands[] = $row["brandName"];
		}
	} else {
		echo "0 results";
	}


	?>
	<div class = "vehicleSelector">
		<h3>Select a Vehicle</h3>
		<form method="post" action="#">
			<label for="brand">Choose Brand:</label>
			<select name="brandSelected">
				<option selected="selected">Choose one</option>
				<?php foreach ($brands as $brand): ?>
					<option value="<?php echo strtolower($brand); ?>"><?php echo $brand; ?></option>
				<?php endforeach; ?>
			</select>
			<input type="submit" value="Submit" name="selectBrandTable">
		</form>


		<!--Model Selection -->
		<?php
		$brand_name = "";
		if (isset($_POST['selectBrandTable'])) {
			$brand_name = mysqli_real_escape_string($conn, $_POST['brandSelected']);

			$brand_sql = "SELECT * FROM $brand_name";
			$brand_result = $conn->query($brand_sql);
			echo(ucfirst($brand_name)." Models:");

			if ($brand_result->num_rows > 0) {
				$models = array();
				// output data of each row
				while($model_row = $brand_result->fetch_assoc()) {
					$models[] = $model_row['model'];
				}
			} else {
				echo "0 results";
			}
		}

		?>

		<form method="post" action="#">
			<label for="brand">Choose Model:</label>
			<select name="modelSelected">
				<option selected="selected">Choose one</option>
				<?php foreach ($models as $model): ?>
					<option value="<?php echo strtolower($model); ?>"><?php echo $model; ?></option>
				<?php endforeach; ?>
			</select>
			<input type="submit" value="Submit" name="selectModelTable">
		</form>

		<!--Display Model Selection -->
		<?php
		$model_name = "";
		if (isset($_POST['selectModelTable'])) {
			$model_name = mysqli_real_escape_string($conn, $_POST['modelSelected']);

			$model_sql = "SELECT * FROM $model_name";
			$model_result = $conn->query($model_sql);
			if ($model_result->num_rows > 0) {
				// output data of each row
				echo "<table>";
				echo "<tr padding>";
				echo "<th>Name</th>";
				echo "<th>Trim Levels</th>";
				echo "<th>Pricing</th>";
				echo "<th>Engine</th>";
				echo "<th>Horsepower</th>";
				echo "<th>Torque</th>";
				echo "<th>Compression Ratio</th>";
				echo "<th>Fuel Injection</th>";
				echo "<th>Transmission</th>";
				echo "<th>Tires</th>";
				echo "</tr>";
				while($row = $model_result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Trim Levels'] . "</td>";
					echo "<td>" . $row['Pricing'] . "</td>";
					echo "<td>" . $row['Engine'] . "</td>";
					echo "<td>" . $row['Horsepower'] . "</td>";
					echo "<td>" . $row['Torque'] . "</td>";
					echo "<td>" . $row['Compression Ratio'] . "</td>";
					echo "<td>" . $row['Fuel Injection'] . "</td>";
					echo "<td>" . $row['Transmission'] . "</td>";
					echo "<td>" . $row['Tires'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
				echo "0 results";
			}

		}


		$conn->close();
		?>

		<!--- Footer -->
		<footer>
			<div class="container-fluid">
				<div class="row text-center">
					<div class="col-md-12">
						<img src="images/motobaseLogo.png" alt="motobaseLogo">
						<hr class="light">
						<p>Created by John Pease</p>
						<p>Senior Capstone</p>
						<p>john_pease@redlands.edu</p>
					</div>
					<div class="col-12">
						<hr class="lightBar">
						<h5>&copy; motobase.com</h5>
					</div>
				</div>
			</div>
		</footer>



	</body>
	</html>
