<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<?php
$this->cm->_table_name = "classes";
$this->cm->_field_name = "classesID";
$this->cm->_order_by = "ASCE";
$class = $this->cm->get_by_order();

$this->cm->_table_name = "teacher";
$this->cm->_field_name = "teacherID";
$this->cm->_order_by = "ASEC";
$teacher = $this->cm->get_by_order();
?>
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
            <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal"><?php echo $this->lang->line('top_add_subject_button');?></button>
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
                  <a class="dropdown-item" onclick="view_table('<?php echo $c->classesID?>','<?php echo $c->classes?>')" style="cursor:pointer;"><?php echo $c->classes ?></a>
                <?php endforeach; endif?>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="overflow-x-auto subject_table" style="display:none;">
        <table class="table table-striped table-bordered dataTable" id="subject_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('subject_table_slno');?></th>
              <th><?php echo $this->lang->line('subject_table_subject');?></th>
              <th><?php echo $this->lang->line('subject_table_class');?></th>
              <th><?php echo $this->lang->line('subject_table_teacher');?></th>
              <th><?php echo $this->lang->line('subject_table_code');?></th>
              <th><?php echo $this->lang->line('subject_table_author');?></th>
              <th><?php echo $this->lang->line('subject_table_action');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('subject_table_slno');?></th>
              <th><?php echo $this->lang->line('subject_table_subject');?></th>
              <th><?php echo $this->lang->line('subject_table_class');?></th>
              <th><?php echo $this->lang->line('subject_table_teacher');?></th>
              <th><?php echo $this->lang->line('subject_table_code');?></th>
              <th><?php echo $this->lang->line('subject_table_author');?></th>
              <th><?php echo $this->lang->line('subject_table_action');?></th>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_subject');?></h4>
      </div>
      <div class="modal-body">
        <form id="add_subject">

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_subject');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('subject_subject');?>" name="subject">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_author');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('subject_author');?>" name="subject_author">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_class');?><span class="text-danger">*</span></label>
            <select class="form-control" name="classesID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('subject_class');?></option>
              <?php if($class): foreach($class as $c):?>
                <option value="<?php echo $c->classesID ?>"><?php echo $c->classes;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_teacher');?><span class="text-danger">*</span></label>
            <select class="form-control" name="teacherID" data-plugin="select2">
              <option value=""><?php echo $this->lang->line('subject_teacher');?></option>
              <?php if($teacher): foreach($teacher as $t):?>
                <option value="<?php echo $t->teacherID ?>"><?php echo $t->name;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_code');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('subject_code');?>" name="subject_code">
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_subject_button');?></button>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_subject');?></h4>
      </div>
      <div class="modal-body">
        <form id="edit_subject">

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_subject');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('subject_subject');?>" name="subject" for="subject">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_author');?></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('subject_author');?>" name="subject_author" for="subject_author">
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_class');?><span class="text-danger">*</span></label>
            <select class="form-control" name="classesID" data-plugin="select2" for="classesID">
              <option value=""><?php echo $this->lang->line('subject_class');?></option>
              <?php if($class): foreach($class as $c):?>
                <option value="<?php echo $c->classesID ?>"><?php echo $c->classes;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_teacher');?><span class="text-danger">*</span></label>
            <select class="form-control" name="teacherID" data-plugin="select2" for="teacherID">
              <option value=""><?php echo $this->lang->line('subject_teacher');?></option>
              <?php if($teacher): foreach($teacher as $t):?>
                <option value="<?php echo $t->teacherID ?>"><?php echo $t->name;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>

          <div class="form-group">
            <label><?php echo $this->lang->line('subject_code');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('subject_code');?>" name="subject_code" for="subject_code">
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save_subject_button');?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Editing Modal Ends -->

<script type="text/javascript" src="./assets/ajax/subject_ajax.js"></script>