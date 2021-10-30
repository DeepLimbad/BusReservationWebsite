<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
	$conn = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($conn,"booking");
}	catch(Exception $ex)	{
	echo "Error";
}

function getPosts()
{
    $posts = array();
    $posts [0] = (string)filter_input(INPUT_POST, 'Name');
    $posts [1] = (string)filter_input(INPUT_POST, 'Source');
    $posts [2] = (string)filter_input(INPUT_POST, 'Destn');
    $posts [3] = (string)filter_input(INPUT_POST, 'FromD');
    $posts [4] = (string)filter_input(INPUT_POST, 'ToD');
    $posts [5] = (string)filter_input(INPUT_POST, 'Contact');
    $posts [6] = (string)filter_input(INPUT_POST, 'Bus');
    $posts [7] = (string)filter_input(INPUT_POST, 'Class');
    $posts [8] = (string)filter_input(INPUT_POST, 'Adult');
    $posts [9] = (string)filter_input(INPUT_POST, 'Child');
    $posts [10] = (string)filter_input(INPUT_POST, 'Uchild');
    $posts [11] = (string)filter_input(INPUT_POST, 'Email');
	return $posts;
}

if(isset($_POST['update']))
{
	$data = getPosts();
	$update_Query = "UPDATE `bookingt` SET `Source`='$data[1]',`Destn`='$data[2]',`Bus`='$data[6]',`Class`='$data[7]',`Adult`='$data[8]',`Child`='$data[9]',`Uchild`='$data[10]',`FromD`='$data[3]',`ToD`='$data[4]',`Name`='$data[0]',`Contact`='$data[5]' WHERE `Email`='$data[11]' ";
	try{
		$update_Result = mysqli_query($conn, $update_Query);

		if($update_Result)
		{
			if(mysqli_affected_rows($conn) > 0)
			{
                echo "<script> alert('Data Updated !!!') </script>";
                <h4><i>Your data has been updated !</i></h4>
			}
			else
			{
				echo " Updation Failed";
			}
		}
	}	catch(Exception $ex){
		echo "Error Update ".$ex->getMessage();
	}

}

$conn->close();
?>
