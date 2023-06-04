<?php
    @include 'config.php';

    session_start();

    if(!isset($_SESSION['student_name'])){
        head('location:login_form.html');
    }
?>   