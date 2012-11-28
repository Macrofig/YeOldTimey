<?php  

class YeOldenTimey 
{  
    public $starttime;
    public $endtime;
    public $totaltime;
    public $laptimes = array();

    //starts timer on ini
	public function __construct()  
    {  
        $this->startTimer();
    } 

    public function startTimer()  
    {  
        $this->starttime = microtime(true);  
    }

    public function endTimer()
    {
    	$this->endtime = microtime(true);
    }
    //calculates start/end time difference
    public function getTotalTime()
    {
    	$this->endTimer();
    	$this->totaltime = $this->endtime - $this->starttime;
    	return $this->totaltime;
    }
    //records a lap time
    public function setLapTime( $name = '' )
    {
    	$time = microtime(true);
    	if ( $name == '' OR empty($name) ) $this->laptimes[]=$time;
    	else $this->laptimes[$name] = $time;
    }
    public function getLapTime( $name = '' )
    {
        if ( $name == '' OR empty($name) ) return $this->laptimes;
            else return $this->laptimes[ $name ];
        
    }


    public function laps( $action = 'set', $name = '' )
    {
        switch( $action )
        {
            case 'get':
                return $this->getLapTime($name);
            break;
            case 'set':
                $this->setLapTime($name);
            break;
            case 'compare':
                $laptime = $this->getLapTime($name);
                $endtime = empty($this->endtime) ? microtime(true) : $this->endtime;
                $totaltime = $endtime - $laptime;
                //echo $endtime;
                //echo $laptime;
                return $totaltime;
            break;
            default:
            // default to set
                $this->setLapTime($name);

            break;
        }
    }
    //main method
    public function timer( $action = 'lap' )
    {
        switch( $action )
        {
            case 'restart':
                //restarts timer
                $this->startTimer();
            break;
            case 'end':
                $this->endTimer();
            break;
            case 'get':
                return $this->getTotalTime();
            break;
            default:
            //trigger a lap
                $this->laps();

            break;
        }
    }
} 
?>