<?php
session_start();
include_once('../includes/connection.php');
 
if(isset($_POST['add'])){
    $database = new Connection();
    $db = $database->open();
    try{
        //use prepared statement to prevent sql injection
        $stmt = $db->prepare("INSERT INTO mobileLegendsAccounts (accountsId, accountsPassword, accountsName, accountsLevel, accountsLastLogin) 
                              VALUES (:accountsId, :accountsPassword, :accountsName, :accountsLevel, :accountsLastLogin)");
        // Bind parameters and execute
        $stmt->bindParam(':accountsId', $_POST['accountsId']);
        $stmt->bindParam(':accountsPassword', $_POST['accountsPassword']);
        $stmt->bindParam(':accountsName', $_POST['accountsName']);
        $stmt->bindParam(':accountsLevel', $_POST['accountsLevel']);
        $stmt->bindParam(':accountsLastLogin', $_POST['accountsLastLogin']);
        
        // Execute the statement and set the session message accordingly
        if ($stmt->execute()) {
            $_SESSION['message'] = 'Member added successfully';
        } else {
            $_SESSION['message'] = 'Something went wrong. Cannot add member';
        }
    }
    catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    // Close connection
    $database->close();
}
 
else{
    $_SESSION['message'] = 'Fill up add form first';
}
 
header('location: ../index.php');
     
?>
