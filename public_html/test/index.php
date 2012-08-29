<?php

    $xml = simplexml_load_file('SeerUK.atom');

    require_once('./HTML5/Parser.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Github Feed</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="feed">
            <?php

                foreach($xml->entry as $entry)
                {
                    $content = str_replace('/SeerUK','https://www.github.com/SeerUK',$entry->content);
                    $content = str_replace('https://github.comhttps://www.github.com','https://www.github.com',$content);
                    $content = str_replace('https://www.github.comhttps://www.github.com','https://www.github.com',$content);
                    echo $content . '<br />';

                    //break;
                }

            ?>
        </div>
    </body>
</html>
