<?php
namespace Examples\orders\models;

use ActiveRecord\lib\Model;
class Payment extends Model
{
	// payment belongs to a person
	static $belongs_to = array(
		array('person'),
		array('order'));
}
?>
