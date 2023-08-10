<?php
    session_start();
    include_once('../includes/connection.php');
 
    if(isset($_GET['id'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $sql = "DELETE FROM mobilelegendsaccounts WHERE id = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Account deleted successfully' : 'Something went wrong. Cannot delete Account';
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Select Account to delete first';
    }
 
    header('location: ../index.php');
?>
