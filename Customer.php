<?php
session_start();
class Customer{
	public function signUp($db){
		if (isset($_POST['submit'])){
	    	$phone_num=htmlspecialchars($_POST['phone_num']);
	    	$email=htmlspecialchars($_POST['email']);
	    	$password=htmlspecialchars($_POST['password']);

		    if (!empty($phone_num)  && !empty($email) && !empty($password)){
		        $query="INSERT INTO customers (phone_num,email,password) VALUES ('$phone_num','$email','$password')";
		        // get result
		        if ($db->register($query)){
		            header('Location: index.php');
		        }else{
		        	header('Location: signup.php');
		    	}
			}else{
		    	header('Location: signup.php');
			}
		}
	}

	public function signIn($db){
		if (isset($_POST['submit'])){
		    $email=htmlspecialchars($_POST['email']);
		    $password=htmlspecialchars($_POST['password']);

		    if (!empty($email) && !empty($password)){
		        $query="SELECT * FROM customers WHERE email='$email' && password ='$password'";
		        // get result
		        if (!$db->login($query)){
		              header('Location: index.php?login=error');
		              exit();
		          }else{
	                $_SESSION['id']=$db->resultset['id'];
	                $_SESSION['email']=$db->resultset['email'];
	                header('Location: index.php?login=success');
	                exit();
		          } 
		    }else{
		        header('Location: signup.php');
		    }
		}else{
		    header('Location: signup.php');
		}
	}



}