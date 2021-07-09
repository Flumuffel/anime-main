<?php
  #remove the directory path we don't want
  $request  = str_replace("", "", $_SERVER['REQUEST_URI']);
 
  #split the path by '/'
  $params = explode("/", $request);

  $safe_pages = array("home");
   
  if(in_array($params[0], $safe_pages)) {
    include($params[0].".php");
  } else {
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: /home"); 
    exit;
  }