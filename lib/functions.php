<?php

/** Function Library **/

/** #DEBUGGING **/
function dbga($array){
  echo "<div class=\"clearfix\"><pre>";
  print_r($array);
  echo "</pre></div>";
}

/** Style and Script loader **/
function loadCSS($css){
  if(is_array($css)){
    foreach($css as $i => $file){
      echo "<link href=\"/css/" . $file . "\" rel=\"stylesheet\" />\n";
    }
  }
  else {
    echo "<link href=\"/css/" . $file . "\" rel=\"stylesheet\" />\n";
  }
}

function loadJS($js){
  if(is_array($js)){
    foreach($js as $i => $file){
      echo "<script src=\"/js/" . $file . "\"></script>\n";
    }
  }
  else {
    echo "<script src=\"/js/" . $file . "\"></script>\n";
  }
}

/** Third party component style loader **/
function loadVendorScripts( $path ){
  $fileList = scandir(ROOT . DS . 'public' . DS . $path . DS . 'vendor' . DS);

  foreach($fileList as $file){
    if($file != '.' & $file != '..'){
      if($path == 'css'){
        echo "<link href=\"" . DS . $path . DS . 'vendor' . DS . $file . "\" rel=\"stylesheet\" />\n";
      }
      elseif($path == 'js') {
        echo "<script src=\"" . DS . $path . DS . 'vendor' . DS . $file . "\"></script>\n";
      }
    }
  }
}

/** check for value **/
function ckv($arr, $key){
  return (
    is_array($arr) && isset($arr) && (
      isset($arr[$key]) || array_key_exists($key, $arr) ) ?
      $arr[$key] : null
    );
}
function checkSelect($obj, $id){
  if($obj == $id){
    echo "selected";
  }
}
/** Database functions **/
function query_placeholders($params, $insert = false){
  $placeholders = array();
  if($insert == true){
    foreach($params as $field => $value){
      $placeholders[] = ':'.$field;
    }
  }
  else {
    foreach($params as $field => $value){
      $placeholders[] = $field . ' = :'.$field;
    }
  }
  return $placeholders;
}


function displayDate($date){
  if(!is_null($date)){
    $Date = DateTime::createFromFormat('Y-m-d', $date);
    return $Date->format('d/m/Y');
  }
  else {
    return null;
  }
}

function status($status, $applies = null){
  if(!is_null($applies) && $applies > 0) {
    $status = $status + 1;
  }
  switch($status){
    case 0: {
      $state_icon = '';
      break;
    }
    case 1: {
      $state_icon = 'fa-times';
      break;
    }
    case 2: {
      $state_icon = 'fa-check';
      break;
    }

  }
  $wrap = '<div class="jocasta-status jocasta-status-' . $status . '">';
  $wrap .= '<span class="fal ' . $state_icon . '"></span>';
  $wrap .= '</div>';

  echo $wrap;
}

/** check for value in meta object, return selected/checked **/
function metaCheck($meta, $data, $value, $type = 'select'){
  if(!empty($data)){
    foreach($data as $i){
      if($i->{$meta} == $value){
        return ($type == 'select' ? ' selected ' : ' checked ');
      }
    }
    return '';
  }
}

/** rearrange $_FILES **/
function rearrange_files($file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    dbga($file_keys);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i]['file'];
        }
    }

    return $file_ary;
}


/** Shorten long titles **/
function hellip($title, $length = 60){
  return (strlen($title) > $length ? substr($title, 0, $length) . '&hellip;' : $title);
}


/** Clean string - converts to flat chars, no accents or punctuation **/
function cleanString($string){
    $unwanted_array = array(
                        'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A',
                        'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C',
                        'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I',
                        'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U',
                        'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'ss', 'à'=>'a', 'á'=>'a',
                        'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i',
                        'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u',
                        'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'Ğ'=>'G',
                        'İ'=>'I', 'Ş'=>'S', 'ğ'=>'g', 'ı'=>'i', 'ş'=>'s', 'ü'=>'u',
                        'ă'=>'a', 'Ă'=>'A', 'ș'=>'s', 'Ș'=>'S', 'ț'=>'t', 'Ț'=>'T'
                        );
    return strtr( $string, $unwanted_array );
}

function emptyParagraph($str){
  if(empty( strip_tags(trim(trim( str_replace('N.A.', '', $str)))) )){
    return true;
  }
  else {
    return false;
  }
}

/** make printable list from multidimensional array of objects **/
function printList($array, $prop, $print = false){
  $list = array();
  foreach($array as $i){
    $list[] = $i->$prop;
  }
  $list = implode(', ', $list);
  if($print == true){
    echo $list;
  }
  return $list;
}


function FileSizeConvert($bytes){
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
