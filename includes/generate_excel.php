<?php
if(isset($_GET["export_excel"])) {
    include_once('connection.php');
    
    $database = new Connection();
    $db = $database->open();
    
    try {    
        $sql = 'SELECT * FROM mobilelegendsaccounts';
        $result = $db->query($sql);
        
        if ($result->rowCount() > 0) {
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=mobilelegends_accounts_export.xls");
            echo '<table>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>AccountId</th>';
            echo '<th>AccountPassword</th>';
            echo '<th>AccountName</th>';
            echo '<th>AccountLevel</th>';
            echo '<th>AccountLastLogin</th>';
            echo '</tr>';
            
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['accountsId'] . '</td>';
                echo '<td>' . $row['accountsPassword'] . '</td>';
                echo '<td>' . $row['accountsName'] . '</td>';
                echo '<td>' . $row['accountsLevel'] . '</td>';
                echo '<td>' . $row['accountsLastLogin'] . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
            
            // Close connection
            $database->close();
            
            exit;
        } else {
            echo "No records found";
        }
    } catch(PDOException $e) {
        echo "There is some problem in connection: " . $e->getMessage();
    }
}
?>
