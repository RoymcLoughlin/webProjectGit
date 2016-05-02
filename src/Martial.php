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
     * reads in the name of the class in which they take.
     * @var string $className
     */

    private $className;

    /**
     * used to find belt rank.
     * @var string $category
     */
    private $category;

    /**
     * used to find the amount of classes a student has attended
     * @var int $attendance
     */
    private $attendance;

    /**
     * adds one for every class, used to find the average classes a student actually attends
     * @var integer $totalClasses
     */
    private $totalClasses;

    /**
     * gets the current time and date a student attends a class
     * @var $timeOfEntry
     */
    private $timeOfEntry;

    /**
     * used to record the progress of a student
     * @var int $currentClassProgram
     */

    private $currentClassProgram;



    public function getId()
    {
        return $this->id;
    }

    public function getClassName()
    {
        return $this->className;
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