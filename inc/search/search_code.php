<?php

    if(isset($_POST['search'])){
        header("Location: /anime/".str_replace(' ', '+', $_POST['search']));
    }