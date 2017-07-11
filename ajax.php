<?
require 'functions.php';
// var_dump($_POST['action']);

if(isset($_POST['action']))
{
	switch ($_POST['action']) {
		case 'addguest': 	$status=addguest();
							// var_dump($status);
							print json_encode($status);
							// var_dump(print json_encode($status));
							break;
		
		case 'addevent' :   $status=addevent();
							// var_dump($status);
							print json_encode($status);
							break;
		case 'eventManager' : $status=eventManager();
							var_dump($status);
							print json_encode($status);
							break;
		case 'addrequest': $status=addrequest();
							var_dump($status);
							print json_encode($status);
								break;					
		case 'acceptrequest':$status=acceptrequest();
							var_dump($status);
							print json_encode($status);
							break;
		case 'declinerequest':$status=declinerequest();
							var_dump($status);
							print json_encode($status);
							break;
		case 'generatelink': $status=generatelink();
							 print json_encode($status);
							 break; 
		case 'login': $status=login();
							 print json_encode($status);
							 break; 
		case 'deleteevent': $status=deleteevent();
							 print json_encode($status);
							 break; 
		case 'confirmTable' : $status=confirmTable();
							 echo json_encode($status);
							break;
		case 'pendingTable' : $status=pendingTable();
							 echo json_encode($status);
							break;
		case 'remove' : $status=removerec();
							 echo json_encode($status);
							break;
		case 'approvedguest' : $status=approvedguest();
							 echo json_encode($status);
							break;
		case 'declinetable' : $status=declinedguest();
							 echo json_encode($status);
							break;
			default : echo "Invalid...";
					break;
	}
}