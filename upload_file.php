<!DOCTYPE html>
<html>

<head>
    <title>Upload A File</title>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type='text/css'>
</head>

<body>

    <?php
    
    // Script 11.4 - upload_file.php - Bob Painter
    // This script displays and handles an HTML form. This script takes a file upload and stores it on the server.
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Try to move the uploaded file:
        
        if (move_uploaded_file($_FILES['the_file']['tmp_name'], "../uploads/{$_FILES['the_file']['name']}")) {
            print '<p>Your file has been uploaded.</p>';
            
        } else {
            print '<p style="color: red;">Your file could not be uploaded because: ';
            
            // Print a message based upon the error:
            
            switch ($_FILES['the_file']['error']) {
            
                case 1:
                    print 'The file exceeds the upload_max_filesize setting in php.ini';
                    break;
                case 2:
                    print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
                    break;
                case 3:
                    print 'The file was only partially uploaded.';
                    break;
                case 4:
                    print 'No file was uploaded';
                    break;
                case 6:
                    print 'The temporary folder does not exist';
                    break;
                default:
                    print 'Something unforseen happened.';
                    break;
            }
            
            print '</p>';
            
        }   // end of uploaded
    }   // end of if

    ?>
    
    <form action="upload_file.php" enctype="multipart/form-data" method="post">
        <h1>Upload a file using this form:</h1>
        
        <!-- Only files smaller than 300KB are allowed by setting the MAX_FILE_SIZE restriction-->
        
        <input type="hidden" name="MAX_FILE_SIZE" value="300000">
        <p><input type="file" name="the_file"></p>
        <p><input type="submit" name="submit" value="Upload This File"></p>
    </form>
    
</body>
</html>
