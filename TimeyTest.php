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
                                               
$i = 1;
$laps = array();

//display results
echo '<p>Start time: ' . $newTimer->starttime . '</p>';
    
//get laps
$laps = $newTimer->laps('get');


foreach( $laps as $l )
{
	echo '<p>Lap #' . $i . ' time: ' . $l . ' and total difference from end time:' . $newTimer->laps('compare', $i) . '</p>';
	$i++;
}

echo '<p>End Time: ' . $newTimer->endtime . '</p>';

echo '<p>Total time elapsed: ' . $totaltime . '</p>';

?>