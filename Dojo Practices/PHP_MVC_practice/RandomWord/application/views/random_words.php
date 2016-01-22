<html lang = 'en'>
<head>
	<title>The Random Word Generator</title>
	<link rel = 'stylesheet' type = 'text/css' href = '/assets/css/random.css'>
</head>
<body>
	<div id = 'outercontainer'>
		<div id = 'innercontainer'>
			<p class = 'title'>Random Word (attempt #<?php echo $attempt; ?>)</p>
			<p class = 'rand_numb'><?php echo $rand_numb?></p>
			<form action = '' method = 'post'>
				<input class = 'gen_btn' type = 'submit' value = 'Generate' />
			</form>
		</div>
	</div>
</body>
</html>