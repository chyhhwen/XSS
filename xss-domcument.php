<?php
    echo '
    <html>
    <head>
        <link rel="stylesheet" href="./public/index.css">
        <script type="text/javascript" src="./public/index.js"></script>
        <meta charset="UTF-8">
        <title>xss demo</title>
    </head>
    <body>
    <table style="width:20vw;">
    <tr>
        <td>
            <input type="text" name="text" placeholder="輸入文字..." id="text">
        </td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="submit" value="送出" onclick="test();">
        </td>
    </tr>
    <tr>
        <td>
            <div id="final_text">NULL</div>
        </td>
    </tr>
    </table>
    </body>
    </html>';
?>