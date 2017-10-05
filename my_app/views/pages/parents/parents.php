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
            <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal"><?php echo $this->lang->line('top_add_parent_button');?></button>
          </li>
        </ul>
      </nav>

      <div class="overflow-x-auto mt-1">
        <table class="table table-striped table-bordered dataTable" id="teachers_table" style="width:100%;">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('parents_table_slno');?></th>
              <th><?php echo $this->lang->line('parents_table_name');?></th>
              <th><?php echo $this->lang->line('parents_table_email');?></th>
              <th><?php echo $this->lang->line('parents_table_phone');?></th>
              <th><?php echo $this->lang->line('parents_table_status');?></th>
              <th><?php echo $this->lang->line('parents_table_action');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('parents_table_slno');?></th>
              <th><?php echo $this->lang->line('parents_table_name');?></th>
              <th><?php echo $this->lang->line('parents_table_email');?></th>
              <th><?php echo $this->lang->line('parents_table_phone');?></th>
              <th><?php echo $this->lang->line('parents_table_status');?></th>
              <th><?php echo $this->lang->line('parents_table_action');?></th>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_parent');?></h4>
      </div>
      <div class="modal-body">
        <form id="add_parents">
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_name');?>" name="name">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_father_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_father_name');?>" name="father_name">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_mother_name');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_mother_name');?>" name="mother_name">
            </div>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_father_profession');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_father_profession');?>" name="father_profession">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_mother_profession');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_mother_profession');?>" name="mother_profession">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_email');?><span class="text-danger">*</span> </label>
            <input type="email" class="form-control" placeholder="<?php echo $this->lang->line('parents_email');?>" name="email">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_phone');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_phone');?>" name="phone">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_address');?></label>
            <textarea class="form-control" rows="3" name="address" placeholder="<?php echo $this->lang->line('parents_address');?>"></textarea>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_username');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_username');?>" name="username">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_password');?><span class="text-danger">*</span></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('parents_password');?>" name="password">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_photo');?></label>
            <input type="file" id="add-photo" class="dropify" name="photo" />
            <small class="text-danger pull-right"><?php echo $this->lang->line('image_caution');?></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_parent_button');?></button>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_parent');?></h4>
      </div>
      <div class="modal-body">
        <form id="edit_parents">
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_name');?>" name="name" for="name">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_father_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_father_name');?>" name="father_name" for="father_name">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_mother_name');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_mother_name');?>" name="mother_name" for="mother_name">
            </div>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_father_profession');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_father_profession');?>" name="father_profession" for="father_profession">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_mother_profession');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_mother_profession');?>" name="mother_profession" for="mother_profession">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_email');?><span class="text-danger">*</span> </label>
            <input type="email" class="form-control" placeholder="<?php echo $this->lang->line('parents_email');?>" name="email" for="email">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_phone');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('parents_phone');?>" name="phone" for="phone">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_address');?></label>
            <textarea class="form-control" rows="3" name="address" placeholder="<?php echo $this->lang->line('parents_address');?>" for="address"></textarea>
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_photo');?></label>
            <input type="file" id="edit-photo" class="dropify" name="photo" />
            <small class="text-danger pull-right"><?php echo $this->lang->line('image_caution');?></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save_parent_button');?></button>
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
      <div class="modal-body" id="view_parent">


        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(./assets/img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" src="./assets/img/avatars/1.jpg" alt="" id="parents_image" width="70" height="70">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" block="name"></a></h5>
            <p class="text-muted" block="email"></p>
          </div>

          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <tbody>
                  <tr>
                    <th><?php echo $this->lang->line('parents_father_name');?></th>
                    <th>:</th>
                    <td block="father_name" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('parents_mother_name');?></th>
                    <th>:</th>
                    <td block="mother_name" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('parents_father_profession');?></th>
                    <th>:</th>
                    <td block="father_profession" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('parents_mother_profession');?></th>
                    <th>:</th>
                    <td block="mother_profession" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('parents_phone');?></th>
                    <th>:</th>
                    <td block="phone" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('parents_username');?></th>
                    <th>:</th>
                    <td block="username" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('parents_address');?></th>
                    <th>:</th>
                    <td block="address" class="text-xs-left" colspan="3"></td>
                  </tr>
                </tbody>  
              </table>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-black" onclick="print('view_parent')">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('change_password');?></h4>
      </div>
      <div class="modal-body">
        <form id="change_pass">
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_password');?></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('parents_password');?>" name="password">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('parents_confirm_password');?></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('parents_confirm_password');?>" name="c_password">
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

<!-- Editing Modal Ends -->

<script type="text/javascript" src="./assets/ajax/parents_ajax.js"></script>