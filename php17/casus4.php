<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="calculator">
		<form method="post">
			<input type="text" name="number1" placeholder="Voer getal 1 in">
			<input type="text" name="number2" placeholder="Voer getal 2 in">
			<select name="operator">
				<option value="add">+</option>
				<option value="subtract">-</option>
				<option value="multiply">*</option>
				<option value="divide">/</option>
				<option value="power">^</option>
				<option value="sqrt">√</option>
				<option value="round">~</option>
				<option value="modulus">%</option>
			</select>
			<button type="submit" name="calculate" value="calculate">Bereken</button>
		</form>

		<?php
		if(isset($_POST['calculate'])){
			$number1 = $_POST['number1'];
			$number2 = $_POST['number2'];
			$operator = $_POST['operator'];

			switch($operator){
				case "add":
					$result = $number1 + $number2;
					break;
				case "subtract":
					$result = $number1 - $number2;
					break;
				case "multiply":
					$result = $number1 * $number2;
					break;
				case "divide":
					if($number2 == 0){
						echo "Kan niet delen door nul";
					} else {
						$result = $number1 / $number2;
					}
					break;
				case "power":
					$result = pow($number1, $number2);
					break;
				case "sqrt":
					$result = sqrt($number1);
					break;
				case "round":
					$result = round($number1);
					break;
				case "modulus":
					$result = $number1 % $number2;
					break;
			}

			echo "<h2>Resultaat: ".$result."</h2>";
		}
		?>
	</div>
</body>
</html>
