<?php
function conn()
{
	$a = mysqli_connect('localhost','root','','xss');
	if($a->connect_error)
	{
		die($a->connect_error);
		return false;
	}
	mysqli_set_charset($a, 'utf8');
	return $a;
}
function squery($a)
{
	$b = conn();
	switch($a[0])
	{
		case 'get':
			$c = $b->query($a[1]);
			$d = mysqli_fetch_array($c);
			$b->close();
			return $d;
		break;
		case 'list':
			$e=1;
			$f=[];
			$c = $b->query($a[1]);
			while($d = mysqli_fetch_array($c)){
				$f[$e]=$d;
				$e++;
			}
			$b->close();
			return $f;
		break;
		case 'run':
			$b->query($a[1]);
			if($b->error){
				echo $b->error;
				$b->close();
				return false;
			}else{
				$b->close();
				return true;
			}
		break;
	}
	echo 'noselect';
}
function ref($a){
	header('refresh:'.$a[0].';url="'.$a[1].'"');
}
?>