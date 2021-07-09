<?php
  #remove the directory path we don't want
  $request  = str_replace("/", "", $_SERVER['REQUEST_URI']);
 
  #split the path by '/'
  $params     = split("/", $request);

  print_r($params)