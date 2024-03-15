<?php
include('connection.php');

$user_id = $_POST['user_id']; 
$description = $_POST['description'];
$completed = $_POST['completed']; 

$query = $mysqli->prepare('INSERT INTO todos (user_id, description, completed) VALUES (?, ?, ?)');
$query->bind_param("iss", $user_id, $description, $completed);

if ($query->execute()) {
    $inserted_id = $mysqli->insert_id;
    $todo_details = [
        'id' => $inserted_id,
        'user_id' => $user_id,
        'description' => $description,
        'completed' => $completed
    ];
    $response['status'] = 'success';
    $response['message'] = 'Todo added successfully.';
    $response['todo'] = $todo_details;

} else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to add todo.';
}

echo json_encode($response);
?>
