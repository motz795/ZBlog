<?php 
	function get_cat()
	{
		require 'inc/contact.php';
		$sql = "SELECT * FROM category";
		try{
			$result = $ZBloglink->query($sql);
			return $result;
		}catch(Exception $e){
			echo 'Error:' .$e->getMessage();
		}
		
	}
 ?>