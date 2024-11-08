<?php
// index.php
include 'database.php';

// Retrieve all contacts
$contacts = [];
$result = $conn->query("SELECT * FROM contacts");
while ($row = $result->fetch_assoc()) {
    $contacts[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Dark Mode Toggle Button -->
    <button id="themeToggle">Toggle Dark Mode</button>

    <div class="container">
        <h1>Contact Manager</h1>

        <form id="contactForm" method="POST" action="process.php">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="add">Add Contact</button>
        </form>

        <br>
        <h2>Contact List</h2>
        <ul id="contactList">
            <?php foreach ($contacts as $contact): ?>
                <li>
                    <span><?= htmlspecialchars($contact['id']) ?></span>
                    <span><?= htmlspecialchars($contact['name']) ?></span>
                    <span><?= htmlspecialchars($contact['phone']) ?></span>
                    <span><?= htmlspecialchars($contact['email']) ?></span>
                    <div class="contact-actions">
                        <form method="GET" action="edit.php">
                            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                            <button type="submit" class="edit-btn">Edit</button>
                        </form>
                        <form method="POST" action="process.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                            <button type="submit" name="delete" class="delete-btn">Delete</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script src="script.js"></script>
</body>
</html>