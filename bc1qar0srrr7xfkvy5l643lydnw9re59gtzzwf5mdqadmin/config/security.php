<?php
if (isset($_COOKIE['name'], $_COOKIE['email']) && !empty($_COOKIE['name']) && !empty($_COOKIE['email'])){
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['email'] = $_COOKIE['email'];
}else{
    header('location:/');
}


function defendData($user){
    if (empty($user)){
        header('location:/');
    }
}