<?php
function getArrayStatus(){
    $arrStatus = [
      '0' => 'Blocked',
      '1' => 'Active'
    ];
    return $arrStatus;
}
function getStatus($status){
	switch ($status) {
	    case 1:
	        echo "<span>Active</span>";
	        break;
	    default:
	        echo "<span>Blocked</span>";
	}
}

function getImageTopTour($image){
	return !empty($image) ?  $image : 'public/home/img_default/single_tour_top_1.jpg';
}