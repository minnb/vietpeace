<?php
function getStatus($status){
	switch ($status) {
	    case 1:
	        echo "<span>Active</span>";
	        break;
	    default:
	        echo "<span>Disable</span>";
	}
}