<!DOCTYPE html>
<html>
<head>
    <title>Direcory Contents</title>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type='text/css'>
</head>
<body class="list-directory">

    <?php
    
    // Script 11.5 - list_dir.php - Bob Painter
    
    // This script lists the directories and files in a directory
    
    // Set the time zone:
    
    date_default_timezone_set('America/Los_Angeles');
    
    // Set the directory name and scan it:
    
    $search_dir = '.';
    
    // scandir() returns an array of every item or file found within the given directory and return its results into $contents
    
    $contents = scandir($search_dir);
    
    // List the directories first. Print a caption and start a list.
    
    print  '<h2 class="align-left">Directories</h2>
            <ul>';
    
    foreach ($contents as $item) {
        if ( (is_dir($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) {
            print "<li class=\"no-bullet align-left\">$item</li>\n";
        }
    }
    
    print '</ul>';
    
    // Create table header:
    
    print  '<hr>
            <h2 class="align-left">Files</h2>
            <table cellpadding = "2" cellspacing="2" align="left">
            <tr class="align-left">
            <th>Name</td>
            <th>Size</td>
            <th>Last Modified</td>
            </tr>';
    
    // List the files:
    
    foreach ($contents as $item) {
        if ( (is_file($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) {
            
            // Get the file size:
            
            $fs = filesize($search_dir . '/' . $item);
            
            // Get the file modification date:
            
            $lm = date('F j, Y', filemtime($search_dir . '/' . $item));
            
            // Print the modification:
            
            print  "<tr class=\"align-left\">
                    <td>$item</td>
                    <td>$fs bytes</td>
                    <td>$lm</td>
                    </tr>\n";
        }
    }
    
    print '</table>';
    
    ?>

</body>
</html>
