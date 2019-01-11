<?php


function get(string $sql)
{
	include('env.php');
	$result = mysqli_query($conn, $sql);

	return $result;
}

function dd($var)
{
	var_dump($var);
	die;
}


?>