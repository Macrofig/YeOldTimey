<?php

include 'YeOldTimey.php';
//starts timer
$newTimer = new YeOldenTimey;
$totaltime = $newTimer->timer('get');
                                               

echo '<p>Start time: ' . $newTimer->starttime . '</p>';
echo '<p>End Time: ' . $newTimer->endtime . '</p>';    
echo '<p>Total time elapsed: ' . $totaltime . '</p>';



?>