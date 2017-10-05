<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<?php
$this->cm->_table_name = "classes";
$this->cm->_field_name = "classesID";
$this->cm->_order_by = "ASCE";
$class = $this->cm->get_by_order();

$this->cm->_table_name = "exam";
$this->cm->_field_name = "examID";
$this->cm->_order_by = "ASCE";
$exam = $this->cm->get_by_order();
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
            <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal"><?php echo $this->lang->line('top_add_mark_button');?></button>
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

      <div class="overflow-x-auto student_mark_table" style="display:none;">
        <table class="table table-striped table-bordered dataTable" id="student_mark_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('mark_table_slno');?></th>
              <th><?php echo $this->lang->line('mark_table_name');?></th>
              <th><?php echo $this->lang->line('mark_table_phone');?></th>
              <th><?php echo $this->lang->line('mark_table_email');?></th>
              <th><?php echo $this->lang->line('mark_table_action');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('mark_table_slno');?></th>
              <th><?php echo $this->lang->line('mark_table_name');?></th>
              <th><?php echo $this->lang->line('mark_table_phone');?></th>
              <th><?php echo $this->lang->line('mark_table_email');?></th>
              <th><?php echo $this->lang->line('mark_table_action');?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <div class="box box-block bg-white mark_sheet_table" style="display:none;">
      <h5 class="mb-1"><?php echo $this->lang->line('mark_export_data');?></h5>
      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="mark_sheet_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('mark_table_slno');?></th>
              <th><?php echo $this->lang->line('mark_table_name');?></th>
              <th><?php echo $this->lang->line('mark_table_roll');?></th>
              <th><?php echo $this->lang->line('mark_table_class');?></th>
              <th><?php echo $this->lang->line('mark_table_section');?></th>
              <th><?php echo $this->lang->line('mark_table_mark');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('mark_table_slno');?></th>
              <th><?php echo $this->lang->line('mark_table_name');?></th>
              <th><?php echo $this->lang->line('mark_table_roll');?></th>
              <th><?php echo $this->lang->line('mark_table_class');?></th>
              <th><?php echo $this->lang->line('mark_table_section');?></th>
              <th><?php echo $this->lang->line('mark_table_mark');?></th>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_mark');?></h4>
      </div>
      <div class="modal-body">
        <form id="add_mark">

          <div class="form-group">
            <label><?php echo $this->lang->line('mark_exam');?><span class="text-danger">*</span></label>
            <select class="form-control" name="examID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('mark_exam');?></option>
              <?php if($exam): foreach($exam as $e):?>
                <option value="<?php echo $e->examID ?>"><?php echo $e->exam;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('mark_class');?><span class="text-danger">*</span></label>
            <select class="form-control" name="classesID" data-plugin="select2" for="get_section">
              <option value=""><?php echo $this->lang->line('mark_class');?></option>
              <?php if($class): foreach($class as $c):?>
                <option value="<?php echo $c->classesID ?>"><?php echo $c->classes;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group" id="section_select">
            <label><?php echo $this->lang->line('mark_section');?><span class="text-danger">*</span></label>
            <select class="form-control" name="sectionID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('mark_section');?></option>
            </select>
          </div>

          <div class="form-group" id="section_select">
            <label><?php echo $this->lang->line('mark_subject');?><span class="text-danger">*</span></label>
            <select class="form-control" name="subjectID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('mark_subject');?></option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_mark_button');?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Adding Modal Ends -->


<!-- View Modal Starts -->
<button data-toggle="modal" data-target=".view-modal" id="view_modal" style="display:none;"></button>
<div class="modal fade view-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('marks_of');?> : <a block="heading_name"></a></h4>
      </div>
      <div class="modal-body">


        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(./assets/img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" alt="" id="image" width="70" height="70">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" block="name"></a></h5>
            <p class="text-muted" block="designation"></p>
          </div>

          <div class="row" id="vew_mark">
            <div class="col-md-12">
              <table class="table">
                <tbody>
                  <tr>
                    <th><?php echo $this->lang->line('marks_dob');?></th>
                    <th>:</th>
                    <td block="dob" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('marks_gender');?></th>
                    <th>:</th>
                    <td block="gender" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('marks_religion');?></th>
                    <th>:</th>
                    <td block="religion" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('marks_email');?></th>
                    <th>:</th>
                    <td block="email" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('marks_phone');?></th>
                    <th>:</th>
                    <td block="phone" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('marks_username');?></th>
                    <th>:</th>
                    <td block="username" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('marks_address');?></th>
                    <th>:</th>
                    <td block="address" class="text-xs-left" colspan="3"></td>
                  </tr>
                </tbody>  
              </table>
            </div>
          </div>

          <h1 class="mb3"> <?php echo $this->lang->line('marks');?> </h1>

          <div class="row" style="padding:10px;">
            <div class="col-md-12">
             <table class="table table-bordered dataTable" id="marks_table" style="width:100%;" data-page-length='100'>
              <thead>
                <tr>
                  <th><?php echo $this->lang->line('mark_table_exam');?></th>
                  <th><?php echo $this->lang->line('mark_table_subject');?></th>
                  <th><?php echo $this->lang->line('mark_table_mark');?></th>
                  <th><?php echo $this->lang->line('mark_table_grade');?></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th><?php echo $this->lang->line('mark_table_exam');?></th>
                  <th><?php echo $this->lang->line('mark_table_subject');?></th>
                  <th><?php echo $this->lang->line('mark_table_mark');?></th>
                  <th><?php echo $this->lang->line('mark_table_grade');?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
    </div>
  </div>
</div>
</div>

<!-- View Modal Ends -->

<script type="text/javascript" src="./assets/ajax/mark_ajax.js"></script>