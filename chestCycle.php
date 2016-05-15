<script src="js/jquery-1.12.3.min.js"></script>
<?php

$cycleArray = file("cycle.txt", FILE_IGNORE_NEW_LINES);

if(isset($_POST['cycle']))
{
	$givenCycle = explode("\n", trim($_POST['cycle']));
	for($i = 0; $i < count($givenCycle)-1; $i++)
	{
		$givenCycle[$i] = substr($givenCycle[$i], 0, -1);
	}
	for($i = 0; $i < (239+count($givenCycle)); $i++)
	{
		if(array_slice($cycleArray, $i, count($givenCycle)) == $givenCycle) //we're cutting out as many array elements as the user has entered from the complete cycle and compare it with the cycle that the user entered. Next time, the offest will be increased by 1 due to the for loop.
		{
			if(($i)+count($givenCycle) < 240) //in the cycle.txt, I've copied the cycle 2 times in order to recognize patterns that go from 240 to 1. Otherwise, it wouldn't work using array_slice.
			{
				echo "Next Chest: " . $cycleArray[(($i)+count($givenCycle))] . ' / Current Position: ' . (($i)+count($givenCycle)) . "<br/>";	
			}
			else
			{
				echo "Next Chest: " . $cycleArray[((($i)+count($givenCycle))-240)] . ' / Current Position: ' . ((($i)+count($givenCycle))-240) . "<br/>";
			}
		}
	}
}

?>

<button id="addSilver">Silver</button> 
<button id="addGold">Gold</button> 
<button id="addGiant">Giant</button> 
<button id="addMagical">Magical</button> 
<br/>
<form method="POST">
	<textarea name="cycle" id="cycle" cols="20" rows="20"></textarea> <br/>
	<input type="submit" name="submit" value="Get Position"></form>
</form>


<?php

echo "Complete Cycle: <br/><br/>";
for($i = 0; $i < 240; $i++)
{
	echo $i+1 . ". " . $cycleArray[$i] . "<br/>";
}

?>

<script>
$("#addSilver").click(function()
{
	$("#cycle").val($("#cycle").val() + "Silver\n");
});
$("#addGold").click(function()
{
	$("#cycle").val($("#cycle").val() + "Gold\n");
});
$("#addGiant").click(function()
{
	$("#cycle").val($("#cycle").val() + "Giant\n");
});
$("#addMagical").click(function()
{
	$("#cycle").val($("#cycle").val() + "Magic\n");
});
</script>