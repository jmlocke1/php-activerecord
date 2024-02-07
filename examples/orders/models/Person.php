<?php
namespace Examples\orders\models;

use ActiveRecord\lib\Model;

class Person extends Model
{
	// a person can have many orders and payments
	static $has_many = array(
		array('orders'),
		array('payments'));

	// must have a name and a state
	static $validates_presence_of = array(
		array('name'), array('state'));
}
?>
