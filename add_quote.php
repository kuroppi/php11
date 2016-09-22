<!DOCTYPE html>
<html>

<head>
    <title>Add A Quotation</title>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type='text/css'>
</head>

<body>

    <?php
    
    // Script 11.1 - add_quote.php
    // This script displays and handles an HTML form. This script takes text input and stores it in a text file.
    
    // Identify the file to use:
    
    $file = '../quotes.txt';
    
    // Check for a form submission:
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (!empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.')) {
            if (is_writable($file)) {
                file_put_contents($file, $_POST['quote'] . PHP_EOL, FILE_APPEND | LOCK_EX);
                print '<p class="center">Your quotation has been stored.</p>';
            } else {
                
                // Could not open the file:
                
                print '<p class="center" style="color: red;">Your quotation could not be stored due to a system error.</p>';
            }
        } else {
            
            // Failed to enter a quotation:
            
            print '<p class="center" style="color: red;">Please enter a quotation.</p>';
        }
    }  
?>

    <form action="" method="post">
        <textarea name="quote" rows="5" cols="30" placeholder="Enter your quotation here."></textarea><br>
        <input type="submit" name="submit" value="Add This Quote!">
        <input type="hidden" name="submitted" value="true">
    </form>


</body>

</html>
