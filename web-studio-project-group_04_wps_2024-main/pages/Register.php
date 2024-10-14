<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $db = new SQLite3('db/database.sqlite');
    $stmt = $db->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':password', $password, SQLITE3_TEXT);
    
    if ($stmt->execute()) {
        echo "Account created successfully!";
    } else {
        echo "Error creating account.";
    }
}
?>
<form method="POST" action="register.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    
    <button type="submit">Create new account</button>
</form>
