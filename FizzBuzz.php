<?php
/**
 * FizzBuzz
 * @see https://codedojos.wordpress.com/kata-ubersicht/kata-fizzbuzz/
 *
 *
 * @author ce
 * @since 2015-03-30
 */

namespace CcdBodensee\FizzBuzz;
/**
 * FizzBuzz
 * @see https://codedojos.wordpress.com/kata-ubersicht/kata-fizzbuzz/
 *
 *
 * @author ce
 * @since 2015-03-30
 */



for($i = 0; $i <= 100; $i++){
    switch ($i) {
        case $i % 3 == 0 && $i % 5 == 0:
            $s = "fizzbuzz";
            break;
        case $i % 3 == 0:
            $s = "fizz";
            break;
        case $i % 5 == 0:
            $s = "buzz";
            break;
        default:
            $s = $i;
            break;
    }
    echo $s ."\n";
}
exit();
//////////////////////////////////////
$fizzbuzzrun = new FizzBuzz();
$fizzbuzzrun->run();

class Rules {

    const BUZZ_NUMBER = 5;
    const BUZZ_STRING = "BUZZ";
    const FIZZ_NUMBER = 3;
    const FIZZ_STRING = "FIZZ";

}

class Fizz {
    const NUMBER = 3;
    const STRING = "FIZZ";

    public function getNumber() {
        return self::NUMBER;
    }

    public function getString() {
        return self::STRING;
    }

    public static function isFizz($i) {
        //@todo: checks for valid input
        $state = false;
        if($i % self::NUMBER == 0) {
            $state = true;
        }
        return $state;
    }
}

class Buzz {
    const NUMBER = 5;
    const STRING = "BUZZ";

    public static function isBuzz($i) {
        //@todo: checks for valid input
        $state = false;
        if($i % self::NUMBER == 0) {
            $state = true;
        }
        return $state;
    }
}


class ResultBuffer {

    private $Buffer = array();

    public function add($value) {
        $this->Buffer[] = $value;
    }

    public function getContent() {
        return $this->Buffer;
    }
}

class FizzBuzz {

    private $counter = null;

    private $ResultBuffer = null;

    public function __construct() {
        $this->counter = 0;
        $this->end = 100;
        $this->ResultBuffer = new ResultBuffer();
    }

    public function run() {

        //@todo: checks for valid numbers, should go into an init/factory call

        while ($this->counter <= $this->end) {
            $this->ResultBuffer->add($this->isFizzBuzz($this->counter));
            $this->counter ++;
        }

        foreach($this->ResultBuffer->getContent() as $value) {
            echo $value ."\n";
        }
    }


    private function isFizzBuzz($i) {

        switch ($i) {
            case Fizz::isFizz($i) && Buzz::isBuzz($i):
                $s = Fizz::STRING . Buzz::STRING;
                break;
            case $i % 3 == 0:
                $s = Fizz::STRING;
                break;
            case $i % 5 == 0:
                $s = Buzz::STRING;
                break;
            default:
                $s = $i;
                break;
        }

        return $s;
    }

}


class FizzBuzzRunner {

    /**
     * @var
     */
    private $start;

    /**
     * @var
     */
    private $end;

    /**
     *
     */
    public function run() {


        for($this->start; $this->start <= $this->end; $this->start++){
           switch ($this->start) {
               case $this->start % 3 == 0 && $this->start % 5 == 0:
                   $s = "fizzbuzz";
                   break;
               case $this->start % 3 == 0:
                   $s = "fizz";
                   break;
               case $this->start % 5 == 0:
                 $s = "buzz";
                   break;
               default:
                   $s = $this->start;
                   break;
           }
           echo $s ."\n";
       }

    }
}

class FizzBuzzTest extends PHPUnit_Framework_TestCase {
    /**
     * @dataProvider fizzingNumbers
     */
    public function isFizzing($i) {
        $this->assertEquals(Fizz::STRING, Fizz::isFizz($i), "The fizzing calculation is incorrect for number $i");
    }

    /**
     * data for fizzing
     */
    public function fizzingNumbers() {
        return array(
           array(
               3,
           ),
            array(
                6,
            )
        );
    }
}