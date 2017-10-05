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
            <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal"><?php echo $this->lang->line('top_add_grade_button');?></button>
          </li>
        </ul>
      </nav>
      <h5 class="mb-1"><?php echo $this->lang->line('grade_export_data');?></h5>
      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="grade_table">
          <thead>
            <tr>
              <th><?php echo $this->lang->line('grade_table_slno');?></th>
              <th><?php echo $this->lang->line('grade_table_grade');?></th>
              <th><?php echo $this->lang->line('grade_table_point');?></th>
              <th><?php echo $this->lang->line('grade_table_marks');?></th>
              <th><?php echo $this->lang->line('grade_table_note');?></th>
              <th><?php echo $this->lang->line('grade_table_action');?></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th><?php echo $this->lang->line('grade_table_slno');?></th>
              <th><?php echo $this->lang->line('grade_table_grade');?></th>
              <th><?php echo $this->lang->line('grade_table_point');?></th>
              <th><?php echo $this->lang->line('grade_table_marks');?></th>
              <th><?php echo $this->lang->line('grade_table_note');?></th>
              <th><?php echo $this->lang->line('grade_table_action');?></th>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('add_grade');?></h4>
      </div>
      <div class="modal-body">
        <form id="add_grade">
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('grade_name');?>" name="grade">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_point');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('grade_point');?>" name="point">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_mark_from');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('grade_mark_from');?>" name="gradefrom">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_mark_to');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Mark Upto" name="gradeupto">
          </div>
          <div classs="form-group">
            <label><?php echo $this->lang->line('grade_note');?></label>
            <textarea class="form-control" rows="3" name="note" placeholder="<?php echo $this->lang->line('grade_note');?>"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_grade_button');?></button>
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
        <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('edit_grade');?></h4>
      </div>
      <div class="modal-body">
        <form id="edit_grade">
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_name');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('grade_name');?>" name="grade" for="grade">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_point');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('grade_point');?>" name="point" for="point">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_mark_from');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('grade_mark_from');?>" name="gradefrom" for="gradefrom">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_mark_to');?><span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('grade_mark_to');?>" name="gradeupto" for="gradeupto">
          </div>
          <div class="form-group">
            <label><?php echo $this->lang->line('grade_note');?></label>
            <textarea class="form-control" rows="3" name="note" placeholder="Note" for="note"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('modal_close');?></button>
          <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save_grade_button');?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Editing Modal Ends -->

<script type="text/javascript" src="./assets/ajax/grade_ajax.js"></script>