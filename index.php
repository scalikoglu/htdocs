<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mobile Legends Accounts</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .copyable {
            cursor: pointer;
        }
        .copied {
            background-color: #ff6699;
            font-weight: bold;
            color: #ff6699;
        }
        .popup {
            position: absolute;
            background-color: #ff6699;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 999;
        }
        .sortable {
            cursor: pointer;
        }
        .sortable::after {
            content: '\2191';
            margin-left: 5px;
        }
        .sortable.descending::after {
            content: '\2193';
        }
        .thead-bg {
            background-color: #007bff;
            color: white;
        }
        .table-title {
            color: #007bff;
            font-size: 50px;
            margin-bottom: 20px;
        }
        .search-input {
            font-size: 14px;
            margin-bottom: 10px;
        }
        #searchInput {
            width: 150px;
        }
        .add-new-btn {
            float: right;
            margin-left: 10px;
        }
		.search-input {
			font-size: 14px;
			margin-bottom: 10px;
			border: 1px solid #007bff; /* Border rengini değiştirin */
}
    </style>
</head>
<body>
<div class="container">
    <h1 class="page-header text-center table-title">Test Accounts</h1>
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary add-new-btn" data-bs-toggle="modal" data-bs-target="#addnew">
                Add New Account
            </button>
            <div class="form-group">
                <input type="text" class="form-control search-input" id="searchInput" placeholder="Search by AccId...">
            </div>
            <?php 
                session_start();
                if(isset($_SESSION['message'])) {
            ?>
            <div class="alert alert-info text-center" style="margin-top:20px;">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php
                unset($_SESSION['message']);
            }
            ?>
            <table class="table table-bordered table-striped" style="margin-top:20px;">
            <thead class="thead-bg">
    <th class="sortable" data-sort="id">ID</th>
    <th class="sortable" data-sort="accountsId">AccId</th>
    <th class="sortable" data-sort="accountsPassword">AccPassword</th>
    <th>AccName</th>
    <th class="sortable" data-sort="accountsLevel">AccLevel</th>
    <th class="sortable" data-sort="accountsLastLogin">AccLastLoginDate</th>
    <th class="sortable" data-sort="daysSinceLastLogin">AccLastLoginDay</th>
    <th>Action</th>
    <th>LoginDateUpdate</th> <!-- Eklenen yeni kolon başlığı -->
</thead>


                <tbody>
                    <?php
                        include_once('includes/connection.php');
 
                        $database = new Connection();
                        $db = $database->open();
                        try {    
                            $sql = 'SELECT * FROM mobilelegendsaccounts';
                            foreach ($db->query($sql) as $row) {
                    ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td class="copyable" data-text="<?php echo $row['accountsId']; ?>"><?php echo $row['accountsId']; ?>
        <div class="popup">Copied: <?php echo $row['accountsId']; ?></div>
    </td>
    <td class="copyable" data-text="<?php echo $row['accountsPassword']; ?>"><?php echo $row['accountsPassword']; ?>
        <div class="popup">Copied: <?php echo $row['accountsPassword']; ?></div>
    </td>
    <td><?php echo $row['accountsName']; ?></td>
    <td><?php echo $row['accountsLevel']; ?></td>
    <td><?php echo $row['accountsLastLogin']; ?></td>
    <td><?php
        $lastLoginDate = new DateTime($row['accountsLastLogin']);
        $currentDate = new DateTime();
        $daysSinceLastLogin = $currentDate->diff($lastLoginDate)->format('%a');
        echo $daysSinceLastLogin;
        ?></td>
    <td>
        <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-bs-toggle="modal"> Edit</a>
        <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal"> Delete</a>
    </td>
    <td>
    <a href="#update_<?php echo $row['id']; ?>"  class="btn btn-primary btn-sm" data-bs-toggle="modal">UpdateDate</a>
    </td>
    <?php include('includes/edit_delete_modal.php'); ?>
</tr>

                    <?php 
                            }
                        } catch(PDOException $e) {
                            echo "There is some problem in connection: " . $e->getMessage();
                        }
                        //close connection
                        $database->close();
                    ?>
                </tbody>
            </table>

            <div class="text-center" style="margin-top: 20px;">
                <a href="includes/generate_excel.php?export_excel=true" class="btn btn-success">Export to Excel</a>
            </div>

        </div>
    </div>
</div>
<?php include('includes/add_modal.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script>
    var sortDirection = {
        id: 1,
        accountsId: 1,
        accountsPassword: 1,
        accountsLevel: 1,
        accountsLastLogin: 1,
        daysSinceLastLogin: 1
    };

    function sortTableBy(columnName) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector("table");
        switching = true;

        while (switching) {
            switching = false;
            rows = table.getElementsByTagName("tr");

            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                if (columnName === "id" || columnName === "accountsLevel") {
                    x = parseInt(rows[i].querySelectorAll("td")[columnName === "id" ? 0 : 4].innerText);
                    y = parseInt(rows[i + 1].querySelectorAll("td")[columnName === "id" ? 0 : 4].innerText);
                } else if (columnName === "accountsLastLogin") {
                    x = new Date(rows[i].querySelectorAll("td")[5].innerText);
                    y = new Date(rows[i + 1].querySelectorAll("td")[5].innerText);
                } else if (columnName === "daysSinceLastLogin") {
                    x = parseInt(rows[i].querySelectorAll("td")[6].innerText);
                    y = parseInt(rows[i + 1].querySelectorAll("td")[6].innerText);
                } else {
                    x = rows[i].querySelectorAll("td")[columnName === "accountsId" ? 1 : 2].innerText.toLowerCase();
                    y = rows[i + 1].querySelectorAll("td")[columnName === "accountsId" ? 1 : 2].innerText.toLowerCase();
                }

                if (sortDirection[columnName] === 1) {
                    if (x < y) {
                        shouldSwitch = true;
                        break;
                    }
                } else {
                    if (x > y) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }

            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }

        sortDirection[columnName] *= -1;

        document.querySelectorAll("th.sortable").forEach(function(el) {
            el.classList.remove("descending");
        });

        var sortedHeader = document.querySelector("th.sortable[data-sort='" + columnName + "']");
        sortedHeader.classList.add(sortDirection[columnName] === 1 ? "descending" : "");
    }

    function searchTable(searchValue) {
        var table, rows, i, cell, searchText;
        table = document.querySelector("table");
        rows = table.getElementsByTagName("tr");

        for (i = 1; i < rows.length; i++) {
            var found = false;
            cell = rows[i].getElementsByTagName("td")[1]; // AccId sütunu

            searchText = cell.innerText.toLowerCase();
            if (searchText.includes(searchValue.toLowerCase())) {
                found = true;
            }

            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("th.sortable").forEach(function(el) {
            el.addEventListener("click", function() {
                sortTableBy(el.getAttribute("data-sort"));
            });
        });

        document.getElementById("searchInput").addEventListener("input", function() {
            searchTable(this.value);
        });

        var timeoutId;

        $('.copyable').click(function() {
    clearTimeout(timeoutId);
    
    var text = $(this).data('text');
    var tempInput = $('<input>');
    $('body').append(tempInput);
    tempInput.val(text).select();
    document.execCommand('copy');
    tempInput.remove();

    $('.copyable').removeClass('copied'); // Diğer metinleri sıfırla
    $('.popup').fadeOut(); // Diğer pop-up'ları sakla

    $(this).addClass('copied');
    $(this).find('.popup').fadeIn();
    
    // Sadece pop-up'ın 3 saniye sonra kaybolmasını sağla
    timeoutId = setTimeout(function() {
        $('.popup').fadeOut();
    }, 3000);
        });
    });
</script>

</body>
</html>
