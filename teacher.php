<?php
    @include 'config.php';

    session_start();

    if(!isset($_SESSION['teacher_name'])){
        head('location:login_form.html');
    }
?>   