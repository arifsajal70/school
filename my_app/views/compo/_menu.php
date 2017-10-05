<?php if($this->session->userdata('usertype') == "Admin"):?>
<div class="site-sidebar">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="menu-title">MENU</li>
      <li>
        <a href="<?php echo base_url();?>dashboard" class="waves-effect waves-light">
          <span class="s-icon"><i class="ti-microsoft"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_dashboard');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>student" class="waves-effect waves-light">
          <span class="s-icon"><i class="pe-7s-user"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_student');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>parents" class="waves-effect  waves-light">
          <span class="s-icon"><i class="pe-7s-users"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_parent');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>teacher" class="waves-effect waves-light">
          <span class="s-icon"><i class="ti-user"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_teacher');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>user" class="waves-effect  waves-light">
          <span class="s-icon"><i class="typcn typcn-group"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_user');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>classes" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-sitemap"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_classes');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>section" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-vector"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_section');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>subject" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-book"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_subject');?></span>
        </a>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-clipboard"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_exam');?></span>
        </a>
        <ul>
          <li><a href="<?php echo base_url()?>exam"><?php echo $this->lang->line('menu_exam');?></a></li>
          <li><a href="<?php echo base_url();?>exam_schedule"><?php echo $this->lang->line('menu_examschedule');?></a></li>
          <li><a href="<?php echo base_url();?>grade"><?php echo $this->lang->line('menu_grade');?></a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url();?>mark" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-flask"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_mark');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>promotion" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-rocket"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_promotion');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>routine" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-layout-list-thumb"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_routine');?></span>
        </a>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-target"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_attendance');?></span>
        </a>
        <ul>
          <li><a href="<?php echo base_url();?>sattendance"><?php echo $this->lang->line('menu_sattendance');?></a></li>
          <li><a href="ui-buttons.html"><?php echo $this->lang->line('menu_tattendance');?></a></li>
        </ul>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-layout-menu-v"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_library');?></span>
        </a>
        <ul>
          <li><a href="<?php echo base_url();?>lmember"><?php echo $this->lang->line('menu_member');?></a></li>
          <li><a href="<?php echo base_url();?>book"><?php echo $this->lang->line('menu_books');?></a></li>
          <li><a href="<?php echo base_url();?>issue"><?php echo $this->lang->line('menu_issue');?></a></li>
          <li><a href="<?php echo base_url();?>fine"><?php echo $this->lang->line('menu_fine');?></a></li>
        </ul>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-money"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_account');?></span>
        </a>
        <ul>
          <li><a href="<?php echo base_url();?>fee_type"><?php echo $this->lang->line('menu_feetype');?></a></li>
          <li><a href="tables-editable.html"><?php echo $this->lang->line('menu_invoice');?></a></li>
          <li><a href="tables-jsgrid.html"><?php echo $this->lang->line('menu_balance');?></a></li>
          <li><a href="tables-jsgrid.html"><?php echo $this->lang->line('menu_expense');?></a></li>
        </ul>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-microphone"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_announcement');?></span>
        </a>
        <ul>
          <li><a href="pages-blank.html"><?php echo $this->lang->line('menu_notice');?></a></li>
          <li><a href="pages-contactform.html"><?php echo $this->lang->line('menu_event');?></a></li>
          <li><a href="pages-403.html"><?php echo $this->lang->line('menu_holiday');?></a></li>
        </ul>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-view-grid"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_report');?></span>
        </a>
        <ul>
          <li><a href="apps-chat.html"><?php echo $this->lang->line('menu_class_report');?></a></li>
          <li><a href="apps-contacts.html"><?php echo $this->lang->line('menu_attendance_report');?></a></li>
          <li><a href="apps-inbox.html"><?php echo $this->lang->line('menu_student_report');?></a></li>
        </ul>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-crown"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_administrator');?></span>
        </a>
        <ul>
          <li><a href="icons-fontawesome.html"><?php echo $this->lang->line('menu_academic_year');?></a></li>
          <li><a href="icons-fontawesome.html"><?php echo $this->lang->line('menu_system_admin');?></a></li>
          <li><a href="icons-ionicons.html"><?php echo $this->lang->line('menu_import');?></a></li>
          <li><a href="icons-material.html"><?php echo $this->lang->line('menu_backup');?></a></li>
        </ul>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-settings"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_setting');?></span>
        </a>
        <ul>
          <li><a href="utilities-border.html"><?php echo $this->lang->line('menu_general_setting');?></a></li>
        </ul>
      </li>

      <li class="menu-title compact-hide">System usage</li>
      <li class="compact-hide">
        <div class="progress-widget progress-widget-light">
          <div class="mb-0-5">
            SSD
            <span class="float-xs-right">
              <?php
                echo disk_free_space ("/");
              ?>

            </span>
          </div>
          <progress class="progress progress-rounded progress-success progress-sm" value="60" max="100">100%</progress>
          <div class="mb-0-5">
            CPU
            <span class="float-xs-right"><?php echo memory_get_usage(true) ?>%</span>
          </div>
          <progress class="progress progress-rounded progress-danger progress-sm mb-0-5" value="80" max="100">100%</progress>
        </div>
      </li>
    </ul>
  </div>
</div>
<?php endif;?>


<?php if($this->session->userdata('usertype') == "Student"):?>
<div class="site-sidebar">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="menu-title">MENU</li>
      <li>
        <a href="<?php echo base_url();?>dashboard" class="waves-effect waves-light">
          <span class="s-icon"><i class="ti-microsoft"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_dashboard');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>teacher" class="waves-effect waves-light">
          <span class="s-icon"><i class="ti-user"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_teacher');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>subject" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-book"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_subject');?></span>
        </a>
      <li>
        <a href="<?php echo base_url();?>exam_schedule" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-signal"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_examschedule');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>mark" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-flask"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_mark');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>routine" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-layout-list-thumb"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_routine');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>sattendance" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-target"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_attendance');?></span>
        </a>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-layout-menu-v"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_library');?></span>
        </a>
        <ul>
          <li><a href="forms-editors.html"><?php echo $this->lang->line('menu_books');?></a></li>
          <li><a href="forms-masks.html"><?php echo $this->lang->line('menu_issue');?></a></li>
          <li><a href="forms-masks.html"><?php echo $this->lang->line('menu_profile');?></a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url();?>invoice" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-clipboard"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_invoice');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>invoice" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-target"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_media');?></span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url();?>invoice" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-announcement"></i></span>
          <span class="s-text"><?php echo $this->lang->line('menu_notice');?></span>
        </a>
      </li>
      
    </ul>
  </div>
</div>
<?php endif;?>