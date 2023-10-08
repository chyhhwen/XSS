<?php
    require_once("./lib/database.php");
    echo '
    <html>
    <head>
        <link rel="stylesheet" href="./public/index.css">
        <meta charset="UTF-8">
        <title>xss demo</title>
    </head>
    <body>
    <table>
    <tr>
        <td>
            <a href="./xss-reflection.php">
                <span>反射型</span>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="./xss-storage.php">
                <span>存储型</span>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="./xss-domcument.php">
                <span>DOM型</span>
            </a>
        </td>
    </tr>
    </table>
    </body>
    </html>';
?>