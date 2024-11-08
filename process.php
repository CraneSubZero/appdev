<?php
// process.php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        
        if (!empty($name) && !empty($phone) && !empty($email)) {
            $stmt = $conn->prepare("INSERT INTO contacts (name, phone, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $phone, $email);
            $stmt->execute();
        }
    }
    
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    
    // Redirect back to index.php
    header("Location: index.php");
    exit();
}
?>