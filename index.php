<?php
  #remove the directory path we don't want
  $request  = str_replace("", "", $_SERVER['REQUEST_URI']);
 
  #split the path by '/'
  $params = explode("/", $request);

  $safe_pages = array("home", "anime");
   
  if(in_array($params[1], $safe_pages)) {
    switch($params[1]) {
      case 'anime':
        if($params[3] == "episode"){
          include('anime-watching.php');
        } else {
          include('anime-details.php');
        }
        break;
      default:
        include($params[1].".php");
    }
  } else {
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: /home"); 
    exit;
  }