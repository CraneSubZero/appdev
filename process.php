<?php
// process.php
include 'database.php';

// Add new contact
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO contacts (name, phone, email) VALUES ('$name', '$phone', '$email')";
    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

// Delete contact
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM contacts WHERE id = $id";
    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

// Edit contact
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE contacts SET name='$name', phone='$phone', email='$email' WHERE id=$id";
    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>