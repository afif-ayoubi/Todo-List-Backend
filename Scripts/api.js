const signup = async (username, email, password) => {
    try {
        const response = await axios.post('http://localhost/todo_list_backend/signup.php', {
            email: username,
            username: email,
            password: password
        });
        return response.data;
    } catch (error) {
        console.error(error);
        throw error; 
    }
}
const addTodo = async (user_id, description, completed) => {
    try {
        const response = await fetch('http://localhost/todo_list_backend/add_todo.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                user_id: user_id,
                description: description,
                completed: completed
            }),
        });
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}
const login = async (usernameOrEmail, password) => {
    try {
        const response = await axios.post('localhost/todo_list_backend/signin.php', {
            username: usernameOrEmail, 
            password: password
        });
        return response.data;
    } catch (error) {
        console.error(error);
        throw error; 
    }
}

const fetchTodos = async (user_id) => {
    try {
        const response = await fetch('localhost/todo_list_backend/get_todos.php=' + user_id);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}
const deleteTodo = async (todo_id) => {
    try {
        const response = await fetch('http://localhost/todo_list_backend/delete_todo.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                id: todo_id
            }),
        });
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}
const updateTodo = async (todo_id, description, completed) => {
    try {
        const response = await fetch('http://localhost/todo_list_backend/update_todo.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                todo_id: todo_id,
                description: description,
                completed: completed
            }),
        });
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}
