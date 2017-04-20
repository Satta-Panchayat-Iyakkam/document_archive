<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Satta Panchayat Iyakkam | Log in</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="dist/css/SPI.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/skins/square/blue.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.login-page {
				/*background-image:url(dist/img/Amazing-Money.jpg);*/
				background-color:#eee;
				background-repeat:no-repeat;
				background-position:center;
				background-size:cover;
				width:100%;
				height:100%;
			}
			header{
				background-color:#565656;
				height:70px;
			}
			.logo-left{
				width:20%;
				float:left;
				border-right: 2px solid #fff;
			}
			.menu-right{
				width:80%;
				float:left;
			}
			.menu-right ul li{
				list-style-type: none;
				display:inline-block;
				font-size: 20px;
    padding: 2%;
    color: #fff;
    font-weight: 800;
			}
			.head-h{
				    color: #cc0000;
			}
			p{
				text-align: justify;
				font-size:17px;
			}
			.login-box-body{
				background:none;
			}
			.login-box-msg{font-size:20px;    color: #cc0000;font-weight: 800;			}
			.search_box {
				width: 70%;
				margin: 0 auto;
				margin-top: 10%;
			}
			.logo {
				color : #fff;
			}
			.logo img{
				height: 70px;
			}
			#bottom-div {
				z-index:999;
				position:absolute;
				
				background:#eee;
				padding:10px;
				border:1px solid #ccc;
			}

		</style>
	</head>
	<body class="hold-transition login-page">
		<header class="main-header">
        <!-- Logo -->
        <a href="www.sattapanchayat.org" class="logo" style="width: 50%; float: left;">
            <!-- logo for regular state and mobile devices --> <span class="logo-lg"><img
                    src="dist/img/spi_logo.png" class="img-responsive"/>Satta Panchayat Iyakkam</span> </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                src="dist/img/login.png" class="user-image-login" alt="User Image"> <span
                                class="hidden-xs"><?php echo(isset($_SESSION["name"]) ? $_SESSION["name"] : ""); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="login-box-body" >
				<p id="message" style="text-align: center"></p>
				<form id="login" action="api/login.php" method="post">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" name="username" id="Username" required="required" placeholder="Username">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" name="password" id="Password" required="required" placeholder="Password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8"></div>
						<!-- /.col -->
						<div class="col-xs-4" id="action">
							<button type="submit" class="btn btn-primary btn-block btn-flat">
								Sign In
							</button>
						</div>
						<div class="col-xs-4" id="loader" style="display: none;">
							<img src="dist/img/loaders/loader_blue.GIF" />
						</div>
						<!-- /.col -->
					</div>
				</form>
				<hr />
				<!-- /.social-auth-links -->

				<!-- <a href="forgot_password.php" style="color: #cc0000;font-size: 17px; font-weight: 700;">I FORGOT MY PASSWORD</a> -->
				<br>

			</div>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
		
<div class="row">
        <div class="search_box">
		
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" id="search_input" placeholder="Search..." />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
			<div id="custom-search-results" style="display: none;"></div>
        </div>
	</div>
	
		<!-- jQuery 2.2.3 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#login").submit(function(e) {
					e.preventDefault();
					$.ajax({
						url : "api/login.php",
						type : "post",
						data : $("#login").serialize(),
						dataType : "json",
						beforeSend : function() {
							// console.log($("#login").serialize());
							$("#action").hide();
							$("#loader").show();
						},
						success : function(response) {
							if (response.success == false) {
								$("#message").html(response.message).css("color","red");
								$("#message").show();
							} else {
								$("#message").html('<img src="dist/img/loaders/loader_25.GIF" />&nbsp;<span id="msg">'+response.message+'</span>').css("color","#000");
								$("#message").show();
								setTimeout(function() {
									window.location = "pages/all_documents.php";
								}, 2000);
							}
							$("#action").show();
							$("#loader").hide();
						},
						error : function(jqXHR, errorThrown, errorStatus) {
							console.log(jqXHR.responseText);
							$("#action").show();
							$("#loader").hide();
						}
					});
				});
				
				$("#search_input").keyup(function(e) {
					e.preventDefault();
					var q=$(this).val();
					if(q.length >= 3) {
					$.ajax({
						url : "api/search_results.php",
						type : "post",
						data : {q: q},
						dataType : "json",
						beforeSend : function() {
							console.log(q);
							// $("#action").hide();
							// $("#loader").show();
						},
						success : function(response) {
							if (response.success == false) {
								$("#custom-search-results").html(response.message).css("color","red");
								$("#custom-search-results").show();
							} else {
								$("#custom-search-results").html(response.results).css("color","#000");
								$("#custom-search-results table").css("width",$("#custom-search-input").width());
								$("#custom-search-results").show();
							}
							// $("#action").show();
							// $("#loader").hide();
						},
						error : function(jqXHR, errorThrown, errorStatus) {
							console.log(jqXHR.responseText);
							// $("#action").show();
							// $("#loader").hide();
							$("#custom-search-results").hide();
						}
					});
					}else{
						$("#custom-search-results").hide();
					}
				});
			});
		</script>
	</body>
</html>
