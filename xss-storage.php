<?php
    require_once("./lib/database.php");
    if(@$_POST['submit'])
    {
        $t = $_POST['text'];
        $n = time();
        squery(['run',"INSERT INTO `text` (`data`,`time`)VALUES($t,$n)"]);
        ref([0,'./xss-storage.php']);
    }
    else
    {
        echo '
        <html>
        <head>
            <link rel="stylesheet" href="./public/index.css">
            <meta charset="UTF-8">
            <title>xss demo</title>
        </head>
        <body>
        <table style="width:20vw;">
        <form action="" method="POST">
        <tr>
            <td>
                <input type="text" name="text" placeholder="輸入文字...">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="送出">
            </td>
        </tr>';
        $a = squery(['list',"SELECT * FROM `text`"]);
        for($i=1;$i<=count($a);$i++)
        {
            echo'
            <tr>
                <td>'. $a[$i][1] .'</td>
            </tr>
            ';
        }
        echo'
        </form>
        </table>
        </body>
        </html>';
    }

?>