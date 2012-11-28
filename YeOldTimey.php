<?php  

/** 
 * Ye OldenTimey
 * 
 * A stupid simple tool that helps with timing php scripts.
 * 
 * 
 * @author Juan Orozco <juanthedesigner@gmail.com> 
 * @copyright 2012 Juan Orozco
 */  

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

    private function startTimer( $reset = false )  
    {  
        $this->starttime = microtime(true); 
        if  ( $reset == true ) $this->endtime = null;
    }

    private function endTimer()
    {
    	$this->endtime = microtime(true);
    }
    //calculates start/end time difference
    private function getTotalTime()
    {
    	$this->endTimer();
    	$this->totaltime = $this->endtime - $this->starttime;
    	return $this->totaltime;
    }
    //records a lap time
    private function setLapTime( $name = '' )
    {
    	$time = microtime(true);
    	if ( $name == '' OR empty($name) ) $this->laptimes[]=$time;
    	else $this->laptimes[$name] = $time;
    }
    //gets lap time by name, if no name passed, returns all as array
    private function getLapTime( $name = '' )
    {
        if ( $name == '' OR empty($name) ) return $this->laptimes;
            else return $this->laptimes[ $name ];
    }

    //main lap time method
    public function laps( $action = 'set', $name = '' )
    {
        switch( $action )
        {
            case 'get':
                return $this->getLapTime($name);
            break;
            case 'set':
                $this->setLapTime($name);
                return true;
            break;
            case 'compare':
                //compares to end time or to current time.
                $laptime = $this->getLapTime($name);
                $endtime = empty($this->endtime) ? microtime(true) : $this->endtime;
                $totaltime = $endtime - $laptime;
                return $totaltime;
            break;
            default:
            // default to set
                $this->setLapTime($name);
                return true;
            break;
        }
    }

    //main timer method
    public function timer( $action = 'lap', $force = false )
    {
        switch( $action )
        {
            case 'restart':
                //restarts timer
                $this->startTimer($force);
                return true;
            break;
            case 'end':
                $this->endTimer();
                return true;
            break;
            case 'get':
                return $this->getTotalTime();
            break;
            default:
            //trigger a lap
                $this->laps();
                return true;
            break;
        }
    }
} 
?>