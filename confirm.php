<?php


require("config.php");


	if(isset($_GET['email']) && isset($_GET['token']))
	{
		
	
		 

	$query="SELECT * FROM signin WHERE email='$_GET[email]' AND  isEmailConfirmed='0'";
	$result=mysqli_query($conn,$query);


		if($result)
		{
			if(mysqli_num_rows($result)==1)
			{
				$result_fetch=mysqli_fetch_assoc($result);
				if($result_fetch['isEmailConfirmed']==0)
				{
					$update="UPDATE signin SET isEmailConfirmed='1' WHERE email='$result_fetch[email]'";
					if(mysqli_query($conn,$update))
					{
						echo"
					<script>
					alert('Email verification successful');
					window.location.href='signup.php';
					</script>
					";
					}
					else
					{
						echo"
						<script>
						alert('Can not run query');
						window.location.href='signup.php';
						</script>";
					}
				}
				else
				{
					echo"
					<script>
					alert('Email is already registered');
					window.location.href='signup.php';
					</script>";
				}
			}

		}
	}
		else
		{
			echo"
			<script>
			alert('Can not run query');
			window.location.href='signup.php';
			</script>";
		}

		
	
	
?>