<?php 
if($_SERVER['HTTP_AUTHORIZATION']){
    header("Location: /panel");
}