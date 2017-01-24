<?php
/**
 * Created by PhpStorm.
 * User: Kaspar
 * Date: 1/24/2017
 * Time: 12:34 PM
 */

// require the object creating and using class
require_once('text.php');
// create an object
$sentence = new text();
// control object output
echo '<pre>';
print_r($sentence);
echo '</pre>';
//set text
$sentence->setText("Hello text object!");
// control object output
echo '<pre>';
print_r($sentence);
echo '</pre>';
// show object output
$sentence->show();

echo '<hr/>';
// create an object with constructor
 $sentence2 = new text('Hello text by construct!');
 // control object output
 echo '<pre>';
 print_r($sentence2);
 echo '</pre>';
 // show object output
 $sentence2->show();
?>