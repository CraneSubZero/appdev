<?php
// edit.php
include 'database.php';

// Check if the contact ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the contact ID from the URL
    $id = $_GET['id'];

    // Retrieve the contact data from the database
    $result = $conn->query("SELECT * FROM contacts WHERE id = $id");
    
    if ($result->num_rows > 0) {
        // Fetch the contact data
        $contact = $result->fetch_assoc();
    } else {
        echo "Contact not found!";
        exit;
    }
} else {
    echo "No contact ID provided!";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated data from the form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Update the contact in the database
    $updateQuery = "UPDATE contacts SET name = '$name', phone = '$phone', email = '$email' WHERE id = $id";
    
    if ($conn->query($updateQuery) === TRUE) {
        header("Location: index.php");  // Redirect back to the main page after updating
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Dark Mode Toggle Button -->
    <button id="themeToggle">Toggle Dark Mode</button>

    <div class="container">
        <h1>Edit Contact</h1>

        <form method="POST" action="edit.php?id=<?= $contact['id'] ?>" id="editForm" onsubmit="return validateForm()">
            <input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($contact['name']) ?>" required>
            <input type="text" name="phone" placeholder="Phone" value="<?= htmlspecialchars($contact['phone']) ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($contact['email']) ?>" required>
            <button type="submit">Update Contact</button>
        </form>
    </div>

    <script src="script.js"></script>
    <script>
        // JavaScript function to validate the form before submission
        function validateForm() {
            const name = document.forms["editForm"]["name"].value;
            const phone = document.forms["editForm"]["phone"].value;
            const email = document.forms["editForm"]["email"].value;
            
            if (name === "" || phone === "" || email === "") {
                alert("All fields must be filled out.");
                return false;  // Prevent form submission if a field is empty
            }

            return true;  // Allow form submission if all fields are filled
        }
    </script>
</body>
</html>