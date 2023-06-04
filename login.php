<?php
    @include 'config.php';

    session_start();

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['submit']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST[cpassword]);
        $user_type = $_POST['user_type'];


        $select =
        "SELECT * 
        FROM user_form 
        WHERE email = '$email' && password = '$pass'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);

            if($row['user_type']=='teacher'){

                $_SESSION['teacher_name'] = $row['name'];
                header('location: teacher_page.php');
            }
            elseif ($row['user_type']=='student'){

                $_SESSION['student_name'] = $row['name'];
                header('location: student_page.php');
            }
        }
        else{
        $error[] = 'incorrect email or password!'
        }
    }

    if(isset($error)){
        foreach ($error as error){
            echo '<span class="error-msg">'.$error.'</span>';
        }
                        
    };
    
?> 