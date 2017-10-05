<?php defined('BASEPATH') or exit('No direct acript access allowed');?>
<?php
$this->db->select('*');
$this->db->from('lmember');
$this->db->join('student','lmember.studentID=student.studentID');
$lmember = $this->db->get()->result();

$this->cm->_table_name = "book";
$book = $this->cm->get();
?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">

    <nav class="navbar navbar-light bg-white b-a mb-2">
      <ul class="nav navbar-nav float-xs-right">
        <li class="nav-item">
          <button class="btn btn-primary" data-toggle="modal" data-target=".add-modal">Issue Book</button>
        </li>
      </ul>
      <div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar2">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>"><i class="ti-microsoft"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link">Issue</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="box box-block bg-white">
      <h5 class="mb-1">Exporting Table Data</h5>
      <div class="overflow-x-auto">
        <table class="table table-striped table-bordered dataTable" id="issue_table">
          <thead>
            <tr>
              <th>SL</th>
              <th>Member</th>
              <th>Book</th>
              <th>Issue Date</th>
              <th>Due Date</th>
              <th>Return Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>SL</th>
              <th>Member</th>
              <th>Book</th>
              <th>Issue Date</th>
              <th>Due Date</th>
              <th>Return Date</th>
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
        <form id="issue_book">
          <div class="form-group">
            <label>Member<span class="text-danger">*</span></label>
            <select class="form-control" name="lID" data-plugin="select2">
              <option value="">Member</option>
              <?php if($lmember): foreach($lmember as $lm):?>
                <option value="<?php echo $lm->lID;?>"><?php echo $lm->name;?> (<?php echo $lm->lID;?>)</option>
              <?php endforeach; endif;?>
            </select>
          </div>
          <div class="form-group">
            <label>Book<span class="text-danger">*</span></label>
            <select class="form-control" name="bookID" data-plugin="select2">
              <option value="">Book</option>
              <?php if($book): foreach($book as $b):?>
                <option value="<?php echo $b->bookID;?>"><?php echo $b->book;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>
          <div class="form-group">
            <label>Due Date<span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="due_date">
            </div>
          </div>
          <div class="form-group">
            <label>Fine</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Fine" name="fine">
            </div>
          </div>
          <div class="form-group">
            <label>Note</label>
            <textarea class="form-control" rows="3" name="note" placeholder="Note"></textarea>
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
        <form id="edit_issue">
          <div class="form-group">
            <label>Member<span class="text-danger">*</span></label>
            <select class="form-control" name="lID" data-plugin="select2" for="lID">
              <option value="">Member</option>
              <?php if($lmember): foreach($lmember as $lm):?>
                <option value="<?php echo $lm->lID;?>"><?php echo $lm->name;?> (<?php echo $lm->lID;?>)</option>
              <?php endforeach; endif;?>
            </select>
          </div>
          <div class="form-group">
            <label>Book<span class="text-danger">*</span></label>
            <select class="form-control" name="bookID" data-plugin="select2" for="bookID">
              <option value="">Book</option>
              <?php if($book): foreach($book as $b):?>
                <option value="<?php echo $b->bookID;?>"><?php echo $b->book;?></option>
              <?php endforeach; endif;?>
            </select>
          </div>
          <div class="form-group">
            <label>Due Date<span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="text" class="form-control" id="datepicker-autoclose" placeholder="yyyy-dd-mm" name="due_date" for="due_date">
            </div>
          </div>
          <div class="form-group">
            <label>Fine</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Fine" name="fine" for="fine">
            </div>
          </div>
          <div class="form-group">
            <label>Note</label>
            <textarea class="form-control" rows="3" name="note" placeholder="Note" for="note"></textarea>
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


<script type="text/javascript" src="./assets/ajax/issue_ajax.js"></script>