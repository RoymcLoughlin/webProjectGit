<?php
namespace Itb;

// use as reference
use Mattsmithdev\PdoCrud\DatabaseTable;

class Martial extends DatabaseTable
{
    /**
     * the unique ID of the object
     * @var int
     */

    private $id;

    /**
     * @var string $title
     */

    private $className;

    /**
     * (should become ID of separate CATEGORY class ...)
     * @var string $category
     */
    private $category;

    /**
     * @var text
     */
    private $attendance;

    /**
     * integer value from 0 .. 100
     * @var integer
     */
    private $totalClasses;

    /**
     * @var integer
     */
    private $timeOfEntry;

    /**
     * @return date
     */

    private $currentClassProgram;

    /**
     * @return int
     */


    public function getId()
    {
        return $this->id;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getAttendance()
    {
        return $this->attendance;
    }

    public function getTotalClasses()
    {
        return $this->totalClasses;
    }

    public function getTimeOfEntry()
    {
        return $this->timeOfEntry;
    }

    public function getCurrentClassProgress()
    {
        return $this->currentClassProgram;
    }


    /**
     * function will exit with first return
     * so conditions ordered strongest test first, down to weakest test ...
     *
     * @return string
     */
//    public function getStarImageHTML()
//    {
//        $message = 'num votes = ' . $this->numVotes;
//        die($message);
//
//        if ($this->numVotes < 1){
//            return '(no votes yet)';
//        }
//
//        if ($this->voteAverage > 80){
//            return  '<img src="images/stars5.png" alt="five starts star">';
//        }
//
//        if ($this->voteAverage > 60){
//            return  '<img src="images/stars4.png" alt="four star">';
//        }
//
//        if ($this->voteAverage > 45){
//            return  '<img src="images/stars3.png" alt="three star">';
//        }
//
//        if ($this->voteAverage > 25){
//            return  '<img src="images/stars2.png" alt="two star">';
//        }
//
//        if ($this->voteAverage > 10){
//            return  '<img src="images/stars1.png" alt="one star">';
//        }
//
//         if get here, just give half a star
//        return  '<img src="images/starsHalf.png" alt="half star">';

//    }

}