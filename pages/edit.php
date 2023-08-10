<?php
    session_start();
    include_once('../includes/connection.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $accountsId = $_POST['accountsId'];
            $accountsPassword = $_POST['accountsPassword'];
            $accountsName = $_POST['accountsName'];
            $accountsLevel = $_POST['accountsLevel'];
            $accountsLastLogin = $_POST['accountsLastLogin'];
 
            $sql = "UPDATE mobilelegendsaccounts SET accountsId = '$accountsId', accountsPassword = '$accountsPassword', accountsName = '$accountsName', accountsLevel = '$accountsLevel', accountsLastLogin = '$accountsLastLogin' WHERE id = '$id'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Account updated successfully' : 'Something went wrong. Cannot update member';
 
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Fill up edit form first';
    }
 
    header('location: ../index.php');
?>
