<?php  

class YeOldenTimey 
{  
    public $starttime;
    public $endtime;
    public $totaltime;
    public $laps = array();

    //starts timer on ini
	public function __construct()  
    {  
        $this->startTimer();
    } 

    public function startTimer()  
    {  
        $this->starttime = microtime();  
    }

    public function endTimer()
    {
    	$this->endtime = microtime();
    }
    //calculates start/end time difference
    public function getTotalTime()
    {
    	$this->endTimer();
    	$this->totaltime = $this->endtime - $this->starttime;
    	return $this->totaltime;
    }
    //records a lap time
    public function setLapTime()
    {
    	$time = microtime();
    	$next = count($this->laps) + 1;
    	$this->laps[$next] = $time;

    }
    //main method
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
    			return $this->getTotalTime();
    		break;
    	}
    }
} 
/*
class YeOldLapTimes extends YeOldenTimey{

    //manages lap times
    public function getLapTime( $action, $lapTime )
    {
        switch($action)
        {
            case 'compare':

            break;
            case 'get':

            break;
        }
    }


}*/


?>