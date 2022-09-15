<!DOCTYPE html>
<html>
	<head>
		<title> ScandiWeb </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
		<link rel="stylesheet" href="styles/style.css">
		<link rel="shortcut icon" href="#">
		<script src="https://unpkg.com/vue@3"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

		<script src="js/selection.js" defer></script>
	</head>

	<body>
		<form name="product_form" action="includes/add-product-redirect.php" id="product_form" method="post" >

			<!--Header-->
			<div class="header">
				<h2 class="heading"> Product Add
					<div class="btn-container">
						<button type="button" name="save" class="btn" @click="checkForm">Save</button>
						<input type="button" value="Cancel" onclick="window.location='index.php'" class="btn">
					</div>
				</h2>
			</div>

			<br/>

			<!--Content -->
			<div class="container" id="app">

				<!--Main section-->
				<div class="data">
					<br/>
					
					<label class="label" id="skuLabel" >SKU</label>
					<input type="text" name="sku" id="sku" v-model="sku" class="input" autocomplete="off" placeholder="Max 15 chars">				
					<label style ="display:none" class="errormsg" id="skutaken">				
					<i>SKU already exists.. Try another one!!</i></label>
					<p  class="errormsg" id = "skuNotValid" v-if="skuNotValid">
						<i>SKU must contain atleast one letter or number</i>
					</p>
					<br/>
					<label class="label">Name</label>
					<input type="text" name="name" id="name" v-model="name" class="input" autocomplete="off" placeholder="Max 25 chars">
					<br/>
					<label class="label">Price ($)</label>
					<input type="text" type="number" name="price" id="price" v-model="price" class="input" autocomplete="off">
					<br/>
					<label class="label">Type Switcher</label>
					<select name="productType" id="productType" v-model="productType" autocomplete="off" onchange="select(this.value)">
						<option disabled value="">Type Switcher</option>
						<option id="DVD" value="dvd">DVD</option>
						<option id="Book" value="book">Book</option>
						<option id="Furniture" value="furniture">Furniture</option>
					</select>
					<br/>
				</div>

				<!--DVD-->
				<div style="display:none" class="dvdDiv" id="dvdDiv">
					<label>Size (MB)</label>
					<input type="text" name="size"  id="size" class="input" autocomplete="off">
					<br/>
					<p><i>*Please provide Disc-size in Megabytes</i></p>
				</div>

				<!--Furniture-->
				<div style="display:none" class="furnitureDiv" id="furnitureDiv">
					<label>Height (CM)</label>
					<input type="text" name="height" id="height" class="input" autocomplete="off">
					<br/>
					<label>Width (CM)</label>
					<input type="text" name="width" id="width" class="input" autocomplete="off">
					<br/>
					<label>Length (CM)</label>
					<input type="text" name="length" id="length" class="input" autocomplete="off">
					<br/>
					<p><i>*Please provide Dimensions in H x W x L format</i></p>
				</div>

				<!--Book-->
				<div style ="display:none" class="bookDiv" id="bookDiv">
					<label>Weight (KG)</label>
					<input type="text" name="weight" id="weight" class="input" autocomplete="off">
					<br/>
					<p><i>*Please enter the weight of the book in Kilograms</i></p>
				</div>

				<!--Error Messages-->
				<div>
					<p class="errormsg" v-if="errors" id="errors">
						<i>Please, submit required data</i>
					</p>
					<p class="errormsg" v-if="errorMaxSize">
						<i>Maximum size exceeds..!!</i>
					</p>
					<p style ="display:none" class="errormsg" id="errtype" >
						<i>Please, provide the data of indicated type</i>
					</p>
					<br/>
				</div>
			</div>

			<!---Footer-->
			<br/>
			<!---Footer Line-->
			<div class="foot">
			</div>
			<br/>
			<label class="footer-label">Scandiweb Test Assignment</label>

		</form>
		<script src="js/app.js"></script>
	</body>
</html>
