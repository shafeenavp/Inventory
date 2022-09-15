<?php
@ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="js/delete.js"></script>
		<title> ScandiWeb </title>
		<link rel="shortcut icon" href="#">
		<link rel="stylesheet" href="styles/style.css">
	</head>

	<body>
		<form >
			<!--Header -->
			<div class="header">
				<h2 class="heading"> Product List
					<div class="btn-container">
						<input type="button" name="add" value="ADD" class="btn" onclick="window.location='add-product.php'">
						<input type="submit"  name="submit" value="MASS DELETE" id="submit"  class="btn">
					</div>
				</h2>
			</div>
			<br/>

			<!--Content-->
			<div class="container">
				<?php
				if (!isset($_SESSION['array']))
				{
					header("location: includes/get-data-redirect.php");
				}
				$data= $_SESSION['array'];
				unset($_SESSION['array']);

				if ($data!='No records')
				{
					foreach ($data as $x=>$x_value)
					{
						?>
						<div class="details">
							<div class ="product-list">
								<input type="checkbox" name='sku-checkbox' class="delete-checkbox"  value =<?php echo $x; ?> autocomplete="off">
								<br/>
								<label ><?php echo $x_value; ?></label><br/><br/>
							</div>
						</div> <?php
					}
				}?>
			</div>

			<!--Footer-->
			<br/>
			<!---Footer Line-->
			<div class="foot">
			</div>
			<br/>
			<label  class="footer-label">Scandiweb Test Assignment</label>

		</form>
	</body>
</html>

<?php
ob_flush();
?>
