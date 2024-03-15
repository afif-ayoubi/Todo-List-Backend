<?php

include("connection.php");

$userOrEmail = isset($_POST['username']) ? $_POST['username'] : $_POST['email'];
$password = $_POST['password'];

if (filter_var($userOrEmail, FILTER_VALIDATE_EMAIL)) {
    $query = $mysqli->prepare("SELECT * FROM users WHERE email=?");
} else {
    $query = $mysqli->prepare("SELECT * FROM users WHERE username=?");
}
$query->bind_param("s", $userOrEmail);

$query->execute();
$query->store_result();
$query->bind_result($id, $username, $email, $hashed_password);
$query->fetch();
$num_row = $query->num_rows();

if ($num_row == 0) {
    $response['status'] = "user not found";
} else {
    if (password_verify($password, $hashed_password)) {
        $response['status'] = "success";
        $response['message'] = "user $username logged in successfully";
        $response['id'] = $id;
        $response['username'] = $username;
        $response['email'] = $email;
    } else {
        $response['status'] = "password incorrect";
        $response['message'] = "user $username wasn't logged in";
    }
}

echo json_encode($response);
?>
