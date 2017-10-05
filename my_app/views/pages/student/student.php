<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<?php
$this->cm->_table_name = "classes";
$this->cm->_field_name = "classesID";
$this->cm->_order_by = "ASCE";
$class = $this->cm->get_by_order();

$this->cm->_table_name = "parent";
$this->cm->_field_name = "parentID";
$this->cm->_order_by = "ASEC";
$gurdian = $this->cm->get_by_order();
?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">

    <div class="box box-block bg-white">


      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')?>"><?php echo $this->lang->line('b_parent');?></a></li>
        <li class="breadcrumb-item active"><?php echo $this->lang->line('b_active');?></li>
      </ol>

      <nav class="navbar navbar-light">
        <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar1" aria-controls="exCollapsingNavbar1" aria-expanded="false" aria-label="Toggle navigation"></button>
        <ul class="nav navbar-nav float-xs-right">
          <li class="nav-item">
            <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal"><?php echo $this->lang->line('top_add_student_button');?></button>
          </li>
        </ul>
        <div class="navbar-toggleable-sm collapse" id="exCollapsingNavbar1">
          <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle btn btn-primary text-white" href="#" id="class_label" data-toggle="dropdown" aria-expanded="false">
                <?php echo $this->lang->line('top_class_button');?>
              </a>
              <div class="dropdown-menu animated flipInY">
                <?php if($class): foreach($class as $c):?>
                  <a class="dropdown-item" onclick="get_section('<?php echo $c->classesID;?>','<?php echo $c->classes?>')" style="cursor:pointer;"><?php echo $c->classes ?></a>
                <?php endforeach; endif?>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle btn btn-primary text-white" href="#" id="section_label" data-toggle="dropdown" aria-expanded="false">
                <?php echo $this->lang->line('top_section_button');?>
              </a>
              <div class="dropdown-menu animated flipInY" id="section_select">
                <a class="dropdown-item">Select Class First</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="overflow-x-auto mt-2 student_table" style="display:none;">
        <table class="table table-striped table-bordered dataTable" id="student_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('student_table_slno');?></th>
              <th><?php echo $this->lang->line('student_table_name');?></th>
              <th><?php echo $this->lang->line('student_table_email');?></th>
              <th><?php echo $this->lang->line('student_table_phone');?></th>
              <th><?php echo $this->lang->line('student_table_status');?></th>
              <th><?php echo $this->lang->line('student_table_action');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('student_table_slno');?></th>
              <th><?php echo $this->lang->line('student_table_name');?></th>
              <th><?php echo $this->lang->line('student_table_email');?></th>
              <th><?php echo $this->lang->line('student_table_phone');?></th>
              <th><?php echo $this->lang->line('student_table_status');?></th>
              <th><?php echo $this->lang->line('student_table_action');?></th>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_student');?></h4>
      </div>
      <div class="modal-body">
        <form id="add_student">

          <div class="form-group">
            <label><?php echo $this->lang->line('student_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_name');?>" name="name">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_dob');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="dob">
            </div>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_gender');?><span class="text-danger">*</span></label>
            <select class="form-control" name="sex">
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_religion');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_religion');?>" name="religion">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_email');?><span class="text-danger">*</span> </label>
            <input type="email" class="form-control" placeholder="<?php echo $this->lang->line('student_email');?>" name="email">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_phone');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_phone');?>" name="phone">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_address');?></label>
            <textarea class="form-control" rows="3" name="address" placeholder="<?php echo $this->lang->line('student_address');?>"></textarea>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_class');?><span class="text-danger">*</span></label>
            <select class="form-control" name="classesID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('student_class');?></option>
              <?php if($class): foreach($class as $c):?>
                <option value="<?php echo $c->classesID ?>"><?php echo $c->classes;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group" id="section_select">
            <label><?php echo $this->lang->line('student_section');?><span class="text-danger">*</span></label>
            <select class="form-control" name="sectionID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('student_section');?></option>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_roll');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_roll');?>" name="roll">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_parent');?><span class="text-danger">*</span></label>
            <select class="form-control" name="parentID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('student_parent');?></option>
              <?php if($gurdian): foreach($gurdian as $g):?>
                <option value="<?php echo $g->parentID ?>"><?php echo $g->name;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_username');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_username');?>" name="username">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('student_password');?><span class="text-danger">*</span></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('student_password');?>" name="password">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('student_photo');?></label>
            <input type="file" id="add-photo" class="dropify" name="photo" />
            <small class="text-danger pull-right"><?php echo $this->lang->line('image_caution');?></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_student_button');?></button>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_student');?></h4>
      </div>
      <div class="modal-body">
        <form id="edit_student">

          <div class="form-group">
            <label><?php echo $this->lang->line('student_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_name');?>" name="name" for="name">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_name');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="dob" for="dob">
            </div>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_gender');?><span class="text-danger">*</span></label>
            <select class="form-control" name="sex" for="gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_religion');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_religion');?>" name="religion" for="religion">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_email');?><span class="text-danger">*</span> </label>
            <input type="email" class="form-control" placeholder="<?php echo $this->lang->line('student_email');?>" name="email" for="email">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_phone');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_phone');?>" name="phone" for="phone">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_address');?></label>
            <textarea class="form-control" rows="3" name="address" placeholder="<?php echo $this->lang->line('student_address');?>" for="address"></textarea>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_class');?><span class="text-danger">*</span></label>
            <select class="form-control" name="classesID" data-plugin="select2" for="get_section" id="classesID">
              <option value=""><?php echo $this->lang->line('student_class');?></option>
              <?php if($class): foreach($class as $c):?>
                <option value="<?php echo $c->classesID ?>"><?php echo $c->classes;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group" id="section_select">
            <label><?php echo $this->lang->line('student_section');?><span class="text-danger">*</span></label>
            <select class="form-control" name="sectionID" data-plugin="select2" for="section">
              <option value=""><?php echo $this->lang->line('student_section');?></option>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_roll');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('student_roll');?>" name="roll" for="roll">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_parent');?><span class="text-danger">*</span></label>
            <select class="form-control" name="parentID" data-plugin="select2" for="parent">
              <option value=""><?php echo $this->lang->line('student_parent');?></option>
              <?php if($gurdian): foreach($gurdian as $g):?>
                <option value="<?php echo $g->parentID ?>"><?php echo $g->name;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('student_photo');?></label>
            <input type="file" id="edit-photo" class="dropify" name="photo" />
            <small class="text-danger pull-right"><?php echo $this->lang->line('image_caution');?></small>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save_student_button');?></button>
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
      <div class="modal-body" id="view_student">

        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(./assets/img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" alt="" id="teacher_image" width="70" height="70">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" block="name"></a></h5>
          </div>

          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <tbody>
                  <tr>
                    <th><?php echo $this->lang->line('student_dob');?></th>
                    <th>:</th>
                    <td block="dob" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('student_account_created');?></th>
                    <th>:</th>
                    <td block="create_date" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('student_gender');?></th>
                    <th>:</th>
                    <td block="gender" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('student_religion');?></th>
                    <th>:</th>
                    <td block="religion" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('student_email');?></th>
                    <th>:</th>
                    <td block="email" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('student_phone');?></th>
                    <th>:</th>
                    <td block="phone" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('student_class');?></th>
                    <th>:</th>
                    <td block="class" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('student_section');?></th>
                    <th>:</th>
                    <td block="section" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('student_roll');?></th>
                    <th>:</th>
                    <td block="roll" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('student_username');?></th>
                    <th>:</th>
                    <td block="username" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('student_address');?></th>
                    <th>:</th>
                    <td block="address" class="text-xs-left" colspan="3"></td>
                  </tr>
                </tbody>  
              </table>
            </div>
          </div>

          <h3 class="mb-2"><?php echo $this->lang->line('parent_information');?></h3>

          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <tbody>
                  <tr>
                    <th><?php echo $this->lang->line('parent_name');?></th>
                    <th>:</th>
                    <td block="pname" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('parent_username');?></th>
                    <th>:</th>
                    <td block="pusername" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('parent_phone');?></th>
                    <th>:</th>
                    <td block="pphone" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('parent_email');?></th>
                    <th>:</th>
                    <td block="pemail" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('parent_father_name');?></th>
                    <th>:</th>
                    <td block="pfathername" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('parent_mother_name');?></th>
                    <th>:</th>
                    <td block="pmothername" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('parent_address');?></th>
                    <th>:</th>
                    <td block="paddress" class="text-xs-left" colspan="3"></td>
                  </tr>
                </tbody>  
              </table>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-black" onclick="print('view_student')">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
      </div>
    </div>
  </div>
</div>

<!-- View Modal Ends -->

<!-- Pass Change Modal Starts -->
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
            <label><?php echo $this->lang->line('student_password');?></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('student_password');?>" name="password">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('student_confirm_password');?></label>
            <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('student_confirm_password');?>" name="c_password">
          </div>
        </div>
        <div class="modal-footer">
          <div class="loader"></div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('change_password_button');?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Editing Modal Ends -->

<script type="text/javascript" src="./assets/ajax/student_ajax.js"></script>