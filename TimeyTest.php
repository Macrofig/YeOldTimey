<!DOCTYPE html>
<?php
	include 'YeOldTimey.php';

	//starts timer
	$newTimer = new YeOldenTimey;
	//pause
	sleep(3);
	//add lap
	$newTimer->laps('set', 1);
	//pause
	sleep(1);
	//add lap
	$newTimer->laps('set', 2);
	//pause again
	sleep(2);

	//stop timer
	$totaltime = $newTimer->timer('get');


	//BUILD HTML

	$i = 1;
	$laps = array();

	//set up output vars
	$startHTML = 'Start time: ' . $newTimer->starttime;
	$endHTML = 'End Time: ' . $newTimer->endtime;
	$totalHTML = 'Total time elapsed: ' . $totaltime;
	$lapsHTML = '';
	$lapsStart = '<li>';
	$lapsEnd = '</li>';
	//get laps
	$laps = $newTimer->laps('get');
	foreach( $laps as $l )
	{
		$lapsHTML = $lapsHTML . $lapsStart . 'Lap #' . $i . ' time: ' . $l . ' and total difference from end time:' . $newTimer->laps('compare', $i) . $lapsEnd;
		$i++;
	}



?>
<html>
<head>
	<title>Ye Olde Timey Test</title>
	<meta charset="UTF-8">
	<style> 
		/* clear */
		body {margin: 0; padding:0; outline:none; border:none;}

		body {width: 60%; margin: 0 auto 0 auto;}

	</style>
</head>
<body>
	<h1>Ye Olde Timey - A Test</h1>
	<p>Just a stupid simple tool to help time scripts.</p>

	<h2>Instructions:</h2>
	<div>
		<p>The test consists of two parts, really.  The main timer and lap times.</p>
		<h4>Timer:</h4>
		<ul>
			<li>
				<p>Initializing: 
					<pre>$newTimer = new YeOldenTimey;</pre>
					This also starts the timer.  You can RESTART the timer after initializing by:
					<pre>$newTimer->timer('restart');</pre>
				</p>
			</li>
			<li>
				<p>Stop the timer: 
					<pre>$newTimer->timer('get');</pre>
					This stops the timer and returns the end time.<br />
					Restarting the timer will not clear the end time by default. You can force it, though:
					<pre>$newTimer->timer('restart', true );</pre>
				</p>
			</li>
		</ul>
		<h4>Lap Times:</h4>
		<ul>
			<li>
				<p>Trigger a lap time: 
					<pre>$newTimer->laps('set', 1);</pre>
					Both arguments are optional, but if you want to easily track lap times later, you should pass both.
					The first argument is the action, in this case SET creates a new lap time.
					The second argument is the name of the lap time. I used numbers in this example but you can use strings if you like.
				</p>
			</li>
			<li>
				<p>Get a lap time: 
					<pre>$newTimer->timer('get', 1);</pre>
					This returns the lap time saved with the name of 1.  Remember that whatever you passed as the name is how you get it back. <br />
					If you did not pass a name when you set the lap time, you will have to manually go through the array which is retrieved like so:
					<pre>$newTimer->timer('get');</pre>
				</p>
			</li>
			<li>
				<p>Compare a lap time: 
					<pre>$newTimer->laps('compare', 1)</pre>
					This compares the lap time to the end time and returns the result. If end time hasn't been set yet, it uses the current time.
				</p>
			</li>
		</ul>
	</div>
	<h2>Test Output:</h2>
	<ul>
		<li><?php echo $startHTML; ?></li>
		<?php echo $lapsHTML ?>
		<li><?php echo $endHTML; ?></li>
		<li><?php echo $totalHTML; ?></li>

	</ul>


</body>
</html>