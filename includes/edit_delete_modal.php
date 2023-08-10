<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel" style="font-size: 16px;">Edit Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../pages/edit.php?id=<?php echo $row['id']; ?>">
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">ID</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsId" value="<?php echo $row['accountsId']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Password</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsPassword" value="<?php echo $row['accountsPassword']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsName" value="<?php echo $row['accountsName']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Level</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsLevel" value="<?php echo $row['accountsLevel']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Last Login</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsLastLogin" value="<?php echo $row['accountsLastLogin']; ?>">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary" style="font-size: 12px;">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel" style="font-size: 16px;">Delete Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p class="text-center" style="font-size: 12px;">Are you sure you want to Delete</p>
            <h2 class="text-center" style="font-size: 14px;"><?php echo $row['accountsId'].' '.$row['accountsLevel']; ?></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 12px;">Close</button>
        <a href="../pages/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="font-size: 12px;">Yes</a>
      </div>
    </div>
  </div>
</div>
