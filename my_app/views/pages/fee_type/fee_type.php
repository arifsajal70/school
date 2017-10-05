<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">

    <nav class="navbar navbar-light bg-white b-a mb-2">
      <ul class="nav navbar-nav float-xs-right">
        <li class="nav-item">
          <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal">Add Fee Type</button>
        </li>
      </ul>
      <div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar2">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>"><i class="ti-microsoft"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link">Fee Type</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="box box-block bg-white">
      <h5 class="mb-1">Exporting Table Data</h5>
      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="fee_type_table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Fee Type</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>SL</th>
              <th>Fee Type</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Adding Modal Starts -->

<div class="modal fade add-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Fee Type</h4>
      </div>
      <div class="modal-body">
        <form id="add_fee_type">
          <div class="form-group">
            <label>Fee Type<span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Fee Type" name="feetype">
            </div>
          </div>
          <div class="form-group">
            <label>Amount</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Amount" name="amount">
            </div>
          </div>
          <div class="form-group">
            <label>Note</label>
            <textarea class="form-control" rows="3" name="note" placeholder="Note"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Fee Type</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Adding Modal Ends -->

<!-- Editing Modal Starts -->
<button data-toggle="modal" data-target=".editing-modal" id="editing_modal" style="display:none;"></button>
<div class="modal fade editing-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Book</h4>
      </div>
      <div class="modal-body">
        <form id="edit_fee_type">
          <div class="form-group">
            <label>Fee Type<span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Fee Type" name="feetype" for="feetype">
            </div>
          </div>
          <div class="form-group">
            <label>Amount</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Amount" name="amount" for="amount">
            </div>
          </div>
          <div class="form-group">
            <label>Note</label>
            <textarea class="form-control" rows="3" name="note" placeholder="Note" for="note"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Fee Type</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Editing Modal Ends -->


<script type="text/javascript" src="./assets/ajax/fee_type_ajax.js"></script>