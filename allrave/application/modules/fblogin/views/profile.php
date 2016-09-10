<html>
<head>
<title>CodeIgniter : After login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="main">

<?php //echo $_SESSION['uname']; ?>

<div id="login">

<?php 
//echo $user_profile['email'];
// echo "<pre>";
// print_r($user_profile);
// echo "</pre>";
// die('<br>aaaa');

?>

<?php 
//retrive the user details
$fb_user_id = $user_profile['id'];
$fb_user_email = $user_profile['email'];
$fb_temp_password = "allrave@temp_password";

//check if the user is already in our db
$query=$this->db->get_where('users', array('email' => $fb_user_email ));
if ($query->num_rows() == 0)
{
	//register user in the database with role id =2
	$data = array(
   'username' => $fb_user_id ,
   'email' => $fb_user_email ,
   'password' => crypt($fb_temp_password)
);

//register user manually
	$this->db->insert('users', $data);
	$user_id = $this->db->insert_id();
	$profile = array(
		'user_id' => $user_id,
		'avatar' => 'default_avatar.jpg'
		);

	//create user profile
	//$this->tank_auth->create_profile($user_id,$profile);
	$this->db->insert('account_details', $profile);

	//create user profile





// if($this->db->insert('users', $data))
// {
// 	//die('registeredddddd');
// } 

// else
// {
// 	//die("not registeredddd");
// }


}


//login the user

if($this->tank_auth->login($fb_user_email,$fb_temp_password))
{								// success
redirect('');
}
else
{
	redirect('<?php echo base_url() ?>');	
}

?>


<?php //redirect('abc'); ?>
<h2> <?php echo "<a href=".$user_profile['link']." target='_blank' ><img class='fb_profile' src="."https://graph.facebook.com/".$user_profile['id']."/picture".">"."</a>"."<p class='profile_name'>Welcome ! <em>".$user_profile['name']."</em></p>";
echo "<a class='logout' href='$logout_url'>Logout</a>";
?></h2>
<hr/>
<h3><u>Profile</u></h3>
<?php
echo "<p>First Name : ".$user_profile['first_name']."</p>";
echo "<p>Last Name : ".$user_profile['last_name']."</p>";
echo "<p>Gender : ".$user_profile['gender']."</p>";
echo "<p>Facebook URL : "."<a href=".$user_profile['link']." target='_blank'"."> https://www.facebook.com/".$user_profile['id']."</a></p>";
?>
</div>
</div>
</body>
</html>