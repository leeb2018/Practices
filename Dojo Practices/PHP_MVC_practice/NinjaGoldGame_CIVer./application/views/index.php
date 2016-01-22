<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold Game</title>
	<style type="text/css">
	#container{
		width: 900px;
		height: 500;
		font-family: sans-serif;
		border: 1px solid black;
	}
	#display_gold{
		width: 90%;
		height: auto;
		margin-top: 15px;
		margin-left: 15px;
	}
	#choices{
		width: 100%;
		height: 220px;
		text-align: center;
	}
	.activity_option{
		width: 210px;
		height: 200px;
		border: 1px solid black;
		display: inline-block;
		margin: 10px auto;
	}
	.activity_option p, form, h2{
		margin-top: 30px;
	}
	#activity_log{
		width: 850px;
		height: auto;
		margin: 15px auto;
		border: 1px solid black;
		padding-left: 20px;
	}
	</style>
</head>
<body>
	<div id='container'>
		<div id='display_gold'>
			Your Gold: <input type="text" value="<?=$current_gold?>">
		</div>
		<div id='choices'>
			<div class='activity_option'>
				<h2>Farm</h2>
				<p>(Earns 5-10 Golds)</p>
				<form action='/Main/process_money' method='post'>
					<input type='hidden' name='building' value='farm' />
					<input type='submit' value='Find Gold!' />
				</form>
			</div>
			<div class='activity_option'>
				<h2>Cave</h2>
				<p>(Earns 10-20 Golds)</p>
				<form action='/Main/process_money' method='post'>
					<input type='hidden' name='building' value='cave' />
					<input type='submit' value='Find Gold!' />
				</form>
			</div>
			<div class='activity_option'>
				<h2>House</h2>
				<p>(Earns 2-5 Golds)</p>
				<form action='/Main/process_money' method='post'>
					<input type='hidden' name='building' value='house' />
					<input type='submit' value='Find Gold!' />
				</form>
			</div>
			<div class='activity_option'>
				<h2>Casino</h2>
				<p>(Earns/takes 0-50 Golds)</p>
				<form action='/Main/process_money' method='post'>
					<input type='hidden' name='building' value='casino' />
					<input type='submit' value='Find Gold!' />
				</form>
			</div>
		</div><br>
		Activities:<br>
		<div id='activity_log'>
<?php
		foreach ($activity_log as $log) {
			if($log['result'] == 'win') { ?>
				<p style='color:green'>You entered <?=$log['building']?> and earned <?=$log['update_gold']?> gold! Bravo! <?=$log['date']?></p>
<?			}
			else { ?>
				<p style='color:red'>You entered <?=$log['building']?> and lost <?=-$log['update_gold']?> gold! Ouch! <?=$log['date']?></p>
<?			}
		}
?>
		</div>
	</div>
</body>
</html>