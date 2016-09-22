<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type='text/css'>
</head>

<body>

    <h1 class="center register-header">Login</h1>
    
    <?php 
    
    // Script 11.8 - login.php | Bob Painter
    
    // This script logs a user in by checking the stored values in the text file.

    $file = '../users/users.txt';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $loggedin = FALSE;
        
        // Enable auto_detect_line settings:
        
        ini_set('auto_detect_line_endings', 1);
        
        // Open the file:
        
        $fp = fopen($file, 'rb');
        
        // Loop through the file:
        
        while ($line = fgetcsv($fp, 200, "\t")) {
            
            // Check the file data against the submitted data:
            
            if ( ($line[0] == $_POST['username']) AND ($line[1] == md5(trim($_POST['password']))) ) {
                
                $loggedin = TRUE;
                break;
            }
        }
        
        fclose($fp);
        
        // Print a message
        
        if ($loggedin) {
            print '<p>You are now logged in.</p>';
        } else {
            print '<p style="color: red;">The username and password you entered do not match those on file.</p>';
        }
        
    } else {
        
        // Display the form:
        
    ?>
       
        <form action="login.php" method="post">
           <p><input type="text" name="username" size="20" placeholder="Username"></p>
           <p><input type="password" name="password" size="20" placeholder="Password"></p>
           <input type="submit" name="submit" value="Login">
        </form>
            
    <?php } ?>

</body>

</html>
