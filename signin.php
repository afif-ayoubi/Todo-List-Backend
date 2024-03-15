<?php

include("connection.php");

$email = $_POST['email'];
$password = $_POST['password'];

echo "Email: $email";

$query = $mysqli->prepare("
    select * 
    from users 
    where email=?");
$query->bind_param("s", $email);

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
