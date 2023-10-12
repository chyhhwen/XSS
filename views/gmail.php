<?php
$str = "<body><table>";
$sql = new sql();
$sql -> config("root","","temp","ordtemp");
$sql -> put_data(['id','money','send','receive','time']);
$data = $sql -> sel("chyhhwen");
$str = $str ."
        <tr>
        <td>金額</td>
        <td>發送者</td>
        <td>收件者</td>
        <td>時間</td></tr>
    ";
foreach($data as $key => $val)
{
    $str = $str ."
        <tr>
        <td>". $data[$key]['money'] ."</td>
        <td>". $data[$key]['send'] ."</td>
        <td>". $data[$key]['receive'] ."</td>
        <td>". $data[$key]['time'] ."</td></tr>
    ";
}
$str = $str ."</table>
<form action='/gmail_check' method=POST>
<input type=submit value=確定 name=true>
<input type=submit value=有誤 name=false>
<input type=hidden value=chyhhwen name=user>
 </form>
</body>";
return $str;
?>