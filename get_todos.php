<?php
include('connection.php');

$user_id = $_GET['user_id']; 

$query = $mysqli->prepare('SELECT t.*, u.username FROM todos t 
                          LEFT JOIN users u ON t.user_id = u.id 
                          WHERE t.user_id = ?');

$query->bind_param("i", $user_id);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows();

if ($num_rows == 0) {
    $response['status'] = 'no todos found';
} else {
    $todos = [];
    $query->bind_result($id, $user_id, $description, $completed, $username);
    while ($query->fetch()) {
        $todo = [
            'id' => $id,
            'user_id' => $user_id,
            'username' => $username, 
            'description' => $description,
            'completed' => $completed,
        ];
        $todos[] = $todo;
    }
    $response['status'] = 'success';
    $response['todos'] = $todos;
}

echo json_encode($response);
?>
