<?php
include('connection.php');

$todo_id = $_POST['todo_id'];
$description = $_POST['description'];
$completed = $_POST['completed'];

$query = $mysqli->prepare('UPDATE todos SET
 description = ?, completed = ? WHERE id = ?');
$query->bind_param("ssi", $description, $completed, $todo_id);


    if ($query->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Todo updated successfully.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to update todo.';
}

echo json_encode($response);
?>
