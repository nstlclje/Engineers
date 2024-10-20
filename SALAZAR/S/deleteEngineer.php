<?php require_once '../C/dbConfig.php'; ?>
<?php require_once '../C/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Engineer</title>
</head>
<body>
    <h3>Are you sure you want to delete this Engineer?</h3>
    <?php
        $engineer = getEngineerByID($pdo, $_GET['engineer_id']);
        if ($engineer) {
    ?>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($engineer['FirstName']); ?></p>
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($engineer['LastName']); ?></p>
        <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($engineer['Birthdate']); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($engineer['Age']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($engineer['Address']); ?></p>
        <p><strong>Position:</strong> <?php echo htmlspecialchars($engineer['Position']); ?></p>
        <p><strong>Salary:</strong> <?php echo htmlspecialchars($engineer['Salary']); ?></p>

        <form action="../C/handleForms.php?engineer_id=<?php echo $engineer['EngineerID']; ?>" method="POST">
            <input type="submit" name="deleteEngineerBtn" value="Yes, Delete">
            <a href="index.php">Cancel</a>
        </form>
    <?php
        } else {
            echo "<p>No Engineer found.</p>";
        }
    ?>
</body>
</html>
