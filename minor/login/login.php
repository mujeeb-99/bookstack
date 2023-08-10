<?php
$servername="localhost";
$username="root";
$password="";
$dbname="info";

$conn=mysqli_connect($servername,$username,$password,$dbname);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}
{
  //something was posted
  $user_name = $_POST['username'];
  $password = $_POST['password'];

  if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
  {

    //read from database
    $query = "select * from detail where username = '$user_name' limit 1";
    $result = mysqli_query($conn, $query);

    if($result)
    {
      if($result && mysqli_num_rows($result) > 0)
      {

        $user_data = mysqli_fetch_assoc($result);
        
        if($user_data['password'] === $password)

        {

          $_SESSION['user_id'] = $user_data['user_id'];
          header("location:/minor/user/index.html");
          die;
        }
      }
    }
    
    echo "wrong username or password!";
  }else
  {
    echo "wrong username or password!";
  }
}



?>
