<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<?php
$this->cm->_table_name = "classes";
$this->cm->_field_name = "classesID";
$this->cm->_order_by = "ASCE";
$class = $this->cm->get_by_order();
?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">

    <nav class="navbar navbar-light bg-white b-a mb-2">
      <ul class="nav navbar-nav float-xs-right">
        <li class="nav-item">
          <div class="dropdown dropdown float-xs-left mr-0-25">
            <button class="btn btn-primary dropdown-toggle" type="button" id="class_label" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Classes
            </button>
            <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuButton">
              <?php if($class): foreach($class as $c):?>
                <a class="dropdown-item" onclick="get_section('<?php echo $c->classesID;?>','<?php echo $c->classes?>')" style="cursor:pointer;"><?php echo $c->classes ?></a>
              <?php endforeach; endif?>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown dropdown float-xs-left mr-0-25">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="section_label">
              Section
            </button>
            <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuButton" id="section_select">
            </div>
          </div>
        </li>
      </ul>
      <div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar2">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>"><i class="ti-microsoft"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link">Library Member</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="box box-block bg-white" id="lmember" style="display:none;">
      <h5 class="mb-1">Exporting Table Data</h5>
      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="lmember_table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>SL</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Adding Modal Starts -->
<button data-toggle="modal" data-target=".add-modal" id="add_modal" style="display:none;"></button>
<div class="modal fade add-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Library Member</h4>
      </div>
      <div class="modal-body">
        <form id="add_lmember">
          <div class="form-group">
            <label>Library ID<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Library ID" name="lID">
          </div>
          <div class="form-group">
            <label>Library Fee</label>
            <input type="text" class="form-control" placeholder="Library Fee" name="lbalance">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Member</button>
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
        <h4 class="modal-title" id="myModalLabel">Edit Library Member</h4>
      </div>
      <div class="modal-body">
        <form id="edit_lmember">
          <div class="form-group">
            <label>Library ID<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Library ID" name="lID" for="lID">
          </div>
          <div class="form-group">
            <label>Library Fee</label>
            <input type="text" class="form-control" placeholder="Library Fee" name="lbalance" for="lbalance">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Member</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Editing Modal Ends -->

<!-- View Modal Starts -->
<button data-toggle="modal" data-target=".view-modal" id="view_modal" style="display:none;"></button>
<div class="modal fade view-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Profile Of : <a block="heading_name"></a></h4>
      </div>
      <div class="modal-body">


        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(./assets/img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" src="./assets/img/avatars/1.jpg" alt="" id="teacher_image" width="70" height="70">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" block="name"></a></h5>
            <p class="text-muted" block="designation"></p>
          </div>

          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Date Of Birth</th>
                    <th>:</th>
                    <td block="dob" class="text-xs-left"></td>
                    <th>Username</th>
                    <th>:</th>
                    <td block="username" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th>Gender</th>
                    <th>:</th>
                    <td block="gender" class="text-xs-left"></td>
                    <th>Religion</th>
                    <th>:</th>
                    <td block="religion" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <th>:</th>
                    <td block="email" class="text-xs-left"></td>
                    <th>Phone</th>
                    <th>:</th>
                    <td block="phone" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <th>:</th>
                    <td block="address" class="text-xs-left" colspan="3"></td>
                  </tr>
                </tbody>  
              </table>
            </div>
          </div>
          <h2>Book Issued</h2>
          <div class="row" style="padding:10px;">
            <div class="col-md-12">
              <div class="overflow-x-auto">
              <table class="table table-striped table-bordered dataTable" id="issue_table">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- View Modal Ends -->

<!-- Editing Modal Starts -->
<button data-toggle="modal" data-target=".pass-change-modal" id="pass_change_modal" style="display:none;"></button>
<div class="modal fade pass-change-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
        <form id="change_pass">
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" placeholder="password" name="password">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Confirm Password</label>
            <input type="password" class="form-control" placeholder="password" name="c_password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Editing Modal Ends -->

<script type="text/javascript" src="./assets/ajax/lmember_ajax.js"></script>