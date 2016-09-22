<!DOCTYPE html>
<html>
<head>
    <title>View A Quotation</title>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type='text/css'>
</head>
<body>

    <h1 class="center">Random Quotation:</h1>

    <?php
    
    // Script 11.3 - view_quote.php
    
    // Read the file's contents in the array
    
    $data = file('../quotes.txt');
    
    // Count the number of items in the array:
    
    $n = count($data);
    
    // Pick a random item:
    
    $rand = rand(0, ($n-1));
    
    // Print out the quotation:
    
    print '<p class="center">' . trim($data[$rand]) . '</p>';
    
?>    

</body>
</html>
