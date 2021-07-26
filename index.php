<?php
  #remove the directory path we don't want
  $request  = str_replace("", "", $_SERVER['REQUEST_URI']);
 
  #split the path by '/'
  $params = explode("/", $request);

  $safe_pages = array("home", "anime", "search", "panel");
   
  if(in_array($params[1], $safe_pages)) {
    switch($params[1]) {
      case 'anime':
        if(isset($params[3]) && $params[3] == "episode"){
          include('anime-watching.php');
        } else {
          include('anime-details.php');
        }
        break;
      case 'panel':
        if(isset($params[2])){
          include('admin/panel-details.php');
        } else {
          include('admin/panel-search.php');
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