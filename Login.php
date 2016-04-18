<?php
    $con = mysqli_connect("sql303.byethost22.com", "b22_17896927", "shimigiran12345", "b22_17896927_userinfo");
	
	  $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userid, $firstname, $lastname, $email, $username,$password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["firstname"] = $firstname;
        $response["lastname"] = $lastname;
        $response["email"] = $email;
        $response["username"] = $username;
		$response["password"] = $password;
    }
    
    echo json_encode($response);
	?>