<?php
include('server_log.php');
include('server_admin.php');
// 현재 로그인한 회원이 있으면
if(isset($_SESSION['email'])){
	$guestUser = false;
	header('location: index.php'); //메인페이지로 이동
	if($_SESSION['email']==$admin){
		$adminUser = true;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Sports brands, Sports fashion, Sports team">
		<meta name="author" content="Jeong-Hun Kim">
		<title>SFI - Login page</title>
		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom fonts for this template -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
		<!-- Custom styles for this template -->
		<link href="css/agency.min.css" rel="stylesheet">

<!-- 다운받은 부트스트랩이 아닌 다른 예제에서 따온 화면의 스타일이다.
로그인/ 회원가입화면에 사용되었다.
 -->
		<style>
.error {
	width: 92%;
	margin: 0px;
	color: #a94442;
	background: #f2dede;
	border-radius: 5px;
	text-align: center;
}
.confirm {
	width: 92%;
	margin: 0px;
	color: #172753;
	background: #7c8ec3;
	border-radius: 5px;
	text-align: center;
}

		@import url('https://fonts.googleapis.com/css?family=Mukta');
		body{
			font-family: 'Mukta', sans-serif;
			height:100vh;
			min-height:550px;
			background-image:url(img/login-bg.jpg);
			background-repeat: no-repeat;
			background-size:cover;
			background-position:center;
			position:relative;
			overflow-y: hidden;
		}
		a{
			text-decoration:none;
			color:#444444;
		}
		.login-reg-panel{
			position: relative;
			top: 50%;
			transform: translateY(-50%);
			text-align:center;
			width:70%;
			right:0;left:0;
			margin:auto;
			height:400px;
			background-color: rgba(30,30,30, 0.9);
		}
		.white-panel{
			background-color: rgba(255,255, 255, 1);
			height:500px;
			position:absolute;
			top:-50px;
			width:50%;
			right:calc(50% - 50px);
			transition:.3s ease-in-out;
			z-index:0;
		}
		.login-reg-panel input[type="radio"]{
			position:relative;
			display:none;
		}
		.login-reg-panel{
			color:#B8B8B8;
		}
		.login-reg-panel #label-login,
		.login-reg-panel #label-register{
		border:1px solid #9E9E9E;
		padding:0 5px;
		width:150px;
		display:block;
		text-align:center;
		border-radius:3px;
		cursor:pointer;
}
.login-info-box{
	width:30%;
	padding:0 50px;
	top:20%;
	left:0;
	position:absolute;
	text-align:left;
}
.register-info-box{
	width:30%;
	padding:0 50px;
	top:20%;
	right:0;
	position:absolute;
	text-align:left;

}
.right-log{right:50px !important;}

.login-show,
.register-show{
	z-index: 1;
	display:none;
	opacity:0;
	transition:0.3s ease-in-out;
	color:#242424;
	text-align:left;
	padding:50px;
}
.show-log-panel{
	display:block;
	opacity:0.9;
}
.login-show input[type="text"],
.login-show input[type="password"],
.register-show input[type="email"]{
	width: 100%;
	display: block;
	margin:20px 0;
	padding: 10px;
	border: 1px solid #b5b5b5;
	outline: none;
}
.login-show input[type="submit"] {
	max-width: 150px;
	width: 100%;
	background: #444444;
	color: #f9f9f9;
	border: none;
	padding: 10px;
	text-transform: uppercase;
	border-radius: 2px;
	float:right;
	cursor:pointer;
}
.login-show a{
	display:inline-block;
	padding:10px 0;
}

.register-show input[type="text"],
.register-show input[type="password"],
.register-show input[type="email"]{
	width: 100%;
	display: block;
	margin:20px 0;
	padding: 10px;
	border: 1px solid #b5b5b5;
	outline: none;
}
.register-show input[type="submit"] {
	max-width: 150px;
	width: 100%;
	background: #444444;
	color: #f9f9f9;
	border: none;
	padding: 10px;
	text-transform: uppercase;
	border-radius: 2px;
	float:right;
	cursor:pointer;
}
.credit {
	position:absolute;
	bottom:10px;
	left:10px;
	color: #3B3B25;
	margin: 0;
	padding: 0;
	font-family: Arial,sans-serif;
	text-transform: uppercase;
	font-size: 12px;
	font-weight: bold;
	letter-spacing: 1px;
	z-index: 99;
}
a{
	text-decoration:none;
	color:#eaeaea;
}
</style>
</head>
<body>
<!-- Navigation 메뉴항목4  -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger">Sports Fashion Item</a>
		</div>
	</nav>

	<div class="login-reg-panel">
	<div class="register-info-box">
		<h3>비회원이십니까?</h3>
		<p>회원가입 하여 <br> SFI에 방문해보세요!</p>
		<p><a href="index.php">Guest로 입장</a></p>
		<a href="register.php">회원가입</a>
		<input type="radio" name="active-log-panel" id="log-login-show">
	</div>
	<div class="white-panel">
	<form action="login.php" method="post">
			<div class="login-show">
			<h2>LOGIN</h2>
			<?php include('errors.php');?>
			<input type="text" placeholder="Email" name="email" required
			value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];}?>">

			<input type="password" placeholder="Password" name="password" required>
			<input type="submit" value="Login" name="login">

			<div class="form-group">
			<input type="checkbox" name="remember_id" checked="checked">
			<label for="remember-me">아이디저장</label><br>
						<!--<a href="">비밀번호찾기</a>-->
			</div>
		</div>
	</form>
	</div>
	</div>
<script>
$(document).ready(function(){
	$('.white-panel').addClass('right-log');
	$('.register-info-box').fadeIn();
	$('.login-info-box').fadeOut();
	$('.white-panel').removeClass('right-log');
	$('.login-show').addClass('show-log-panel');
	$('.register-show').removeClass('show-log-panel');
});
/* 	$('.login-reg-panel input[type="radio"]').on('change', function() {
		if($('#log-login-show').is(':checked')) {
			$('.register-info-box').fadeOut();
			$('.login-info-box').fadeIn();

			$('.white-panel').addClass('right-log');
			$('.register-show').addClass('show-log-panel');
			$('.login-show').removeClass('show-log-panel');

		}
		else if($('#log-reg-show').is(':checked')) {
			$('.register-info-box').fadeIn();
			$('.login-info-box').fadeOut();

			$('.white-panel').removeClass('right-log');

			$('.login-show').addClass('show-log-panel');
			$('.register-show').removeClass('show-log-panel');
		}
	}); */
		</script>
</body>
</html>
