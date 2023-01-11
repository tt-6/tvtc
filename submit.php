<?php

// Require Config File
require_once __DIR__ . "/config/app.php";

// When The User Submit The Form
if ( isset( $_POST['submit-btn'] ) ) {
    // Get User Input
    $fristName = $_POST['fristName'];
    $lastName  = $_POST['lastName'];
    $email     = $_POST['email'];

    // Handle Error Message
    $errorMessages = [];
    
    // Check If The Frist Name Is Empty Or Not
    if (empty($fristName)) {
        $errorMessages['frist_name'] = 'عذراً,يرجى إدخال الأسم الأول.';
    }

    // Check If The Last Name Is Empty Or Not
    if (empty($lastName)) {
        $errorMessages['last_name'] = 'عذراً,يرجى إدخال الأسم الأخير.';
    }

    // Check If The Email Is Empty Or Not
    if (empty($email)) {
        $errorMessages['email'] = 'عذراً,يرجى إدخال البريد الإلكتروني.';
    }

    // Validate Email
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errorMessages['email'] = 'عذراً,يرجى إدخال البريد الإلكتروني بشكل صحيح.';
    }

    // Check If The Data Is Clear
    if (empty($errorMessages)) {   
        // Set Query
        $saveUser = $mysql->prepare("INSERT INTO `users` (`frist_name`, `last_name`, `email`) VALUES (?, ?, ?)");

        // Set Parameters
        $saveUser->bind_param('sss',$fristName,$lastName,$email);

        // Execute The Query
        $saveUser->execute();

        // Redirect The User To Home Page
        echo '<script>location.href = "/"</script>';
        die();
    }

}

?>
<!DOCTYPE html>
<html lang="ar" dir='rtl'>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined">

        <!-- Favicon -->
        <link rel="shortcut icon" href="/" type="image/x-icon">

        <!-- CSS File -->
        <link rel="stylesheet" href="assets/css/submit.css">

        <!-- Page Title -->
        <title>تسجيل بالمسابقة</title>
    </head>
    <body>
        
        <!-- Image -->
        <div class="logo-image">
            <img src="assets/image/submit.png" alt="Logo Image" width='100px' height='100px'>
        </div>
        
        <!-- Heading Text -->
        <h1>سجل الأن بالمسابقة</h1>

        <!-- Form -->
        <form action="" method="post">
            <!-- Frist Name Container -->
            <div class="input-container">
                <!-- Label -->
                <label for="frist-name">الأسم الأول</label>

                <!-- Input -->
                <input type="text" id="frist-name" name="fristName" placeholder='الأسم الأول'>

                <?php if (isset($errorMessages['frist_name'])) { ?>
                    <!-- Error Message -->
                    <span class="error-message"><?= $errorMessages['frist_name'] ?></span>
                <?php } ?>   
            </div>

            <!-- Last Name Container -->
            <div class="input-container">
                <!-- Label -->
                <label for="last-name">الأسم الأخير</label>

                <!-- Input -->
                <input type="text" id="last-name" name="lastName" placeholder='الأسم الأخير'>

                <?php if (isset($errorMessages['last_name'])) { ?>
                    <!-- Error Message -->
                    <span class="error-message"><?= $errorMessages['last_name'] ?></span>
                <?php } ?>
            </div>

            <!-- Email Container -->
            <div class="input-container">
                <!-- Label -->
                <label for="email">البريد الإلكتروني</label>

                <!-- Input -->
                <input type="email" id="email" name="email" placeholder='البريد الإلكتروني'>

                <?php if (isset($errorMessages['email'])) { ?>
                    <!-- Error Message -->
                    <span class="error-message"><?= $errorMessages['email'] ?></span>
                <?php } ?>
            </div>
    
            <!-- Submit Button -->
            <input type="submit" name="submit-btn" value="تسجيل">

            <!-- Sub Text -->
            <a href="/" class="sub-text">اوافق على شروط وسياسيات الموقع.</a>
        </form>
        
    </body>
</html>