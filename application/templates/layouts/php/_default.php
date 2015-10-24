<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/layouts/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/common/jquery.js"></script>
</head>
<body>
	<div id="wrapper">
		<ul id="navigation">
			<li><a href="/">Домой</a></li>
			<li><a href="/gallery/">Галерея</a></li>
			<li><a href="/catalog/">Каталог</a></li>
			<li><a href="/about/">Информация</a></li>
		</ul>
		<div id="content">
<?php echo $this->Data['content']?>
            <div id="footer">
				<img src="/i/layouts/main/footer.jpg" alt="" />
			</div>
		</div>
	</div>
</body>
</html>