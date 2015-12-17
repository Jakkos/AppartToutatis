<?php
function getDebutSemaine($s) {
	switch ($s) {
		case 25 : 
		return "01/07/2016";
		break;
		case 26 : 
		return "08/07/2016";
		break;
		case 27 : 
		return "15/07/2016";
		break;
		case 28 : 
		return "22/07/2016";
		break;
		case 29 : 
		return "01/08/2016";
		break;
		case 30 : 
		return "7/08/2016";
		break;
		case 31 : 
		return "15/08/2016";
		break;
		case 32 : 
		return "22/08/2016";
		break;
		default : 
		break;
	}
}

function getFinSemaine($s) {
	switch ($s) {
		case 25 : 
		return "07/07/2016";
		break;
		case 26 : 
		return "14/07/2016";
		break;
		case 27 : 
		return "21/07/2016";
		break;
		case 28 : 
		return "28/07/2016";
		break;
		case 29 : 
		return "07/08/2016";
		break;
		case 30 : 
		return "14/08/2016";
		break;
		case 31 : 
		return "21/08/2016";
		break;
		case 32 : 
		return "28/08/2016";
		break;
		default : 
		break;
	}
}

?>