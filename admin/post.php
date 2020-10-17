<?php require 'inc/head.php';?>
<?php require 'inc/header.php';?>
<?php require 'inc/contact.php';?>
<?php require 'inc/functions.php';?>
	<main class="w3-block">
		<article class="w3-block">
			<div class="w3-row">
				<?php require 'inc/sidebar.php'; ?>
				<section class="w3-col s10 mysidebar w3-right">
					<?php
						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							if (isset($_POST['addpost'])) {
								$title	= filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
								$content	= filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
								$excerpt	= filter_input(INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING);
								$tags	= filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
								//file
								$imageName	= $_FILES['image']['name'];
								$imageType	= strtolower(basename($_FILES['image']['type']));
								$imageTmp_name	= $_FILES['image']['tmp_name'];
								$imageError	= $_FILES['image']['error'];
								$imageSize	= $_FILES['image']['size'];

								//VARs msg Err
								$errtitle=$errcontent=$errexcerpt=$errtags=$errfilet="";
								
								if (strlen($title) < 100 || strlen($title) > 200) {
									$errtitle = 'title.length < 100 || title.length > 200';
								}else if (strlen($content) < 500 || strlen($content) > 10000) {
									$errcontent = 'content.length < 500 || content.length > 10000';
								}else if (strlen($excerpt) !== 0) {
									if (strlen($excerpt) < 100 || strlen($excerpt) > 500) {
										$errexcerpt = 'excerpt.length < 100 || excerpt.length > 500';
									}
								}else{
									if (!empty($imageName)) {
										if ($imageType !== 'jpg' || $imageType !== 'jpeg' || $imageType !== 'png' || $imageType !== 'gif') {
											$errfilet .= 'jpg | jpeg | png | gif only';
										}else if ($imageSize > 1000000) {
											$errfilet .= 'image size =  1MB only';
										}
									}
								}

								if ($errtitle&&$errcontent&&$errexcerpt&&$errtags&&$errfilet=="") {
									// insert data in database
								}
								
							}
						}
						print_r($imageType);
					 ?>
					<div class="w3-container">
					<div class="post">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
							<div class="form-group"> 
								<input type="text" name="title" placeholder="title" class="form-control" required>
								<div class="w3-panel w3-pale-red w3-leftbar w3-border-red w3-padding-16 errtitle" style="display: none;">
									<?php echo $errtitle; ?> title.length < 50 || title.length > 100 
								</div>
							</div>
							<div class="form-group"> 
								<textarea rows="10" name="content" placeholder="content" class="form-control" required></textarea>
								<div class="w3-panel w3-pale-red w3-leftbar w3-border-red w3-padding-16 errcontent" style="display: none;">
									<?php echo $errcontent; ?> content.length < 500 || content.length > 10000 
								</div>
							</div>
							<div class="form-group"> 
								<select class="form-control">
									<?php 
										foreach (get_cat() as $result) {
											echo "<option>".$result['name']."</option>" ;
										}
									 ?>
								</select>
							</div>
							<div class="form-group"> 
								<input type="text" name="excerpt" placeholder="excerpt" class="form-control">
								<div class="w3-panel w3-pale-red w3-leftbar w3-border-red w3-padding-16 errexcerpt" style="display: none;">
									<?php echo $errexcerpt; ?> excerpt.length < 50 || excerpt.length > 100 
								</div>
							</div>
							<div class="form-group"> 
								<input type="text" name="tags" placeholder="tags" class="form-control">
								<div class="w3-panel w3-pale-red w3-leftbar w3-border-red w3-padding-16 errtags" style="display: none;">
									<?php echo $errtags; ?> excerpt.length < 50 || excerpt.length > 100 
								</div>
							</div>
							<div class="form-group"> 
								<input type="file" name="image" placeholder="image" class="form-control">
								<div class="w3-panel w3-pale-red w3-leftbar w3-border-red w3-padding-16 errfilet" style="display: none;">
									<?php echo $errfilet; ?> excerpt.length < 50 || excerpt.length > 100 
								</div>
							</div>
							
							<input type="submit" name="addpost" class="w3-button w3-btn w3-blue w3-round-large w3-right" value="submit">
						</form>
					</div>						
					</div>
				</section>
			</div>
		</article>
	</main>
<?php require 'inc/footer.php'; ?>	