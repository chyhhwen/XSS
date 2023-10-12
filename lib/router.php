<?php
require_once("./lib/database.php");
class router
{
    public function get($url)
    {
        if(@$this->check())
        {
            $temp = str_split($_SERVER['REQUEST_URI'],4);
            $use = "";
            for($i=1;$i<count($temp);$i++)
            {
                $use = $use.$temp[$i];
            }
            switch ($use)
            {
                case '/':
                    http_response_code(404);
                    return require "./views/error.php";
                    die();
                default:
                    http_response_code(404);
                    return require "./views/error.php";
                    die();
            }
        }
        else
        {
            switch($url)
            {
                case '/':
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
                                <a href="/reflection">
                                    <span>反射型</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/storage">
                                    <span>存储型</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/domcument">
                                    <span>DOM型</span>
                                </a>
                            </td>
                        </tr>
                        </table>
                        </body>
                        </html>';
                    break;
                case '/reflection':
                    if(@$_POST['submit'])
                    {
                        $t = $_POST['text'];
                        echo $t;
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
                        </tr>
                        </form>
                        </table>
                        </body>
                        </html>';
                    }
                    break;
                case '/storage':
                    if(@$_POST['submit'])
                    {
                        $t = $_POST['text'];
                        $n = time();
                        $sql = new sql( );
                        $sql -> config("root","","xss","text");
                        $sql -> put_data(['',$t,$n]);
                        $sql -> add("(?,?,?)");
                        ref([0,'/storage']);
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
                        $sql = new sql( );
                        $sql -> config("root","","xss","text");
                        $sql -> put_data(['id','data','time']);
                        $data = $sql -> sel();
                        foreach($data as $key => $val)
                        {
                            echo'
                            <tr>
                                <td>'. $data[$key]['data'] .'</td>
                            </tr>
                            ';
                        }
                        echo'
                        </form>
                        </table>
                        </body>
                        </html>';
                    }
                    break;
                case '/domcument':
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
                    break;
                default:
                    http_response_code(404);
                    return require "./views/error.php";
                    die();

            }
        }

    }
    public function check()
    {
        $temp = str_split($_SERVER['REQUEST_URI'],5);
        if($temp[0] == "/api/")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>