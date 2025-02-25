<?php
namespace Test;

use Test\models\Author;
use ActiveRecord\DateTime;
use Test\helpers\DatabaseTest;

class DateFormatTest extends DatabaseTest
{

	public function test_datefield_gets_converted_to_ar_datetime()
	{
		//make sure first author has a date
		$author = Author::first();
		$author->some_date = new DateTime();
		$author->save();
		
		$author = Author::first();
		$this->assert_is_a("ActiveRecord\\DateTime",$author->some_date);
	}

};
?>
