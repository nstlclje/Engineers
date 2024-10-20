<?php require_once '../C/dbConfig.php'; ?>
<?php require_once '../C/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Engineer</title>
</head>
<body>
    <h3>Edit Engineer Information</h3>
    <?php $engineer = getEngineerByID($pdo, $_GET['engineer_id']); ?>
    <form action="../C/handleForms.php?engineer_id=<?php echo $engineer['EngineerID']; ?>" method="POST">
        <p><label for="firstName">First Name</label> <input type="text" name="firstName" value="<?php echo $engineer['FirstName']; ?>"></p>
        <p><label for="lastName">Last Name</label> <input type="text" name="lastName" value="<?php echo $engineer['LastName']; ?>"></p>
        <p><label for="birthdate">Birthdate</label> <input type="date" name="birthdate" value="<?php echo $engineer['Birthdate']; ?>"></p>
        <p><label for="age">Age</label> <input type="number" name="age" value="<?php echo $engineer['Age']; ?>"></p>
        <p><label for="address">Address</label> <input type="text" name="address" value="<?php echo $engineer['Address']; ?>"></p>
        <p><label for="position">Position</label> <input type="text" name="position" value="<?php echo $engineer['Position']; ?>"></p>
        <p><label for="salary">Salary</label> <input type="text" name="salary" value="<?php echo $engineer['Salary']; ?>"></p>

        <input type="submit" name="editEngineerBtn" value="Update Engineer">
    </form>
</body>
</html>
