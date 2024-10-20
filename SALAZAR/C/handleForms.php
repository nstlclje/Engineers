<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';

$error = '';
$successMessage = '';

// Handle insertion
if (isset($_POST['insertNewEngineerBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $birthdate = trim($_POST['birthdate']);
    $age = trim($_POST['age']);
    $address = trim($_POST['address']);
    $position = trim($_POST['position']);
    $salary = trim($_POST['salary']);

    if (!empty($firstName) && !empty($lastName) && !empty($birthdate) && !empty($age) && !empty($position) && !empty($salary)) {
        $query = insertIntoEngineerRecords($pdo, $firstName, $lastName, $birthdate, $age, $address, $position, $salary);
        
        if ($query) {
            $successMessage = "Engineer registered successfully!";
        } else {
            $error = "Insertion failed";
        }
    } else {
        $error = "Make sure that no fields are empty";
    }
}

// Handle update
if (isset($_POST['editEngineerBtn'])) {
    $engineer_id = $_GET['engineer_id'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $birthdate = trim($_POST['birthdate']);
    $age = trim($_POST['age']);
    $address = trim($_POST['address']);
    $position = trim($_POST['position']);
    $salary = trim($_POST['salary']);

    if (!empty($engineer_id) && !empty($firstName) && !empty($lastName) && !empty($birthdate) && !empty($age) && !empty($position) && !empty($salary)) {
        $query = updateAnEngineer($pdo, $engineer_id, $firstName, $lastName, $birthdate, $age, $address, $position, $salary);
        
        if ($query) {
            $successMessage = "Engineer updated successfully!";
            header("Location: ../S/index.php"); // Redirect to index.php after successful update
            exit();
        } else {
            $error = "Update failed";
        }
        
    } else {
        $error = "Make sure that no fields are empty";
    }
}

// Handle deletion
if (isset($_POST['deleteEngineerBtn'])) {
    $query = deleteAnEngineer($pdo, $_GET['engineer_id']);
    if ($query) {
        $successMessage = "Engineer deleted successfully!";
        header("Location: ../S/index.php"); // Redirect to index.php after successful deletion
        exit();
    } else {
        $error = "Deletion failed";
    }
    
}

// Get all records for display
$seeAllEngineerRecords = seeAllEngineerRecords($pdo);
?>
