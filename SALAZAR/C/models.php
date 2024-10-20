<?php 
require_once 'dbConfig.php';

function insertIntoEngineerRecords($pdo, $first_name, $last_name, $birthdate, $age, $address, $position, $salary) {
    $sql = "INSERT INTO Engineers (FirstName, LastName, Birthdate, Age, Address, Position, Salary) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $birthdate, $age, $address, $position, $salary]);
    return $executeQuery;
}

function seeAllEngineerRecords($pdo) {
    $sql = "SELECT * FROM Engineers";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    return $executeQuery ? $stmt->fetchAll() : [];
}

function getEngineerByID($pdo, $engineer_id) {
    $sql = "SELECT * FROM Engineers WHERE EngineerID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$engineer_id]) ? $stmt->fetch() : null;
}

function updateAnEngineer($pdo, $engineer_id, $first_name, $last_name, $birthdate, $age, $address, $position, $salary) {
    $sql = "UPDATE Engineers SET FirstName = ?, LastName = ?, Birthdate = ?, Age = ?, Address = ?, Position = ?, Salary = ? WHERE EngineerID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $birthdate, $age, $address, $position, $salary, $engineer_id]);
}

function deleteAnEngineer($pdo, $engineer_id) {
    $sql = "DELETE FROM Engineers WHERE EngineerID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$engineer_id]);
}
?>
