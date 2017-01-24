<?php
	session_start();
	require ('connect.php');

	$output = '';

	if (isset($_POST['searchVal']))
	{
		$searchuser = $_POST['searchVal'];
		$query = mysql_query("SELECT * FROM users WHERE username LIKE  '%$searchuser%' OR email LIKE '%$searchuser%'") or die("content was not found");
		$count = mysql_num_rows($query);
		if ($count == 0)
		{
			$output='There is no such item';
		}
		else
		{
			while($row=mysql_fetch_array($query)){
				$username = $row['username'];
				$email = $row['email'];
				$id = $row['id'];

				$output .= '<div> They are assigned by the name: '.$username.' and their email address is: '.$email.' </div>' ;
			}
		}
	}

	echo $output ;

?>
