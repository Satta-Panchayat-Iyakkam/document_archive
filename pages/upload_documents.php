<?php
require_once '../includes/db_config.php';
require_once '../includes/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Satta Panchayat Iyakkam</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="../plugins/jQueryUI/jquery-ui-1.11.4.custom/jquery-ui.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
	 <!-- TagsInput -->
	<link rel="stylesheet" href="../plugins/jQuery-Tags-Input/src/jquery.tagsinput.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/SPI.min.css">
    <!-- SPI Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="all_documents.php" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span
                class="logo-mini"><img src="../dist/img/spi_logo.png"/></span>
            <!-- logo for regular state and mobile devices --> <span class="logo-lg"><img
                    src="../dist/img/spi_logo.png" height="50px"/></span> </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                src="../dist/img/user2-160x160.png" class="user-image" alt="User Image"> <span
                                class="hidden-xs"><?php echo(isset($_SESSION["name"]) ? $_SESSION["name"] : ""); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="../api/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">
                    MAIN NAVIGATION
                </li>
                
                <li class="treeview">
                    <a href="#"> <i class="fa fa-file"></i> <span>Documents</span> <span
                            class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="upload_documents.php"><i class="fa fa-upload"></i> Upload</a>
                        </li>
						<li>
                            <a href="all_documents.php"><i class="fa fa-file-o"></i> Report</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Upload Documents <small></small></h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="dashboard" name="dashboard" data-parsley-validate class="form-horizontal form-label-left" method="post">
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span> </label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<textarea id="description" name="description" data-role="tagsinput" required="required" class="form-control col-md-7 col-xs-12"placeholder="Enter Comma Seperated values"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="document">Document<span class="required">*</span> </label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="file" id="document" name="document" required="required" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" id="action">
												<button type="reset" class="btn btn-primary">
													Cancel
												</button>
												<button type="submit" id="upload" class="btn btn-success">
													Submit
												</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
            
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
 <!-- TagsInput -->
<script src="../plugins/jQuery-Tags-Input/src/jquery.tagsinput.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- Jquery UI -->
<script src="../plugins/jQueryUI/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
<!-- notify -->
<script src="../plugins/notify/notify.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- SPI App -->
<script src="../dist/js/app.min.js"></script>
<!-- SPI for demo purposes -->
<!-- <script src="../dist/js/demo.js"></script> -->
<script type="text/javascript">
			$(document).ready(function() {
				$('#description').tagsInput({
					'width':'100%',
					'defaultText':'Add Comma Seperated Keywords',
					// 'delimiter': [',',';',' '],
				});
				$('#upload').click(function(e) {
					e.preventDefault();
					if ($('#document').val() !== "") {
						var file_data = $('#document').prop('files')[0];
						var form_data = new FormData();
						form_data.append('file', file_data);
						form_data.append('description', $('#description').val());
						// form_data.append('document_path', $('#document_category option:selected').data("path"));
						$.ajax({
							url : '../api/upload_document.php',
							dataType : 'text',
							cache : false,
							contentType : false,
							processData : false,
							data : form_data,
							type : 'post',
							beforeSend : function() {
								daterange = $("#description, #document_category").val();
								if (daterange === "") {
									alert("Select Category and Enter Description!");
									return false;
								}
								$('#action').hide();
								$('#loader').show();
								$("select, input, textarea").attr('disabled', 'disabled');
							},
							success : function(res) {
								console.log(res);
								var json = eval(res);
								if (json.success == true){
									window.location.reload();
								}
								alert(json.message);
								$("#action").show();
								$("#loader").hide();
								$("select, input, textarea").removeAttr('disabled', 'disabled');
								$("select, input, textarea").val('');
							},
							error : function(jqXHR, textStatus, errorThrown) {
								console.log(jqXHR);
								$("#action").show();
								$("#loader").hide();
								$("select, input, textarea").removeAttr('disabled', 'disabled');
							}
						});
					} else {
						alert("Select Correct Document To Upload!");
						return false;
					}
				});
			});
		</script>
</body>
</html>
