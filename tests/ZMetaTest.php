<?php
/**
 * meta test - to run code linter
 *
 * Matt Smith changes, Feb 2016
 *
 * (1) hard code shell command to: "php php-cs-fixer.phar"
 * (just have to assume this file is sitting in project folder next to composer.json)
 *
 * (2) hard code location of "index.php" to be "./public/index.php"
 * (might be 'web' in some projects, such as Symfony)
 *
 * adaapted from: J. P. Stacey website
 * http://www.jpstacey.info/blog/2015-07-08/phpunit-can-check-your-code-against-psr-2-and-other-coding-standards
 *
 * start with letter 'Z' so this test run last ...
 */

namespace ItbTest;

use Itb\Martial;

/**
 * @class
 * Test properties of our codebase rather than our actual code.
 */
class ZMetaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * /src
     */

    public function testIfWorking(){

        $this->assertEquals(1,1);
    }

    public function  testAverageAttendance(){

        $martial = new Martial();
        $attendance = $martial->getAttendance();
        $totalClasses = $martial->getTotalClasses();

        $average = $attendance/7*100;
        return $average;
    }

    public function testId()
    {
        $martial = new Martial();
        return $martial->getId();

    }

    public function testClassName()
    {
        $martial = new Martial();
        return $martial->getClassName();
    }

    /**
     * Gets the category
     * @return string
     */

    public function testCategory()
    {
        $martial = new Martial();
        return $martial->getCategory();
    }

    /**
     * returns how many classes you have attended
     * @return int
     */
    public function testAttendance()
    {
        $martial = new Martial();
        return $martial->getAttendance();
    }

    /**
     * gets the total classes that ha happened
     * @return int
     */

    public function testTotalClasses()
    {
        $martial = new Martial();
        return $martial->getTotalClasses();
    }

    /**
     * gets the time in which a student was created
     * @return mixed
     */

    public function testTimeOfEntry()
    {
        $martial = new Martial();
        return $martial->getTimeOfEntry();
    }

    /**
     * returns the progression of  student.
     * @return int
     */
    public function testCurrentClassProgress()
    {
        $martial = new Martial();
        return $martial->getCurrentClassProgress();
    }

}
