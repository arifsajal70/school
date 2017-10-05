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
          <a class="nav-link"><?php echo $this->lang->line('select_class_section');?></a>
        </li>
        <li class="nav-item">
          <div class="dropdown dropdown float-xs-left mr-0-25">
            <button class="btn btn-primary dropdown-toggle" type="button" id="class_label" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $this->lang->line('top_class_button');?>
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
              <?php echo $this->lang->line('top_section_button');?>
            </button>
            <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuButton" id="section_select">
            </div>
          </div>
        </li>
        <li class="nav-item">
          <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal">
          <?php echo $this->lang->line('top_register_attendance');?></button>
        </li>
      </ul>
      <div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar2">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>"><i class="ti-microsoft"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link"><?php echo $this->lang->line('breadcrumb');?></a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="box box-block bg-white" id="student" style="display:none;">
      <h5 class="mb-1"><?php echo $this->lang->line('student_export_data');?></h5>
      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="student_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('student_table_slno');?></th>
              <th><?php echo $this->lang->line('student_table_name');?></th>
              <th><?php echo $this->lang->line('student_table_roll');?></th>
              <th><?php echo $this->lang->line('student_table_class');?></th>
              <th><?php echo $this->lang->line('student_table_section');?></th>
              <th><?php echo $this->lang->line('student_table_phone');?></th>
              <th><?php echo $this->lang->line('student_table_action');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('student_table_slno');?></th>
              <th><?php echo $this->lang->line('student_table_name');?></th>
              <th><?php echo $this->lang->line('student_table_roll');?></th>
              <th><?php echo $this->lang->line('student_table_class');?></th>
              <th><?php echo $this->lang->line('student_table_section');?></th>
              <th><?php echo $this->lang->line('student_table_phone');?></th>
              <th><?php echo $this->lang->line('student_table_action');?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <div class="box box-block bg-white" id="register" style="display:none;">
      <h5 class="mb-1"><?php echo $this->lang->line('attendance_export_data');?></h5>
      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="register_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('attendance_table_slno');?></th>
              <th><?php echo $this->lang->line('attendance_table_name');?></th>
              <th><?php echo $this->lang->line('attendance_table_class');?></th>
              <th><?php echo $this->lang->line('attendance_table_section');?></th>
              <th><?php echo $this->lang->line('attendance_table_attendance');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('attendance_table_slno');?></th>
              <th><?php echo $this->lang->line('attendance_table_name');?></th>
              <th><?php echo $this->lang->line('attendance_table_class');?></th>
              <th><?php echo $this->lang->line('attendance_table_section');?></th>
              <th><?php echo $this->lang->line('attendance_table_attendance');?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>


  </div>
</div>

<!-- Adding Modal Starts -->

<div class="modal fade add-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('register_attendance');?></h4>
      </div>
      <div class="modal-body">
        <form id="get_attendance_register">

          <div class="form-group">
            <label><?php echo $this->lang->line('attendance_class');?><span class="text-danger">*</span></label>
            <select class="form-control" name="classesID" data-plugin="select2" id="classes">
              <option value=""><?php echo $this->lang->line('attendance_class');?></option>
              <?php if($class): foreach($class as $c):?>
                <option value="<?php echo $c->classesID ?>"><?php echo $c->classes;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('attendance_section');?><span class="text-danger">*</span></label>
            <select class="form-control" name="sectionID" data-plugin="select2" id="find_section">
              <option value=""><?php echo $this->lang->line('attendance_section');?></option>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('attendance_date');?><span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="date">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('register_attendance_button');?></button>
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
        <h4 class="modal-title" id="myModalLabel">Attendance Of : <a block="heading_name"></a></h4>
      </div>
      <div class="modal-body">


        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(./assets/img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" src="./assets/img/avatars/1.jpg" alt="" id="image" width="70" height="70">
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
                    <th><?php echo $this->lang->line('student_name');?></th>
                    <th>:</th>
                    <td block="name" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('student_class');?></th>
                    <th>:</th>
                    <td block="class" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('student_section');?></th>
                    <th>:</th>
                    <td block="section" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('student_roll');?></th>
                    <th>:</th>
                    <td block="roll" class="text-xs-left"></td>
                  </tr>
                  <tr>
                    <th><?php echo $this->lang->line('student_parent_name');?></th>
                    <th>:</th>
                    <td block="parent_name" class="text-xs-left"></td>
                    <th><?php echo $this->lang->line('student_parent_phone');?></th>
                    <th>:</th>
                    <td block="parent_phone" class="text-xs-left"></td>
                  </tr>
                </tbody>  
              </table>

            </div>
          </div>
          <hr>
          <br>
          <h1 style="font-size:24px;"><?php echo $this->lang->line('attendance_of')?> <?php echo date("M Y");?> </h1>
          <br>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <th style="text-align:center;" id="01date"></th>
                    <th style="text-align:center;" id="02date"></th>
                    <th style="text-align:center;" id="03date"></th>
                    <th style="text-align:center;" id="04date"></th>
                    <th style="text-align:center;" id="05date"></th>
                    <th style="text-align:center;" id="06date"></th>
                    <th style="text-align:center;" id="07date"></th>
                  </tr>
                  <tr>
                    <td id="1attend"></td>
                    <td id="2attend"></td>
                    <td id="3attend"></td>
                    <td id="4attend"></td>
                    <td id="5attend"></td>
                    <td id="6attend"></td>
                    <td id="7attend"></td>
                  </tr>
                  <tr>
                    <th style="text-align:center;" id="08date"></th>
                    <th style="text-align:center;" id="09date"></th>
                    <th style="text-align:center;" id="10date"></th>
                    <th style="text-align:center;" id="11date"></th>
                    <th style="text-align:center;" id="12date"></th>
                    <th style="text-align:center;" id="13date"></th>
                    <th style="text-align:center;" id="14date"></th>
                  </tr>
                  <tr>
                    <td id="8attend"></td>
                    <td id="9attend"></td>
                    <td id="10attend"></td>
                    <td id="11attend"></td>
                    <td id="12attend"></td>
                    <td id="13attend"></td>
                    <td id="14attend"></td>
                  </tr>
                  <tr>
                    <th style="text-align:center;" id="15date"></th>
                    <th style="text-align:center;" id="16date"></th>
                    <th style="text-align:center;" id="17date"></th>
                    <th style="text-align:center;" id="18date"></th>
                    <th style="text-align:center;" id="19date"></th>
                    <th style="text-align:center;" id="20date"></th>
                    <th style="text-align:center;" id="21date"></th>
                  </tr>
                  <tr>
                    <td id="15attend"></td>
                    <td id="16attend"></td>
                    <td id="17attend"></td>
                    <td id="18attend"></td>
                    <td id="19attend"></td>
                    <td id="20attend"></td>
                    <td id="21attend"></td>
                  </tr>
                  <tr>
                    <th style="text-align:center;" id="22date"></th>
                    <th style="text-align:center;" id="23date"></th>
                    <th style="text-align:center;" id="24date"></th>
                    <th style="text-align:center;" id="25date"></th>
                    <th style="text-align:center;" id="26date"></th>
                    <th style="text-align:center;" id="27date"></th>
                    <th style="text-align:center;" id="28date"></th>
                  </tr>
                  <tr>
                    <td id="22attend"></td>
                    <td id="23attend"></td>
                    <td id="24attend"></td>
                    <td id="25attend"></td>
                    <td id="26attend"></td>
                    <td id="27attend"></td>
                    <td id="28attend"></td>
                  </tr>
                <?php if(ucfirst(date('M')) != 'Feb'):?>
                  <tr>
                    <th style="text-align:center;" id="29date"></th>
                    <th style="text-align:center;" id="30date"></th>
                  <?php if(ucfirst(date('M')) == 'Jan'||ucfirst(date('M')) == 'Mar'||ucfirst(date('M')) == 'Apr'||ucfirst(date('M')) == 'Jun'||ucfirst(date('M')) == 'Aug'||ucfirst(date('M')) == 'Oct'||ucfirst(date('M')) == 'Dec'):?>
                    <th style="text-align:center;" id="31date"></th>
                  <?php endif;?>
                  </tr>
                  <tr>
                    <td id="29attend">p</td>
                    <td id="30attend">p</td>
                  <?php if(ucfirst(date('M')) == 'Jan'||ucfirst(date('M')) == 'Mar'||ucfirst(date('M')) == 'Apr'||ucfirst(date('M')) == 'Jun'||ucfirst(date('M')) == 'Aug'||ucfirst(date('M')) == 'Oct'||ucfirst(date('M')) == 'Dec'):?>
                    <td id="31attend">p</td>
                  <?php endif;?>
                  </tr>
                <?php endif;?>
                </tbody>  
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

<script type="text/javascript" src="./assets/ajax/sattendance_ajax.js"></script>