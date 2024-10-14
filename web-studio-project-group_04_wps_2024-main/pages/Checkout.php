<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = 1; // Assume user is logged in and has ID 1
    $mentorId = $_POST['mentor_id'];
    $hours = $_POST['hours'];
    $sessionType = $_POST['session_type'];
    $totalPrice = $_POST['total_price'];

    $db = new SQLite3('db/database.sqlite');
    $stmt = $db->prepare('INSERT INTO orders (user_id, mentor_id, hours, session_type, total_price) VALUES (:user_id, :mentor_id, :hours, :session_type, :total_price)');
    $stmt->bindValue(':user_id', $userId, SQLITE3_INTEGER);
    $stmt->bindValue(':mentor_id', $mentorId, SQLITE3_INTEGER);
    $stmt->bindValue(':hours', $hours, SQLITE3_INTEGER);
    $stmt->bindValue(':session_type', $sessionType, SQLITE3_TEXT);
    $stmt->bindValue(':total_price', $totalPrice, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error placing order.";
    }
}
?>
<form method="POST" action="checkout.php">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required>
    
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>

    <label for="ph_num">Phone Number:</label>
    <input type="tel" id="ph_num" name="ph_num"  pattern="[0-9]{10}" required>

    <!-- More fields go here for checkout -->
    
    <button type="submit">Checkout</button>
</form>
