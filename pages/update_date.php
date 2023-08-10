<?php
    session_start();
    include_once('../includes/connection.php');
 
    if(isset($_GET['id'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $updateDateQuery = "UPDATE mobilelegendsaccounts SET accountsLastLogin = CURRENT_DATE WHERE id = '".$_GET['id']."'";
            $_SESSION['message'] = ( $db->exec($updateDateQuery) ) ? 'Account updated successfully' : 'Something went wrong. Cannot update member';

            echo "Account Date updated successfully";
        }  catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Something went wrong. Cannot update date';
    }
 
    header('location: ../index.php');
?>
