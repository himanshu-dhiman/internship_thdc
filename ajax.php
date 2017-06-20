<?
require 'functions.php';
var_dump($_POST['action']);

if(isset($_POST['action']))
{
	switch ($_POST['action']) {
		case 'addguest': 	$status=addguest();
							var_dump($status);
							print json_encode($status);
							break;
		
		case 'addevent' :   $status=addevent();
							var_dump($status);
							print json_encode($status);
							break;
		case 'eventManager' : $status=eventManager();
							var_dump($status);
							print json_encode($status);
							break;

			default : echo "Invalid...";
					break;
	}
}