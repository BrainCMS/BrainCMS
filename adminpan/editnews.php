<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	admin::CheckRank(8);
?>
<script src="<?= $config['hotelUrl'];?>/adminpan/js/ckeditor/ckeditor.js"></script>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Edit News Article <b><?php echo admin::EditNews("title"); ?></b>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<?php admin::EditNews("id"); 
							admin::UpdateNews();?>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">News ID</label>
								<div class="col-sm-10">
									<?php echo admin::EditNews("id"); ?>
									<input type="hidden" name="id" value="<?php echo admin::EditNews("id"); ?>">
								</div>
							</div><br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Titel</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditNews("title"); ?>" name="title" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Shortstory</label>
								<div class="col-sm-10">
									<input type="text"  value="<?php echo admin::EditNews("shortstory"); ?>" name="shortstory" class="form-control">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Image</label>
								<div class="col-sm-10">
									<?php
										echo '<select onChange="showimage()" class="form-control" name="topstory" style="    width: 100%;font-size: 14px;"
										<option name="topstory" data-image="' . admin::EditNews("image") . '" value="' . admin::EditNews("image") . '"><option name="topstory" data-image="' . admin::EditNews("image") . '" value="' . admin::EditNews("image") . '">' . admin::EditNews("image") . '</option>
										';
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
									<div class="imagebox">
										<p style="    margin: 0px;"href="javascript:linkrotate(document.mygallery.topstory.selectedIndex)" ><img style="border-radius: 6px;"src="<?php echo admin::EditNews("image"); ?>" name="topstory" border=0>
										</div></p>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">News Articles</label>
								<div class="col-sm-10">
								<textarea id="editor1" name="longstory"  rows="15" cols="80"><?php echo admin::EditNews("longstory"); ?></textarea></div>
							</div>
							<br><br>
							<button style="    margin-top: 10px;width: 140px;float: right;margin-right: 14px;" name="update" type="submit" class="btn btn-success">Save the Article</button>
						</div>
					</section>
				</div>
			</form>
		</div>
		<?php
			include_once "includes/footer.php";
			include_once "includes/script.php";
		?>									
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
		<script>
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			CKEDITOR.replace( 'editor1' );
		</script>		