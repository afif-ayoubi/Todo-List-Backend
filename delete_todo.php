<?php
include('connection.php');

$todo_id = $_POST['id'];

$query = $mysqli->prepare('DELETE FROM todos WHERE id = ?');
$query->bind_param("i", $todo_id);


if ($query->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Todo deleted successfully.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to delete todo.';
}

echo json_encode($response);
