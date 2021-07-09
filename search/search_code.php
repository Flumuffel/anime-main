<?php

    if(isset($_POST['search'])){
        header("Location: /anime/".$_POST['search']);
    }