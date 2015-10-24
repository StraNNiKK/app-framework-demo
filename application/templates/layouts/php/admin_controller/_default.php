<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo isset($this->Data['title']) ? $this->Data['title'] : 'Секция администратора' ?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="robots" content="noindex,nofollow" />
<link href="/css/layouts/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="wrap">
		<div id="header">
			<h1>Admin Section</h1>
			<p>
				<strong>Заголовок</strong>
			</p>
		</div>
		<div id="leftside">
		<?php echo $this->adminMenu()?>
	</div>
		<div id="contentwide">
			breadcrumb .. breadcrumb .. breadcrumb<br />
			<br />
	<?php echo $this->Data['content']?>
	</div>
		<div id="footer">
			<p>
				<span>&copy; 2010 <a href="/">test</a></span>
			</p>
		</div>
	</div>
</body>
</html>