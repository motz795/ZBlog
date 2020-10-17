<?php 
	$ZBloglink=$ZBlogcharset ="";
	$ZBloglink = mysqli_connect('localhost', 'root', '', 'ZBlog') or die('KO CON');
	$ZBlogcharset  = 'utf-8';
	mysqli_set_charset( $ZBloglink , $ZBlogcharset);
	//echo "ok";
?>