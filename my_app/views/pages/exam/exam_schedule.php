<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<?php
$this->cm->_table_name = "exam";
$this->cm->_field_name = "examID";
$this->cm->_order_by = "ASCE";
$exam = $this->cm->get_by_order();

$this->cm->_table_name = "classes";
$this->cm->_field_name = "classesID";
$this->cm->_order_by = "ASCE";
$class = $this->cm->get_by_order();
?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">

    <div class="box box-block bg-white">

      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')?>"><?php echo $this->lang->line('b_parent_parent');?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('exam')?>"><?php echo $this->lang->line('b_parent');?></a></li>
        <li class="breadcrumb-item active"><?php echo $this->lang->line('b_active');?></li>
      </ol>

      <nav class="navbar navbar-light">
        <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar1" aria-controls="exCollapsingNavbar1" aria-expanded="false" aria-label="Toggle navigation"></button>
        <ul class="nav navbar-nav float-xs-right">
          <li class="nav-item">
            <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal"><?php echo $this->lang->line('top_add_exam_schedule_button');?></button>
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

      <div class="overflow-x-auto schedule_table" style="display:none;">
        <table class="table table-striped table-bordered dataTable" id="schedule_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('exam_schedule_table_slno');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_exam');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_class');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_section');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_subject');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_date');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_time');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_action');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('exam_schedule_table_slno');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_exam');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_class');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_section');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_subject');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_date');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_time');?></th>
              <th><?php echo $this->lang->line('exam_schedule_table_action');?></th>
            </tr>
          </tfoot>
        </table>
      </div>



      <div class="exam_attendance_table" style="display:none;">

        <div class="mb-2">
          <button class="btn btn-danger btop mb-2" style="float:right; cursor:pointer;" onclick="change_table();">
            <i class="ti-arrow-left"></i> <?php echo $this->lang->line('exam_attendance_table_back');?>
          </button>
          <table class="table">
            <tr>
              <th style="text-align:center;"><?php echo $this->lang->line('exam_attendance_table_exam');?></th>
              <th style="text-align:center;"><?php echo $this->lang->line('exam_attendance_table_class');?></th>
              <th style="text-align:center;"><?php echo $this->lang->line('exam_attendance_table_section');?></th>
              <th style="text-align:center;"><?php echo $this->lang->line('exam_attendance_table_subject');?></th>
              <th style="text-align:center;"><?php echo $this->lang->line('exam_attendance_table_date');?></th>
              <th style="text-align:center;"><?php echo $this->lang->line('exam_attendance_table_time');?></th>
            </tr>
            <tr>
              <td style="text-align:center;" id="examname"></td>
              <td style="text-align:center;" id="examclass"></td>
              <td style="text-align:center;" id="examsection"></td>
              <td style="text-align:center;" id="examsubject"></td>
              <td style="text-align:center;" id="examdate"></td>
              <td style="text-align:center;" id="examtime"></td>
            </tr>
          </table>
        </div>

        <div class="overflow-x-auto">
          <table class="table table-striped table-bordered dataTable" id="exam_attendance">
            <thead>
              <tr>
                <th><?php echo $this->lang->line('exam_attendance_table_slno');?></th>
                <th><?php echo $this->lang->line('exam_attendance_table_name');?></th>
                <th><?php echo $this->lang->line('exam_attendance_table_phone');?></th>
                <th><?php echo $this->lang->line('exam_attendance_table_email');?></th>
                <th><?php echo $this->lang->line('exam_attendance_table_attendance');?></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th><?php echo $this->lang->line('exam_attendance_table_slno');?></th>
                <th><?php echo $this->lang->line('exam_attendance_table_name');?></th>
                <th><?php echo $this->lang->line('exam_attendance_table_phone');?></th>
                <th><?php echo $this->lang->line('exam_attendance_table_email');?></th>
                <th><?php echo $this->lang->line('exam_attendance_table_attendance');?></th>
              </tr>
            </tfoot>
          </table>
        </div>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_exam_schedule');?></h4>
      </div>
      <div class="modal-body">

        <form id="add_exam_schedule">

          <div class="form-group">
            <label><?php echo $this->lang->line('exam_schedule_exam');?><span class="text-danger">*</span></label>
            <select class="form-control" name="examID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('exam_schedule_exam');?></option>
              <?php if($exam): foreach($exam as $e):?>
                <option value="<?php echo $e->examID ?>"><?php echo $e->exam;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('exam_schedule_class');?><span class="text-danger">*</span></label>
            <select class="form-control" name="classesID" data-plugin="select2" for="get_section">
              <option value=""><?php echo $this->lang->line('exam_schedule_class');?></option>
              <?php if($class): foreach($class as $c):?>
                <option value="<?php echo $c->classesID ?>"><?php echo $c->classes;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group" id="section_select">
            <label><?php echo $this->lang->line('exam_schedule_section');?><span class="text-danger">*</span></label>
            <select class="form-control" name="sectionID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('exam_schedule_section');?></option>
            </select>
          </div>

          <div class="form-group" id="section_select">
            <label><?php echo $this->lang->line('exam_schedule_subject');?><span class="text-danger">*</span></label>
            <select class="form-control" name="subjectID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('exam_schedule_subject');?></option>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('exam_schedule_date');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="edate">
            </div>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('exam_schedule_examfrom');?><span class="text-danger">*</span></label>
            <div class="input-group clockpicker">
              <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('exam_schedule_examfrom');?>" name="examfrom">
            </span>
          </div>
        </div>

        <div class="form-group">
          <label><?php echo $this->lang->line('exam_schedule_examto');?><span class="text-danger">*</span></label>
          <div class="input-group clockpicker">
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('exam_schedule_examto');?>" name="examto">
          </span>
        </div>
      </div>

      <div class="form-group">
        <label><?php echo $this->lang->line('exam_schedule_room');?></label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('exam_schedule_room');?>" name="room">
        </div>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close')?></button>
      <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_exam_schedule_button')?></button>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_exam_schedule');?></h4>
      </div>
      <div class="modal-body">
        <form id="edit_exam_schedule">

          <div class="form-group">
            <label><?php echo $this->lang->line('exam_schedule_exam');?><span class="text-danger">*</span></label>
            <select class="form-control" name="examID" data-plugin="select2" for="examID">
              <option value=""><?php echo $this->lang->line('exam_schedule_exam');?></option>
              <?php if($exam): foreach($exam as $e):?>
                <option value="<?php echo $e->examID ?>"><?php echo $e->exam;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('exam_schedule_class');?><span class="text-danger">*</span></label>
            <select class="form-control" name="classesID" data-plugin="select2" for="get_section" id="classesID">
              <option value=""><?php echo $this->lang->line('exam_schedule_class');?></option>
              <?php if($class): foreach($class as $c):?>
                <option value="<?php echo $c->classesID ?>"><?php echo $c->classes;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group" id="section_select">
            <label><?php echo $this->lang->line('exam_schedule_section');?><span class="text-danger">*</span></label>
            <select class="form-control" name="sectionID" data-plugin="select2" for="sectionID">
              <option value=""><?php echo $this->lang->line('exam_schedule_section');?></option>
            </select>
          </div>

          <div class="form-group" id="section_select">
            <label><?php echo $this->lang->line('exam_schedule_subject');?><span class="text-danger">*</span></label>
            <select class="form-control" name="subjectID" data-plugin="select2" for="subjectID">
              <option value=""><?php echo $this->lang->line('exam_schedule_subject');?></option>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('exam_schedule_date');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="edate" for="edate">
            </div>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('exam_schedule_examfrom');?><span class="text-danger">*</span></label>
            <div class="input-group clockpicker">
              <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('exam_schedule_examfrom');?>" name="examfrom" for="examfrom">
            </span>
          </div>
        </div>

        <div class="form-group">
          <label><?php echo $this->lang->line('exam_schedule_examto');?><span class="text-danger">*</span></label>
          <div class="input-group clockpicker">
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('exam_schedule_examto');?>" name="examto" for="examto">
          </span>
        </div>
      </div>

      <div class="form-group">
        <label><?php echo $this->lang->line('exam_schedule_room');?></label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('exam_schedule_room');?>" name="room" for="room">
        </div>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close')?></button>
      <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save_exam_schedule_button')?></button>
    </div>
  </form>
</div>
</div>
</div>

<!-- Editing Modal Ends -->

<script type="text/javascript" src="./assets/ajax/exam_schedule_ajax.js"></script>