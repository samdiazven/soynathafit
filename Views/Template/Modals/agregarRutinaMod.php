<!-- Modal -->
<div class="modal fade" id="modalRutinas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Nueva Rutina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
              <form>
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter full name">
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" placeholder="Enter email address">
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Gender</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender">Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Identity Proof</label>
                  <input class="form-control" type="file">
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox">I accept the terms and conditions
                    </label>
                  </div>
                </div>
              </form>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>