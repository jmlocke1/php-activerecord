<?php
namespace Test\models\NamespaceTest\SubNamespaceTest;

use ActiveRecord\lib\Model;

class Page extends Model
{
	static $belong_to = array(
		array('book', 'class_name' => '\NamespaceTest\Book'),
	);
}
?>
