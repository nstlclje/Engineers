<?php 
require_once '../C/dbConfig.php'; 
require_once '../C/models.php'; 
require_once '../C/handleForms.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineer Registration</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Engineer Registration</h1>

    <?php if (!empty($successMessage)): ?>
        <p style="color: green;"><?php echo $successMessage; ?></p>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <h2>Add New Engineer</h2>
    <form action="" method="POST">
        <p><label for="firstName">First Name</label> <input type="text" name="firstName" required></p>
        <p><label for="lastName">Last Name</label> <input type="text" name="lastName" required></p>
        <p><label for="birthdate">Birthdate</label> <input type="date" name="birthdate" required></p>
        <p><label for="age">Age</label> <input type="number" name="age" required></p>
        <p><label for="address">Address</label> <input type="text" name="address"></p>
        <p><label for="position">Position</label> <input type="text" name="position" required></p>
        <p><label for="salary">Salary</label> <input type="text" name="salary" required></p>
        <input type="submit" name="insertNewEngineerBtn" value="Register">
    </form>

    <h2>Registered Engineers</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthdate</th>
                <th>Age</th>
                <th>Address</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $engineers = seeAllEngineerRecords($pdo);
            foreach ($engineers as $engineer): 
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($engineer['EngineerID']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['FirstName']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['LastName']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['Birthdate']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['Age']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['Address']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['Position']); ?></td>
                    <td><?php echo htmlspecialchars($engineer['Salary']); ?></td>
                    <td>
                        <a href="editEngineer.php?engineer_id=<?php echo $engineer['EngineerID']; ?>">Edit</a>
                        <a href="deleteEngineer.php?engineer_id=<?php echo $engineer['EngineerID']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
