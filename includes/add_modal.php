<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm"> <!-- Küçültülmüş modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel" style="font-size: 16px;">Add New</h5> <!-- Küçültülmüş başlık fontu -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../pages/add.php">
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Acc ID</label> <!-- Küçültülmüş label fontu -->
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsId">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Acc Password</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsPassword">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Acc Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsName">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Acc Level</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsLevel">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label" style="font-size: 12px;">Acc Last Login</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="accountsLastLogin">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="font-size: 12px;" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary" style="font-size: 12px;"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
