<?php

if (isset($_POST['submit'])) {
		  //add database connections
		  require '../incl/db_conn.php';

		  	$user = $_POST['user'];
			$password = $_POST['password'];

			  				if (empty($user) || empty($password)) {
			    			//link header return error
			          		header("Location: ../pages/login.php?error=emptyfields");
			          		exit();
			  				} else {
					  		$l_sql = "SELECT * FROM `users` WHERE `email` =?";
						  	//db connection
						  	$stmt = mysqli_stmt_init($dbc);
						  	//we chack if the query can perform // the stament work essencially
						  	if (!mysqli_stmt_prepare($stmt, $l_sql)){
								header("Location: ../pages/login.php?error=SQLerror");
						        exit();
							  	}else{
							  		//we biond the parameter with the stmt (statement)
							  		mysqli_stmt_bind_param($stmt, "s", $user);
									//execute $stmt
									mysqli_stmt_execute($stmt);
									//check how many row we get back from the database (if there are another email)
									//if we get 0 row back frim the database the email do not exist
									$result = mysqli_stmt_get_result ($stmt);
							  		if ($row = mysqli_fetch_assoc($result)){
							  			//we fetch everything form variable res and we put inside an associative arrey
							  			//we get row data from the database
							  			}else{
											header("Location: ../pages/login.php?error=nomember");
						  	 				exit();
							  			}
							  			$passcheck= password_verify($password, $row['password']);
							  			if ($passcheck == false) {
							  				header("Location: ../pages/login.php?error=wrongpass");
						  	 				exit();
							  			}elseif ($passcheck == true) {
							  				session_start();
							  				$_SESSION['sessionid'] = $row['u_id'];
							  				$_SESSION['sessionuser']= $row['f_name'];
							  				$_SESSION['roles']= $row['roles'];
							  				header("Location: ../pages/ordercast.php?success=loggedin");
						  	 				exit();
							  			
							  		}
							  	}
							 }
							}
						