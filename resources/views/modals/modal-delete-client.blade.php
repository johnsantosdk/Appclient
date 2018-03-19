<!-- Modal Info-->
<div class="modal fade" id="deleteClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-delete-css">
        <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="form-delete-client">
          <div class="form-group row add" hidden>
            <label class="control-label col-sm-2" for="id">ID:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="id" name="id">
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
        <div>
          <p style="font-size:18px" id="id"></p>
        </div>
        <div>
          <p style="font-size:18px" id="name"></p>
        </div>
        <div>
          <p style="font-size:18px" id="email"></p>
        </div>
        <div>
          <p style="font-size:18px" id="telephone"></p>
        </div>
        <div>
          <p style="font-size:18px" id="address"></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete">Confirm Delete</button>
      </div>
    </div>
  </div>
</div>