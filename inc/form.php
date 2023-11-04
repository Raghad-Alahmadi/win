<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

$errors = [
    'fnameError' => '',
    'lnameError' => '',
    'EmailError' => '',
];
if(isset($_POST['submit'])){





    if(empty($fname)){
        $errors['fnameError'] = 'Enter the first name';
    }

    if (empty($lname)){
        $errors['lnameError'] = 'Enter the Last name';
    }

    if (empty($email)){
        $errors['EmailError'] = 'Enter the Email';
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['EmailError'] = 'Enter the Correct Email';
    }

    if (!array_filter($errors)){
        
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);


        $sql = "INSERT INTO users(fname, lname, email) 
        VALUES ('$fname', '$lname','$email')";

        if (mysqli_query($conn, $sql)){
            header('Location: ' . $_SERVER['PHP_SELF']);
        }
        else{
            echo 'Error:' . mysqli_error($conn);
        }
    }


    
}

?>