<?php  

class YeOldenTimey 
{  
    public $starttime;
    public $endtime;
    public $totaltime;
    public $laps = array();

	public function __construct()  
    {  
        $this->startTimer();
    } 

    public function startTimer()  
    {  
        $this->starttime = microtime();  
        echo "<p>Start time: " . $this->starttime . '</p>';
    }

    public function endTimer()
    {
    	$this->endtime = microtime();
        echo "<p>End Time: " . $this->endtime . '</p>';
    }

    public function getEndTime()
    {
    	$this->endTimer();
    	$this->totaltime = $this->endtime - $this->starttime;
    	return $this->totaltime;
    }
    public function setLapTime()
    {
    	$time = microtime();
    	$next = count($this->laps) + 1;
    	$this->laps[$next] = $time;

    }
    public function timer( $action = 'lap' )
    {
    	switch($action)
    	{
    		case 'restart':
    			//restarts timer
    			$this->startTimer();
    		break;
    		case 'end':
    			$this->endTimer();
    		break;
    		case 'lap':
    			$this->setLapTime();
    		break;
    		case 'get':
    			return $this->getEndTime();
    		break;
    	}
    }
} 


//starts timer
$newTimer = new YeOldenTimey;



$totaltime = $newTimer->timer('get');
echo '<br />';
echo 'Total time elapsed: ' . $totaltime;

?>