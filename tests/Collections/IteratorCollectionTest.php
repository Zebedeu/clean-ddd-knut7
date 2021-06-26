<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 08/04/18
 * Time: 19:16
 */

use PHPUnit\Framework\TestCase as PHPUnit;
use Ballybran\Core\Collections\Collection\IteratorCollection;

class IteratorCollectionTest extends PHPUnit
{


    private $it;

    protected function setUp() : void
    {
        $this->it = new IteratorCollection(['name' => 'John Doe' , 'age' => 100 , 'adress' => 'San Diego']);
    }

    public function testIfResturnToArray()
    {
        $return = $this->it->toArray();

        $this->assertEquals(['name' => 'John Doe' , 'age' => 100 , 'adress' => 'San Diego'] , $return);
    }

    public function testIfCount()
    {
        $return = $this->it->count();

        $this->assertEquals(3 , $return);
    }

    public function testIfReturnnAcurrent()
    {

        $return = $this->it->current();
        $this->assertEquals('John Doe' , $return);

    }

    public function testIfReturnnAcontains()
    {

        $return = $this->it->contains('John Doe');
        $this->assertTrue($return);

    }

    public function testIfReturnnNext()
    {

        $return = $this->it->next();
        $this->assertEquals(100 , $return);

    }

    public function testIfReturnLast()
    {

        $return = $this->it->last();
        $this->assertEquals('San Diego' , $return);

    }

    public function testIfReturnFirst()
    {

        $return = $this->it->first();
        $this->assertEquals('John Doe' , $return);

    }

    public function testIfReturnKey()
    {

        $return = $this->it->key('name');
        $this->assertEquals('name' , $return);

    }

    public function testIfReturnContainsKey()
    {

        $return = $this->it->containsKey('name');
        $this->assertTrue($return);

    }

    public function testIfReturnOffsetExists()
    {

        $return = $this->it->offsetExists('name');
        $this->assertTrue($return);

    }

    public function testIfReturnRemove()
    {

        $return = $this->it->remove('name');
        $this->assertEquals('John Doe' , $return);

    }

    public function testIfReturnRemoveEleme()
    {

        $return = $this->it->removeEleme('John Doe');
        $this->assertTrue($return);

    }

    public function testIfReturnAdd()
    {

        $this->it->add('johndoe@gmail.com');
        $this->assertEquals(['johndoe@gmail.com' , 'name' => 'John Doe' , 'age' => 100 , 'adress' => 'San Diego'] , $this->it->toArray());

    }

    public function testIfReturnSet()
    {

        $this->it->set(0 , 'johndoe@email.com');
        $this->assertEquals(['johndoe@email.com' , 'name' => 'John Doe' , 'age' => 100 , 'adress' => 'San Diego'] , $this->it->toArray());

    }

    public function testIfReturnKsort()
    {

        $this->it->ksort();
        $this->assertEquals(['age' => 100 , 'name' => 'John Doe' , 'adress' => 'San Diego'] , $this->it->toArray());

    }

    public function testIfReturnNatSort()
    {

        $this->it->natSort();
        $this->assertEquals(['age' => 100 , 'name' => 'John Doe' , 'adress' => 'San Diego'] , $this->it->toArray());

    }

    public function testIfReturnNatcasesort()
    {

        $this->it->natcasesort();
        $this->assertEquals(['age' => 100 , 'name' => 'John Doe' , 'adress' => 'San Diego'] , $this->it->toArray());

    }

    public function testIfReturnIndexOf()
    {

        $this->it->indexOf('age');
        $this->assertEquals(['age' => 100 , 'name' => 'John Doe' , 'adress' => 'San Diego'] , $this->it->toArray());

    }

    public function testIfReturnIsEmpty()
    {

        $return = $this->it->isEmpty();
        $this->assertFalse($return);

    }

    public function testIfReturnGetValues()
    {

        $return = $this->it->getValues();
        $this->assertEquals([0 => 'John Doe' , 1 => 100 , 2 => 'San Diego'] , $return);

    }

    public function testIfReturnGetKey()
    {

        $return = $this->it->getKey();
        $this->assertEquals([0 => 'name' , 1 => 'age' , 2 => 'adress'] , $return);

    }

    public function testIfReturnGet()
    {

        $return = $this->it->get('name');
        $this->assertEquals('John Doe' , $return);

    }
//
//    public function testIfReturnSlice(){
//
//        $return = $this->it->slice(0,2);
//        $this->assertEquals(     $return, null);
//
//    }


}