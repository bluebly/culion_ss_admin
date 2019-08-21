<!-- Confirm -->
<input type="hidden" id="selectedKey">
<input type="hidden" id="object">
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label id="confirmModalDetails"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="confirm">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Response message -->
<div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="responseModalLabel">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="ok-btn" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Spinner -->
<div id="spinner" class="modal fade bd-spinner-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="width: 48px">
      <span class="fa fa-spinner fa-spin fa-3x"></span>
    </div>
  </div>
</div>
