<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	admin::CheckRank(6);
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Create a News Article<br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::PostNews(); ?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" value="<?php echo $_SESSION['title']; ?>" name="title"class="form-control">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Short Story</label>
								<div class="col-sm-10">
									<input type="text" value="<?php echo $_SESSION['slogan']; ?>" name="slogan"class="form-control">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Image</label>
								<div class="col-sm-10">
									<?php
										echo '<select onChange="showimage()" class="form-control" name="topstory" style="    width: 100%;font-size: 14px;"';
										if ($handle = opendir(''.$_SERVER['DOCUMENT_ROOT'].'/adminpan/img/newsimages'))
										{	
											while (false !== ($file = readdir($handle)))
											{
												echo'';
												if ($file == '.' || $file == '..')
												{
													continue;
												}	
												echo '<option name="topstory" data-image="'.$config['hotelUrl'].'/adminpan/img/newsimages/' . $file . '" value="'.$config['hotelUrl'].'/adminpan/img/newsimages/' . $file . '"';
												if (isset($_POST['topstory']) && $_POST['topstory'] == $file)
												{
													echo ' selected';
												}
												echo '>' . $file . '</option>';
											}
										}
										echo '</select>';
									?>
									<br>
									<style>
										.imagebox {
										width: auto;
										background-repeat: repeat-y;
										border-radius: 6px;
										float: left;
										margin-right: 0.72pc;
										margin-bottom: 10px;
										webkit-box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
										-moz-box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
										box-shadow: 0 3px rgba(0,0,0,.17),inset 0px 0px 0px 1px rgba(0,0,0,0.31),inset 0 0 0 2px rgba(255,255,255,0.44)!important;
										}
									</style>
									<div class="imagebox">
										<img style="border-radius: 6px;"src="<?= $config['hotelUrl'];?>/adminpan/img/newsimages/choose.gif" name="topstory" border=0>
									</div>
									<br><br>
								</div>
							</div>
							<br><br>
							<script src="<?= $config['hotelUrl'];?>/adminpan/js/ckeditor/ckeditor.js"></script>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Long Story</label>
								<div class="col-sm-10">
									<textarea id="editor1" name="news"  rows="15" cols="80"><?php echo $_SESSION['news']; ?></textarea>
								</div>
							</div><br><br>
							<button style="width: 130px;
							float: right;
							margin-right: 14px;" name="postnews" type="submit" class="btn btn-success">Post the Article</button>
						</div>
					</section>
				</div>
			</form>
		</header>
		<?php
			if (User::userData('rank') > '6')
			{
			?>
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						All Existing News Articles<br>
						<div class="panel-body">
							<?php admin::DeleteNews(); ?>
							<table class="table table-striped table-bordered table-condensed">
								<tbody>
									<?php
									
									
									
									$getArticles = $dbh->prepare("SELECT * FROM cms_news ORDER BY id DESC");
									$getArticles->execute();
										
										while($news = $getArticles->fetch())
										{
											echo'<tr>
											<td>'.$news["id"].'</td>
											<td>'.$news["title"].'</td>
											<td>'.$news["shortstory"].'</td>
											<td>'.$news["author"].'</td>
											<td>'. date('d-m-Y', $news['date']).'</td>
											<td><center><a href="'.$config['hotelUrl'].'/adminpan/news/edit/'.$news["id"].'"><i  style="padding-top: 5px; color:green;" class="fa fa-edit"></i></a></td>
											<td><a href='.$config['hotelUrl'].'/adminpan/news/delete/'.$news["id"].'><i style="padding-top: 4px; color:red;" class="fa fa-trash"></i></center></a></td>
											</tr>';
										}
									?>
									
									
									
									
								</tbody>
							</table>
						</div>
						<?php
						}
						else{
						?>
						<?php
						}
					?>
				</div>
			</div>
			<script>
				// Replace the <textarea id="editor1"> with a CKEditor
				// instance, using default configuration.
				CKEDITOR.replace( 'editor1' );
			</script>
			<?php
				include_once "includes/footer.php";
				include_once "includes/script.php";
			?>							