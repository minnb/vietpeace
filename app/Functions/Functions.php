<?php
function print_result($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function makeUnicode($str){
  	        if(!$str) return false;
  	        $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
  	            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
  	            'd'=>array('đ'),
  	            'D'=>array('Đ'),
  	            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
  	            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
  	            'i'=>array('í','ì','ỉ','ĩ','ị'),
  	            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
  	            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
  	            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
  	            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
  	            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
  	            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
  	            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
  	            '-'=>array(' ','&quot;','.',"'",'"','[',']','/','---','--','-–-'),
                '+'=>array('?','(',')'),
                '�'=>array('')
  	        );

  	        foreach($unicode as $nonUnicode=>$uni){
  	        	foreach($uni as $value)
            	$str = str_replace($value,$nonUnicode,$str);
  	        }
			$str=trim(strtolower($str));
      $str=rtrim($str,"-");
    	return $str;
}

function getImageInContent($content){
	$first_img = '';
	ob_start();
	ob_end_clean();
  if(strlen($content) > 0){
    $output = preg_match_all('/.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    $first_img = $matches [1] [0];
  }else{
    $first_img = '';
  }
	
	if(empty($first_img)){
    $first_img = "/images/default.jpg";
	}
	
	if (strlen(strstr($first_img, "youtube")) > 0) {
		return "http://i.ytimg.com/vi/".substr($first_img,30)."/0.jpg";
	}
  else
  {
		return $first_img;
	}

}

function fdecrypt($string) {
    $key ='11223344556677889900ABCSDESASFSFAFSFSFSFSFSFA';
    $result = '';
    $string = base64_decode($string);
    for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
    }
    return $result;
}

function fencrypt($string) {
    $key ='11223344556677889900ABCSDESASFSFAFSFSFSFSFSFA';
    $result = '';
    for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
    }
    return base64_encode($result);
}

function menuMulti ($data, $parent_id = 0, $str="---|", $select=0) {
  foreach ($data as $val) {
    $id = $val->id;
    $name = $val->name;
    if ($val->parent == $parent_id) {
      if ($select != 0 && $id == $select) {
        echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
      } else {
        echo '<option value="'.$id.'" >'.$str." ".$name.'</option>';
      }
      $space ="---";
      menuMulti ($data, $id, $space." ---|",$select);
    }
  }
}

//use for array
function selectedOption($array,$select){
  foreach($array as $key=>$value){
    if($key == $select && $select != '' ){
        echo '<option value="'.$key.'" selected>'.$value.' </option>';
    }else{
        echo '<option value="'.$key.'">'.$value.'</option>';
    }
  }
}
//use for get from Models
function getSelectForm($data, $select = 0){
  foreach($data as $value){
    $id = $value->id;
    $name = $value->name;
    if($id == $select && $select != ''){
      echo '<option  value="'.$id.'" selected>'.$name.' </option>';
    }else{
      echo '<option  value="'.$id.'">'.$name.'</option>';
    }
  }
}
function getSelectArrayForm($data, $select){
  foreach($data as $value){
    $id = $value->id;
    $name = $value->name;
    if($select != null){
      foreach($select as $item){
        if($id == $item){
          echo '<option  value="'.$id.'" selected>'.$name.' </option>';
        }else{
          echo '<option  value="'.$id.'">'.$name.'</option>';
        }
      }
    }
  }
}

function convertStrToArr($char, $str){
  return explode($char, $str);
}
function convertArrToStr($char, $str){
  return implode($char, $str);
}

function checkFolderImage(){
  $path_server = 'public/uploads/images';
  $str = date("Ym");
  $path = $path_server.'/'.$str;
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
  return $path;
}

function randomString($length = 10){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function getImage($link){
  $path = 'public/image/no_image.svg';
  return File::exists($link) ? $link : $path;
}
function delete_image_by_path($image,$path){
  $img = $path.'/'.$image;
  if(File::exists($img)){
      File::delete($img);
  }
}
function delete_image_no_path($img){
  if(File::exists($img)){
    File::delete($img);
  }
}

include('Common.php');