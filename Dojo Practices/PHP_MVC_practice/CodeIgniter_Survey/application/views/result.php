<html lang = "en">

<head>
	<title>Survey Result</title>
	<link rel = "stylesheet" type = "text/css" href = "/assets/css/result.css">
</head>

<body>
	<div id = 'containter'>
		<p class = 'sub_message'>Thanks for submitting this form! You have submitted this form 
			<?= $counter?> times now.</p></br>
		<div id = 'sub_info'>
			<p class = 'title'>Submitted Information</p>
			<table class = 'info_table'>
				<tr>
					<td>Name : </td>
					<td><?php echo $name ?></td>
				</tr>
				<tr>
					<td>Dojo Location : </td>
					<td><?php echo $location ?></td>
				</tr>
				<tr>
					<td>Favorite Language : </td>
					<td><?php echo $favorite_language ?></td>
				</tr>
				<tr>
					<td>Comment : </td>
					<td><?php echo $comment ?></td>
				</tr>
			</table>
			<form action = 'return' method = 'post'>
				<input class = 'submit' type = 'submit' value = 'Go Back'>
			</form>
		</div>
	</div>
</body>

</html>