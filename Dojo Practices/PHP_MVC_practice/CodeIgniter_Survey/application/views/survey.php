<html lang = "en">

<head>
	<title>Time Display</title>
	<link rel = "stylesheet" type = "text/css" href = "/assets/css/survey.css">
</head>

<body>
	<div id = 'containter'>
		<form class = 'survey_form' action = 'survey' method = 'post'>
			<table class = 'info_table'>
				<tr>
					<td>Name : </td>
					<td><input class = 'name' type = 'text' name = 'name' placeholder = "Name"><br></td>
				</tr>
				<tr>
					<td>Location : 
					<td>	<select class = 'location' name = 'location'>
							<option value = "Mountain View">Mountain View</option>
							<option value = "San Francisco">San Francisco</option>
							<option value = "Washington">Washington</option>
						</select><br>
					</td>
				</tr>
				<tr>
					<td>Favorite Language : </td>
					<td><select class = 'fav_lang' name = 'favorite language'> 
							<option value = "Javascript">Javascript</option>
							<option value = "C++">C++</option>
							<option value = "Python">Python</option>
						</select><br>
					</td>
				</tr>
			</table>
			Comment (Optional) : <br><textarea class = 'comment' rows="10" name="comment" 
									  placeholder="Comment"></textarea><br> 
			<input class = 'submit' type = 'submit' value = 'Submit'>
		</form>
	</div>
</body>

</html>