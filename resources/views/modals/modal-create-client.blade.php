<!-- Modal Create-->
<div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  {{ csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-create-css">
        <h5 class="modal-title" id="createModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="form-horizontal" role="form" id="form-create-client">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Type your name here" required>
              <p class="error text-center alert alert-danger" id="error-name" hidden></p>
            </div>
          </div>

          <div class="form-group row add">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" placeholder="Type your email here" required>
              <p class="error text-center alert alert-danger" id="error-email" hidden></p>
            </div>
          </div>

          <div class="form-group row add">
            <label class="control-label col-sm-2" for="address">Adress:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address" name="address" placeholder="Type your address here" required>
              <p class="error text-center alert alert-danger" id="error-address" hidden></p>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="add">Save changes</button>
      </div>
    </div>
  </div>
</div>