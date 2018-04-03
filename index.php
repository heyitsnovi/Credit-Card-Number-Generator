<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<title>Credit Card Generator</title>
</head>
	<body>

		<div class="container">
			<div class="jumbotron jumbotron-main">
				<h1>Credit Card Number Generator</h1>
				<h2>for developers.</h2>
			</div>
			<div class="row">

				<div class="col-md-12">

					<label>Select Card Type</label>

					<select id="card_type" class="form-control" name="card_type">
						<option value="mastercard">Master Card</option>
						<option value="visa">Visa</option>
						<option value="visa_electron">Visa Electron</option>
						<option value="discover">Discover</option>
						<option value="maestro">Maestro</option>
						<option value="dinersclubcarteblance">Diners ClubCarte Blanche</option>
						<option value="dinersclubinternational">Diners Club International</option>
						<option value="dinnersclubcanadaus">Diners Club US and Canada</option>
						<option value="jcb">JCB</option>
					</select>

					<button class="btn btn-success btn-sm btn-generate">
						Generate Number
					</button>

					<div class="result text-center">
						
					</div>

				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>

