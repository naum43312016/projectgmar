<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style type="text/css">
		body{
			background-image: url("<?php ROOT ?>/views/error/222.jpg");
			background-repeat: no-repeat;
			margin-top: 100px;
			width: 100%;

		}
		p{
			margin-top: 0.2em; /* Отступ сверху */
    		margin-bottom: -0.2em;
		}
		.back{
			position: fixed;
			left: 800px;
			z-index: 1;
		}
		.im{
			position: fixed;
			left: 745px;
		}
	</style>
	
</head>
<body>

<div class="back" style="width: 500px;height: 200px;margin: 0 auto;">
<br><br>
	<p style="font-weight: bold;font-size: 60px;">404 oops!</p>
	<p style="font-weight: bold;font-size: 45px; ">העמוד שחיפשת לא נמצא</p>
	<p style="font-size: 35px;"">תוכל לחזור ל<a href="/">עמוד הביתי</a></p>
</div>
<div class="im" style="width: 500px;height: 200px;margin: 0 auto;">
	<img src="<?php ROOT ?>/views/error/2.png" alt="alt" width="500px;">

</div>

</body>
</html>