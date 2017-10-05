<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title><?php echo $this->lang->line('page_title');?></title>

    <link rel="icon" type="img/icon" href="./assets/img/icon.png">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/plugins/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/plugins/typicons/src/font/typicons.min.css">
    <link rel="stylesheet" href="./assets/plugins/pe7-icons/assets/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="./assets/plugins/animate.css/animate.min.css">
    <link rel="stylesheet" href="./assets/plugins/jscrollpane/jquery.jscrollpane.css">
    <link rel="stylesheet" href="./assets/plugins/waves/waves.min.css">

    <!-- Required Plugins Starts -->

    <!-- Select 2 -->
    <link rel="stylesheet" href="./assets/plugins/select2/dist/css/select2.min.css">

    <!-- Switchery -->
    <link rel="stylesheet" href="./assets/plugins/switchery/dist/switchery.min.css">
    
    <!-- Datepicker -->
    <link rel="stylesheet" href="./assets/plugins/clockpicker/dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" href="./assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="./assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/plugins/DataTables/Responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/plugins/DataTables/Buttons/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="./assets/plugins/DataTables/Buttons/css/buttons.bootstrap4.min.css">

    <!-- Highcharts -->
    <link rel="stylesheet" href="./assets/plugins/highcharts/css/highcharts.css">

    <!-- Calander -->
    <link rel="stylesheet" href="./assets/plugins/fullcalendar/fullcalendar.min.css">

    <!-- Dropify File upload -->
    <link rel="stylesheet" href="./assets/plugins/dropify/dist/css/dropify.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="./assets/plugins/toastr/toastr.min.css">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="./assets/plugins/sweetalert2/sweetalert2.min.css">

    <!-- Required Plugins Ends -->

    <!-- Neptune CSS -->
    <link rel="stylesheet" href="./assets/css/core.css">

    <script type="text/javascript" src="./assets/plugins/jquery/jquery-1.12.3.min.js"></script>

    <!-- DATATABLES -->
    <script type="text/javascript" src="./assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/JSZip/jszip.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/pdfmake/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/pdfmake/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/Buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/Buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/Buttons/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/DataTables/js/fnreload.js"></script>

  </head>
  <body class="fixed-sidebar fixed-header content-appear skin-default">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader"></div>

      <!-- Sidebar -->
      <div class="site-overlay"></div>
      <?php $this->load->view('compo/_menu');?>
      
      <!-- Sidebar second -->
      <div class="site-sidebar-second custom-scroll custom-scroll-dark">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab">Chat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab">Activity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab">Todo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab">Settings</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-1" role="tabpanel">
            <div class="sidebar-chat animated fadeIn">
              <div class="sidebar-group">
                <h6>Favorites</h6>
                <a class="text-black" href="#">
                  <span class="sc-status bg-success"></span>
                  <span class="sc-name">John Doe</span>
                  <span class="sc-writing"> typing...<i class="ti-pencil"></i></span>
                </a>
                <a class="text-black" href="#">
                  <span class="sc-status bg-success"></span>
                  <span class="sc-name">Vance Osborn</span>
                </a>
                <a class="text-black" href="#">
                  <span class="sc-status bg-danger"></span>
                  <span class="sc-name">Wolfe Stevie</span>
                  <span class="tag tag-primary">7</span>
                </a>
                <a class="text-black" href="#">
                  <span class="sc-status bg-warning"></span>
                  <span class="sc-name">Jonathan Mel</span>
                </a>
                <a class="text-black" href="#">
                  <span class="sc-status bg-secondary"></span>
                  <span class="sc-name">Carleton Josiah</span>
                </a>
              </div>
              <div class="sidebar-group">
                <h6>Work</h6>
                <a class="text-black" href="#">
                  <span class="sc-status bg-secondary"></span>
                  <span class="sc-name">Larry Hal</span>
                </a>
                <a class="text-black" href="#">
                  <span class="sc-status bg-success"></span>
                  <span class="sc-name">Ron Carran</span>
                  <span class="sc-writing"> typing...<i class="ti-pencil"></i></span>
                </a>
              </div>
              <div class="sidebar-group">
                <h6>Social</h6>
                <a class="text-black" href="#">
                  <span class="sc-status bg-success"></span>
                  <span class="sc-name">Lucius Skyler</span>
                  <span class="tag tag-primary">3</span>
                </a>
                <a class="text-black" href="#">
                  <span class="sc-status bg-danger"></span>
                  <span class="sc-name">Landon Graham</span>
                </a>
              </div>
            </div>
            <div class="sidebar-chat-window animated fadeIn">
              <div class="scw-header clearfix">
                <a class="text-grey float-xs-left" href="#"><i class="ti-angle-left"></i> Back</a>
                <div class="float-xs-right">
                  <strong>Jonathan Mel</strong>
                  <div class="avatar box-32">
                    <img src="img/avatars/5.jpg" alt="">
                    <span class="status bg-success top right"></span>
                  </div>
                </div>
              </div>
              <div class="scw-item">
                <span>Hello!</span>
              </div>
              <div class="scw-item self">
                <span>Meeting at 16:00 in the conference room. Remember?</span>
              </div>
              <div class="scw-item">
                <span>No problem. Thank's for reminder!</span>
              </div>
              <div class="scw-item self">
                <span>Prepare to be amazed.</span>
              </div>
              <div class="scw-item">
                <span>Good. Can't wait!</span>
              </div>
              <div class="scw-form">
                <form>
                  <input class="form-control" type="text" placeholder="Type...">
                  <button class="btn btn-secondary" type="button"><i class="ti-angle-right"></i></button>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-2" role="tabpanel">
            <div class="sidebar-activity animated fadeIn">
              <div class="notifications">
                <div class="n-item">
                  <div class="media">
                    <div class="media-left">
                      <div class="avatar box-48">
                        <img class="b-a-radius-circle" src="./assets/img/avatars/1.jpg" alt="">
                        <span class="n-icon bg-danger"><i class="ti-pin-alt"></i></span>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="n-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">uploaded <a class="text-black" href="#">monthly report</a></div>
                      <div class="text-muted font-90">12 minutes ago</div>
                    </div>
                  </div>
                </div>
                <div class="n-item">
                  <div class="media">
                    <div class="media-left">
                      <div class="avatar box-48">
                        <img class="b-a-radius-circle" src="./assets/img/avatars/3.jpg" alt="">
                        <span class="n-icon bg-success"><i class="ti-comment"></i></span>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="n-text"><a class="text-black" href="#">Vance Osborn</a> <span class="text-muted">commented </span> <a class="text-black" href="#">Project</a></div>
                      <div class="n-comment my-0-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</div>
                      <div class="text-muted font-90">3 hours ago</div>
                    </div>
                  </div>
                </div>
                <div class="n-item">
                  <div class="media">
                    <div class="media-left">
                      <div class="avatar box-48">
                        <img class="b-a-radius-circle" src="./assets/img/avatars/2.jpg" alt="">
                        <span class="n-icon bg-danger"><i class="ti-email"></i></span>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="n-text"><a class="text-black" href="#">Ron Carran</a> <span class="text-muted">send you files</span></div>
                      <div class="row row-sm my-0-5">
                        <div class="col-xs-4">
                          <img class="img-fluid" src="./assets/img/photos-1/1.jpg" alt="">
                        </div>
                        <div class="col-xs-4">
                          <img class="img-fluid" src="./assets/img/photos-1/2.jpg" alt="">
                        </div>
                        <div class="col-xs-4">
                          <img class="img-fluid" src="./assets/img/photos-1/3.jpg" alt="">
                        </div>
                      </div>
                      <div class="text-muted font-90">30 minutes ago</div>
                    </div>
                  </div>
                </div>
                <div class="n-item">
                  <div class="media">
                    <div class="media-left">
                      <div class="avatar box-48">
                        <img class="b-a-radius-circle" src="./assets/img/avatars/4.jpg" alt="">
                        <span class="n-icon bg-primary"><i class="ti-plus"></i></span>
                      </div>
                    </div>
                    <div class="media-body">
                      <div class="n-text"><a class="text-black" href="#">Larry Hal</a> <span class="text-muted">invited you to </span><a class="text-black" href="#">Project</a></div>
                      <div class="text-muted font-90">10:58</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-3" role="tabpanel">
            <div class="sidebar-todo animated fadeIn">
              <div class="sidebar-group">
                <h6>Important</h6>
                <div class="st-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Mock up</span>
                  </label>
                </div>
                <div class="st-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Prototype iPhone</span>
                  </label>
                </div>
                <div class="st-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Build final version</span>
                  </label>
                </div>
                <div class="st-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Approval docs</span>
                  </label>
                </div>
              </div>
              <div class="sidebar-group">
                <h6>Secondary</h6>
                <div class="st-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Website redesign</span>
                  </label>
                </div>
                <div class="st-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Skype call</span>
                  </label>
                </div>
                <div class="st-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Blog post</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-4" role="tabpanel">
            <div class="sidebar-settings animated fadeIn">
              <div class="sidebar-group">
                <h6>Main</h6>
                <div class="ss-item">
                  <div class="text-truncate">Anyone can register</div>
                  <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                </div>
                <div class="ss-item">
                  <div class="text-truncate">Allow commenting</div>
                  <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
                </div>
                <div class="ss-item">
                  <div class="text-truncate">Allow deleting</div>
                  <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
                </div>
              </div>
              <div class="sidebar-group">
                <h6>Notificatiоns</h6>
                <div class="ss-item">
                  <div class="text-truncate">Commits</div>
                  <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9"></div>
                </div>
                <div class="ss-item">
                  <div class="text-truncate">Messages</div>
                  <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                </div>
              </div>
              <div class="sidebar-group">
                <h6>Security</h6>
                <div class="ss-item">
                  <div class="text-truncate">Daily backup</div>
                  <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                </div>
                <div class="ss-item">
                  <div class="text-truncate">API Access</div>
                  <div class="ss-checkbox"><input type="checkbox" class="js-switch" data-size="small" data-color="#3e70c9" checked></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Template options -->
      <div class="template-options">
        <div class="to-toggle"><i class="ti-settings"></i></div>
        <div class="custom-scroll custom-scroll-dark">
          <div class="to-content">
            <h6>Layouts Settings</h6>
            <div class="row mb-2 text-xs-center">
              <div class="col-xs-6 mb-2">
                <div class="to-item">
                  <a href="index-2.html">
                    <img src="./assets/img/layouts/default.png" class="img-fluid">
                  </a>
                  <div class="text-muted">Default</div>
                </div>
              </div>
              <div class="col-xs-6 mb-2">
                <div class="to-item">
                  <label>
                    <input name="compact-sidebar" type="checkbox">
                    <div class="to-icon"><i class="ti-check"></i></div>
                    <img src="./assets/img/layouts/compact-sidebar.png" class="img-fluid">
                  </label>
                  <div class="text-muted">Compact Sidebar</div>
                </div>
              </div>
              <div class="col-xs-6 mb-2">
                <div class="to-item">
                  <label>
                    <input name="fixed-header" type="checkbox" checked>
                    <div class="to-icon"><i class="ti-check"></i></div>
                    <img src="./assets/img/layouts/fixed-header.png" class="img-fluid">
                  </label>
                  <div class="text-muted">Fixed Header</div>
                </div>
              </div>
              <div class="col-xs-6 mb-2">
                <div class="to-item">
                  <label>
                    <input name="fixed-sidebar" type="checkbox" checked>
                    <div class="to-icon"><i class="ti-check"></i></div>
                    <img src="./assets/img/layouts/sticky-sidebar.png" class="img-fluid">
                  </label>
                  <div class="text-muted">Sticky Sidebar</div>
                </div>
              </div>
              <div class="col-xs-6 mb-2">
                <div class="to-item">
                  <label>
                    <input name="boxed-wrapper" type="checkbox">
                    <div class="to-icon"><i class="ti-check"></i></div>
                    <img src="./assets/img/layouts/boxed-wrapper.png" class="img-fluid">
                  </label>
                  <div class="text-muted">Boxed Wrapper</div>
                </div>
              </div>
              <div class="col-xs-6 mb-2">
                <div class="to-item">
                  <label>
                    <input name="static" type="checkbox">
                    <div class="to-icon"><i class="ti-check"></i></div>
                    <img src="./assets/img/layouts/static.png" class="img-fluid">
                  </label>
                  <div class="text-muted">Static</div>
                </div>
              </div>
            </div>
            <h6>Skins</h6>
            <div class="row">
              <div class="col-xs-3 mb-2">
                <label class="skin-label">
                  <input name="skin" value="skin-default" type="radio" checked>
                  <div class="to-icon"><i class="ti-check"></i></div>
                  <div class="to-skin">
                    <span class="skin-dark-blue"></span>
                    <span class="skin-white"></span>
                    <span class="skin-dark-blue"></span>
                  </div>
                </label>
              </div>
              <div class="col-xs-3 mb-2">
                <label class="skin-label">
                  <input name="skin" value="skin-1" type="radio">
                  <div class="to-icon"><i class="ti-check"></i></div>
                  <div class="to-skin">
                    <span class="skin-dark-blue-2"></span>
                    <span class="skin-dark-blue-2"></span>
                    <span class="bg-white"></span>
                  </div>
                </label>
              </div>
              <div class="col-xs-3 mb-2">
                <label class="skin-label">
                  <input name="skin" value="skin-2" type="radio">
                  <div class="to-icon"><i class="ti-check"></i></div>
                  <div class="to-skin">
                    <span class="bg-danger"></span>
                    <span class="bg-white"></span>
                    <span class="bg-black"></span>
                  </div>
                </label>
              </div>
              <div class="col-xs-3 mb-2">
                <label class="skin-label">
                  <input name="skin" value="skin-3" type="radio">
                  <div class="to-icon"><i class="ti-check"></i></div>
                  <div class="to-skin">
                    <span class="bg-white"></span>
                    <span class="bg-white"></span>
                    <span class="bg-white"></span>
                  </div>
                </label>
              </div>
              <div class="col-xs-3 mb-2">
                <label class="skin-label">
                  <input name="skin" value="skin-4" type="radio">
                  <div class="to-icon"><i class="ti-check"></i></div>
                  <div class="to-skin">
                    <span class="bg-white"></span>
                    <span class="skin-dark-blue-2"></span>
                    <span class="bg-white"></span>
                  </div>
                </label>
              </div>
              <div class="col-xs-3 mb-2">
                <label class="skin-label">
                  <input name="skin" value="skin-5" type="radio">
                  <div class="to-icon"><i class="ti-check"></i></div>
                  <div class="to-skin">
                    <span class="bg-primary"></span>
                    <span class="bg-primary"></span>
                    <span class="bg-white"></span>
                  </div>
                </label>
              </div>
              <div class="col-xs-3 mb-2">
                <label class="skin-label">
                  <input name="skin" value="skin-6" type="radio">
                  <div class="to-icon"><i class="ti-check"></i></div>
                  <div class="to-skin">
                    <span class="bg-black"></span>
                    <span class="bg-info"></span>
                    <span class="bg-black"></span>
                  </div>
                </label>
              </div>
            </div>
            <div class="to-material">
              <div class="tom-checkbox"><input name="material-design" type="checkbox" class="js-switch" data-size="small" data-color="#20b9ae"></div>
              <div class="text-truncate">Material design</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Header -->
      <div class="site-header">
        <nav class="navbar navbar-light">
          <div class="navbar-left">
            <a class="navbar-brand" href="./dashboard">
              <div class="logo">
                <img src="<?php echo base_url();?>assets/img/logo.png">
              </div>
            </a>
            <div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
              <span class="hamburger"></span>
            </div>
            <div class="toggle-button-second dark float-xs-right hidden-md-up">
              <i class="ti-arrow-left"></i>
            </div>
            <div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
              <span class="more"></span>
            </div>
          </div>
          <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
            <div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
              <span class="hamburger"></span>
            </div>
            <div class="toggle-button-second light float-xs-right hidden-sm-down">
              <i class="ti-arrow-left"></i>
            </div>
            <ul class="nav navbar-nav float-md-right">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="ti-flag-alt"></i>
                  <span class="hidden-md-up ml-1">Tasks</span>
                  <span class="tag tag-success top">3</span>
                </a>
                <div class="dropdown-tasks dropdown-menu dropdown-menu-right animated fadeInUp">
                  <div class="t-item">
                    <div class="mb-0-5">
                      <a class="text-black" href="#">First Task</a>
                      <span class="float-xs-right text-muted">75%</span>
                    </div>
                    <progress class="progress progress-danger progress-sm" value="75" max="100">100%</progress>
                    <span class="avatar box-32">
                      <img src="./assets/img/avatars/2.jpg" alt="">
                    </span>
                    <a class="text-black" href="#">John Doe</a>, <span class="text-muted">5 min ago</span>
                  </div>
                  <div class="t-item">
                    <div class="mb-0-5">
                      <a class="text-black" href="#">Second Task</a>
                      <span class="float-xs-right text-muted">40%</span>
                    </div>
                    <progress class="progress progress-purple progress-sm" value="40" max="100">100%</progress>
                    <span class="avatar box-32">
                      <img src="./assets/img/avatars/3.jpg" alt="">
                    </span>
                    <a class="text-black" href="#">John Doe</a>, <span class="text-muted">15:07</span>
                  </div>
                  <div class="t-item">
                    <div class="mb-0-5">
                      <a class="text-black" href="#">Third Task</a>
                      <span class="float-xs-right text-muted">100%</span>
                    </div>
                    <progress class="progress progress-warning progress-sm" value="100" max="100">100%</progress>
                    <span class="avatar box-32">
                      <img src="./assets/img/avatars/4.jpg" alt="">
                    </span>
                    <a class="text-black" href="#">John Doe</a>, <span class="text-muted">yesterday</span>
                  </div>
                  <div class="t-item">
                    <div class="mb-0-5">
                      <a class="text-black" href="#">Fourth Task</a>
                      <span class="float-xs-right text-muted">60%</span>
                    </div>
                    <progress class="progress progress-success progress-sm" value="60" max="100">100%</progress>
                    <span class="avatar box-32">
                      <img src="./assets/img/avatars/5.jpg" alt="">
                    </span>
                    <a class="text-black" href="#">John Doe</a>, <span class="text-muted">3 days ago</span>
                  </div>
                  <a class="dropdown-more" href="#">
                    <strong>View all tasks</strong>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="ti-email"></i>
                  <span class="hidden-md-up ml-1">Notifications</span>
                  <span class="tag tag-danger top">12</span>
                </a>
                <div class="dropdown-messages dropdown-tasks dropdown-menu dropdown-menu-right animated fadeInUp">
                  <div class="m-item">
                    <div class="mi-icon bg-info"><i class="ti-comment"></i></div>
                    <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">commented post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
                    <div class="mi-time">5 min ago</div>
                  </div>
                  <div class="m-item">
                    <div class="mi-icon bg-danger"><i class="ti-heart"></i></div>
                    <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">liked post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
                    <div class="mi-time">15:07</div>
                  </div>
                  <div class="m-item">
                    <div class="mi-icon bg-purple"><i class="ti-user"></i></div>
                    <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">followed</span> <a class="text-black" href="#">Kate Doe</a></div>
                    <div class="mi-time">yesterday</div>
                  </div>
                  <div class="m-item">
                    <div class="mi-icon bg-danger"><i class="ti-heart"></i></div>
                    <div class="mi-text"><a class="text-black" href="#">John Doe</a> <span class="text-muted">liked post</span> <a class="text-black" href="#">Lorem ipsum dolor</a></div>
                    <div class="mi-time">3 days ago</div>
                  </div>
                  <a class="dropdown-more" href="#">
                    <strong>View all notifications</strong>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown hidden-sm-down">
                <a href="#" data-toggle="dropdown" aria-expanded="false">
                  <span class="avatar box-32">
                    <img src="./assets/img/avatars/1.jpg" alt="">
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right animated fadeInUp">
                  <a class="dropdown-item" href="#">
                    <i class="ti-email mr-0-5"></i> Inbox
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="ti-user mr-0-5"></i> Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="ti-settings mr-0-5"></i> Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="ti-help mr-0-5"></i> Help</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>signin/signout"><i class="ti-power-off mr-0-5"></i> Sign out</a>
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down">
                <a class="nav-link toggle-fullscreen" href="#">
                  <i class="ti-fullscreen"></i>
                </a>
              </li>
              <li class="nav-item dropdown hidden-sm-down">
                <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="ti-layout-grid3"></i>
                </a>
                <div class="dropdown-apps dropdown-menu animated fadeInUp">
                  <div class="a-grid">
                    <div class="row row-sm">
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon"><img class="img-fluid" src="./assets/img/brands/dropbox.png" alt=""></div>
                            <div class="ai-title">Dropbox</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon"><img class="img-fluid" src="./assets/img/brands/github.png" alt=""></div>
                            <div class="ai-title">Github</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon"><img class="img-fluid" src="./assets/img/brands/wordpress.png" alt=""></div>
                            <div class="ai-title">Wordpress</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon"><img class="img-fluid" src="./assets/img/brands/gmail.png" alt=""></div>
                            <div class="ai-title">Gmail</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon"><img class="img-fluid" src="./assets/img/brands/drive.png" alt=""></div>
                            <div class="ai-title">Drive</div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="a-item">
                          <a href="#">
                            <div class="ai-icon"><img class="img-fluid" src="./assets/img/brands/dribbble.png" alt=""></div>
                            <div class="ai-title">Dribbble</div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a class="dropdown-more" href="#">
                    <strong>View all apps</strong>
                  </a>
                </div>
              </li>
            </ul>
            <div class="header-form float-md-left ml-md-2">
              <form>
                <input type="text" class="form-control b-a" placeholder="Search for...">
                <button type="submit" class="btn bg-white b-a-0">
                  <i class="ti-search"></i>
                </button>
              </form>
            </div>
          </div>
        </nav>
      </div>
<div class="site-content">