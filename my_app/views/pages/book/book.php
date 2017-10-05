<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">

    <nav class="navbar navbar-light bg-white b-a mb-2">
      <ul class="nav navbar-nav float-xs-right">
        <li class="nav-item">
          <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal">Add Book</button>
        </li>
      </ul>
      <div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar2">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>"><i class="ti-microsoft"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link">Book</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="box box-block bg-white">
      <h5 class="mb-1">Exporting Table Data</h5>
      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="book_table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Author</th>
              <th>Book Code</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Status</th>
              <th>Rack</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Author</th>
              <th>Book Code</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Status</th>
              <th>Rack</th>
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
        <h4 class="modal-title" id="myModalLabel">Add Book</h4>
      </div>
      <div class="modal-body">
        <form id="add_book">
          <div class="form-group">
            <label>Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Name" name="name">
          </div>
          <div class="form-group">
            <label>Author<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Author" name="author">
          </div>
          <div class="form-group">
            <label>Book Code</label>
            <input type="text" class="form-control" placeholder="Book Code" name="book_code">
          </div>
          <div class="form-group">
            <label>Price<span class="text-danger">*</span> </label>
            <input type="text" class="form-control" placeholder="Price" name="price">
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" placeholder="Quantity" name="quantity">
          </div>
          <div class="form-group">
            <label>Rack No<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Rack No" name="rack">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Book</button>
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
        <form id="edit_book">
          <div class="form-group">
            <label>Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Name" name="name" for="name">
          </div>
          <div class="form-group">
            <label>Author<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Author" name="author" for="author">
          </div>
          <div class="form-group">
            <label>Book Code</label>
            <input type="text" class="form-control" placeholder="Book Code" name="book_code" for="book_code">
          </div>
          <div class="form-group">
            <label>Price<span class="text-danger">*</span> </label>
            <input type="text" class="form-control" placeholder="Price" name="price" for="price">
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" placeholder="Quantity" name="quantity" for="quantity">
          </div>
          <div class="form-group">
            <label>Rack No<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Rack No" name="rack" for="rack">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Book</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Editing Modal Ends -->


<script type="text/javascript" src="./assets/ajax/book_ajax.js"></script>