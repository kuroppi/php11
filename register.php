<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type='text/css'>

    <style>
        .error {
            color: red;
        }
    </style>

</head>

<body>

    <h1 class="center register-header">Register</h1>

    <?php

    // Script 11.6 - register.php | Bob Painter
    
    // This script registers a user by storing their information in a text file and creating a directory for them
    
    // Identify the directory and file to use:
    
    $dir = '../users/';
    $file = $dir . 'users.txt';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $problem = FALSE;
        
        // Check for each value:
        
        if (empty($_POST['username'])) {
            $problem = TRUE;
            print '<p class="error">Please enter a username!</p>';
        }
        
        if (empty($_POST['password1'])) {
            $problem = TRUE;
            print '<p class="error">Please enter a password!</p>';
        }
        
        if ($_POST['password1'] != $_POST['password2']) {
            $problem = TRUE;
            print '<p class="error">Your password did not match your confirmed password!</p>';
        }
        
        if (!$problem) {
            
            if (is_writable($file)) {
                
                // Create the data to be written:
                
                $subdir = time() . rand(0, 4596);
                
                // The md5 function creates a hash: a mathematically calculated representation of a strong. So this script doesn't actually store the password but a representation of that password. The password is also trimmed to get rid of any extraneous spaces.
                
                $data = $_POST['username'] . "\t" . md5(trim($_POST['password1'])) . "\t" . $subdir . PHP_EOL;
                
                // Write the data:
                
                // FILE_APPEND - if the file filename already exists, append the data to the file instead of overwriting it.
                // LOCK_EX - Temporarily lock the file while PHP is writing to it.
                
                file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
                
                // Create the directory:
                
                mkdir ($dir . $subdir);
                
                // Print a message:
                
                print '<p>You are now registered!</p>';
                
            } else {
                
                // Could not write to file:

                print '<p class="error">You could not be registered due to a system error.</p>';
            }
            
        } else {
            
            // Forgot a field:
            
            print '<p class="error">Please go back and try again!</p>';
        }
        
    } else {
    
    // Display the form:
        
    ?>

        <form action="register.php" method="post">
            <p><input type="text" name="username" size="20" placeholder="Username"></p>
            <p><input type="password" name="password1" size="20" placeholder="Password"></p>
            <p><input type="password" name="password2" size="20" placeholder="Confirm Password"></p>
            <input type="submit" name="submit" value="Register">
        </form>

    <?php } ?>

</body>
</html>
