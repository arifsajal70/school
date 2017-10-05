<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">


    <div class="box box-block bg-white">

      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')?>"><?php echo $this->lang->line('b_parent');?></a></li>
        <li class="breadcrumb-item active"><?php echo $this->lang->line('b_active');?></li>
      </ol>

      <nav class="navbar navbar-light bg-white">
        <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar1" aria-controls="exCollapsingNavbar1" aria-expanded="false" aria-label="Toggle navigation"></button>
        <ul class="nav navbar-nav float-xs-right">
          <li class="nav-item">
            <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal"><?php echo $this->lang->line('top_add_teacher_button');?></button>
          </li>
        </ul>
      </nav>

      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="teachers_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('teacher_table_slno');?></th>
              <th><?php echo $this->lang->line('teacher_table_name');?></th>
              <th><?php echo $this->lang->line('teacher_table_email');?></th>
              <th><?php echo $this->lang->line('teacher_table_phone');?></th>
              <th><?php echo $this->lang->line('teacher_table_status');?></th>
              <th><?php echo $this->lang->line('teacher_table_action');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('teacher_table_slno');?></th>
              <th><?php echo $this->lang->line('teacher_table_name');?></th>
              <th><?php echo $this->lang->line('teacher_table_email');?></th>
              <th><?php echo $this->lang->line('teacher_table_phone');?></th>
              <th><?php echo $this->lang->line('teacher_table_status');?></th>
              <th><?php echo $this->lang->line('teacher_table_action');?></th>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_teacher');?></h4>
      </div>
      <div class="modal-body">
        <form id="add_teacher">
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_name');?>" name="name">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_designation');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_designation');?>" name="designation">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_dob');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="dob">
            </div>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_gender');?></label>
            <select class="form-control" name="sex">
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_religion');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_religion');?>" name="religion">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_email');?><span class="text-danger">*</span> </label>
            <input type="email" class="form-control" placeholder="<?php echo $this->lang->line('teacher_email');?>" name="email">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_phone');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_phone');?>" name="phone">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_address');?></label>
            <textarea class="form-control" rows="3" name="address" placeholder="<?php echo $this->lang->line('teacher_address');?>"></textarea>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_doj');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="doj">
            </div>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_username');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_username');?>" name="username">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_password');?><span class="text-danger">*</span></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('teacher_password');?>" name="password">
          </div>
          <div class="form-group">
            <label>Photo</label>
            <input type="file" id="add-photo" class="dropify" name="photo" />
            <small class="text-danger pull-right"><?php echo $this->lang->line('image_caution');?></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_teacher_button');?></button>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_teacher');?></h4>
      </div>
      <div class="modal-body">
        <form id="edit_teacher">
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_name');?>" name="name" for='name'>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_designation');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_designation');?>" name="designation" for="designation">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_dob');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="dob" for="dob">
            </div>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_gender');?></label>
            <select class="form-control" name="sex" for="gender">
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_religion');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_religion');?>" name="religion" for="religion">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_email');?><span class="text-danger">*</span> </label>
            <input type="email" class="form-control" placeholder="<?php echo $this->lang->line('teacher_email');?>" name="email" for="email">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_phone');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('teacher_phone');?>" name="phone" for="phone">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_address');?></label>
            <textarea class="form-control" rows="3" name="address" placeholder="<?php echo $this->lang->line('teacher_address');?>" for="address"></textarea>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_doj');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="doj" for="doj">
            </div>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_photo');?></label>
            <input type="file" id="e_photo" class="dropify" name="photo"/>
            <small class="text-danger pull-right"><?php echo $this->lang->line('image_caution');?></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save_teacher_button');?></button>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('profile_of');?> : <a block="heading_name"></a></h4>
      </div>
      <div class="modal-body" id="view_teacher">


        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(./assets/img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" id="teacher_image" width="70" height="70">
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
                    <th><?php echo $this->lang->line('teacher_dob');?></th>
                    <th>:</th>
                    <td block="dob" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('teacher_doj');?></th>
                    <th>:</th>
                    <td block="doj" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('teacher_gender');?></th>
                    <th>:</th>
                    <td block="gender" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('teacher_religion');?></th>
                    <th>:</th>
                    <td block="religion" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('teacher_email');?></th>
                    <th>:</th>
                    <td block="email" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('teacher_phone');?></th>
                    <th>:</th>
                    <td block="phone" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('teacher_address');?></th>
                    <th>:</th>
                    <td block="address" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('teacher_username');?></th>
                    <th>:</th>
                    <td block="username" class="text-xs-left"></td>
                  </tr>
                </tbody>  
              </table>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-black" onclick="print('view_teacher')">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
      </div>
    </div>
  </div>
</div>

<!-- View Modal Ends -->

<!-- Password Change Modal Starts -->
<button data-toggle="modal" data-target=".pass-change-modal" id="pass_change_modal" style="display:none;"></button>
<div class="modal fade pass-change-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('change_password');?></h4>
      </div>
      <div class="modal-body">
        <form id="change_pass">
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_password');?></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('teacher_password');?>" name="password">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('teacher_confirm_password');?></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('teacher_confirm_password');?>" name="c_password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('change_password_button');?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Password Change  Modal Ends -->

<script type="text/javascript" src="./assets/ajax/teacher_ajax.js"></script>