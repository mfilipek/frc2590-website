<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">		
			<div id ="robot-container">
				<div id="robot-header">
					<div id="barR"></div>
					<div id="title"><h1 class="red"><?php echo $page->title; ?></h1></div><div id="year"><h1 class="red"><?php echo $page->year; ?></h1></div>
				</div>
				<div>
					<div id="robotImg" name="profile"><?php echo $page->profile->url; ?></div>
					<div id="desc-container">
						<div id="desc">
							<?php echo $page->postContent; ?>
						<div id="title"><h1 class="red">The Challenge</h1></div>
						<h3 class="grey"><?php echo $page->challengeName; ?></h3>
						<p><?php echo $page->challenge; ?></p>
						</div>
					</div>
				</div>
				<div id="extras">
					<div class="extra" id="spacer">
						<div class="label" id="robot-label"></div>
					</div>
					<div class="extra" id="spacer">
						<div class="label" id="robot-label"></div>
					</div>
					<div class="extra">
						<div class="label" id="robot-label"></div>
					</div>
				</div>
			</div>
		<script>
			cssBackground("profile");
		</script>
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			<section>
			</section>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>