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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/skins/all.css">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <!-- daterangepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.19/daterangepicker.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.css">
    <!-- DataTables Buttons -->
    <link rel="stylesheet" href="../plugins/DataTables-1.10.12/extensions/Buttons/css/buttons.bootstrap.css">
     <!-- TagsInput -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.3/jquery.tagsinput.css">
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
    <style type="text/css">
		.ui-autocomplete {
			z-index: 99999;
		}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="all_documents.php" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span
                class="logo-mini"><img src="../dist/img/spi_logo.png"/></span>
            <!-- logo for regular state and mobile devices --> <span class="logo-lg"><img
                    src="../dist/img/spi_logo.png" height="50px" /></span> </a>

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
				 <li>
					<a href="upload_documents.php"><i class="fa fa-upload"></i> Upload</a>
				</li>
				<li class="active">
					<a href="all_documents.php"><i class="fa fa-file-o"></i> Report</a>
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
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Clients Informations</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="all_docs" class="table table-bordered table-striped table-responsive">
								<thead>
									<tr>
										<th>Document</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							</div>
						</div>
					</div>

				<div class="clearfix"></div>
			</div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<div class="modal fade" id="doc_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="text-muted">
                        Update Document
                    </h4>
					<br />
					<form id="dashboard" name="dashboard" data-parsley-validate class="form-horizontal form-label-left" method="post">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="hidden" name="id" id="id" />
								<textarea id="description" name="description" data-role="tagsinput" required="required" class="form-control col-md-7 col-xs-12"placeholder="Enter Comma Seperated values"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="document">Document<span class="required">*</span> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<a href="" id="old_doc" target="_blank"></a>
								<input type="file" id="document" name="document" class="form-control col-md-7 col-xs-12">
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
    
<!-- jQuery 2.2.3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>
 <!-- TagsInput -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.3/jquery.tagsinput.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.19/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.19/daterangepicker.js"></script>
<!-- iCheck 1.0.1 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/icheck.min.js"></script>
<!-- Jquery UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
<script src="../plugins/DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.js"></script>
<script src="../plugins/DataTables-1.10.12/extensions/Buttons/js/buttons.bootstrap.js"></script>
<script src="../plugins/DataTables-1.10.12/extensions/Buttons/js/jszip.min.js"></script>
<script src="../plugins/DataTables-1.10.12/extensions/Buttons/js/pdfmake.min.js"></script>
<script src="../plugins/DataTables-1.10.12/extensions/Buttons/js/vfs_fonts.js"></script>
<script src="../plugins/DataTables-1.10.12/extensions/Buttons/js/buttons.html5.js"></script>
<script src="../plugins/DataTables-1.10.12/extensions/Buttons/js/buttons.print.js"></script>
<script src="../plugins/DataTables-1.10.12/extensions/Buttons/js/buttons.colVis.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- notify -->
<script src="../plugins/notify/notify.js"></script>
<!-- SPI App -->
<script src="../dist/js/app.min.js"></script>
<!-- SPI for demo purposes -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#all_docs").dataTable({
			"oLanguage" : {
				"sLoadingRecords" : "<img src='../dist/img/loaders/loader_12.GIF' /> Retriving Clients... Please Wait...",
				"sEmptyTable" : "No Clients Found!"
			},
			"bDestroy" : true,
			"sAjaxSource" : '../api/documents.php',
			"fnInitComplete" : function(oSettings, json) {
				$('#myModal').on('hidden.bs.modal', function(e) {
					$('#all_docs').DataTable().ajax.reload();
					location.reload();
				});
				$('#all_docs').on('click', '#delete_doc', function(e) {
					e.preventDefault();
					var doc_name = $(this).data('doc_name');
					var id = $(this).data('id');
					var checkstr = confirm('Are you sure you want to delete ' + doc_name + '?');
					if (checkstr == true) {
						$.ajax({
							type : 'POST',
							url : '../api/doc_delete.php',
							dataType : 'json',
							data : {
								id : id,
								doc_name : doc_name
							},
							beforeSend : function() {
							},
							success : function(response) {
								// console.log(response);
								try {
									if (response.success == true) {
										$.notify(response.message, "success");
										$('#all_docs').DataTable().ajax.reload();
									} else {
										$.notify(response.message, "error");
									}
								} catch (err) {
									$.notify(err.toString(), "error");
								}
							},
							error : function(jqXHR, textStatus, errorThrown) {
								// console.log("Error Occured : " + jqXHR.responseText + textStatus + " - " + errorThrown);
							}
						});
					} else {
						return false;
					}
				});
				$('#all_docs').on('click', '#edit_doc', function() {
					$.ajax({
						type : "POST",
						url : "../api/get_edit_docs.php",
						data : {
							id : $(this).data('id')
						},
						beforeSend : function() {
						},
						success : function(response) {
							console.log(response);
							if (response) {
								$('#description').val(response[0].doc_description);
								$('#id').val(response[0].id);
								$('#description').tagsInput({
									'width' : '100%'
								});
								$("#old_doc").attr("href", response[0].doc_path);
								$("#old_doc").text(response[0].doc_path.substr(response[0].doc_path.lastIndexOf("/") + 1));
								$('#doc_update').modal();
							}
						},
						error : function(jqXHR, textStatus, errorThrown) {
							// console.log("Error Occured : " + textStatus + " - " + errorThrown + jqXHR.responseText);
						}
					});
				});
			}
		});
		$('#upload').click(function(e) {
			e.preventDefault();
			var file_data = $('#document').prop('files')[0];
			var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('description', $('#description').val());
			form_data.append('id', $('#id').val());
			// form_data.append('document_path', $('#document_category option:selected').data("path"));
			$.ajax({
				url : '../api/doc_edit.php',
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
					var json = JSON.parse(res);
					if (json.success == true) {
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
		});
	});
</script>
</body>
</html>
