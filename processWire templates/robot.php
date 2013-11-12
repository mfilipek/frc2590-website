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
				<div id="stats-container">
					<div id="robotImg" name="profile"><?php echo $page->profile->url; ?></div>
					<div id="stats">
						<h3>Stats</h3>
							<table border="0">
								<tr><th>Record</th><td><?php echo $page->record; ?></td>  </tr>
								<tr><th>Drive Team</th>
									<td><?php 
											for($i=0; $i < sizeof($page->driveTeam); $i++){
												$driver = $page->driveTeam[$i];
												echo "<a href='".$driver->url."'>".$driver->title."</a>";
												if($i < sizeof($page->driveTeam)-1){
													echo ", ";
												}
											}
										?>
									</td> 
								</tr>
								<tr><th>Awards</th><td></td>  </tr>
							</table>
					</div>
				</div>
				<div id="desc-container">
					<div id="desc">
						<div id="about">
							<?php /*Display post content with a readMore or
									link to attatched blog post*/
								if($page->aboutPointer){
									echo ($page->aboutPointer->postContent);
								}else{
									echo ($page->postContent);
								}
							?>
						</div>
						<div class="readMore">
							<a href="<?php if($page->aboutPointer){echo $page->aboutPointer->url;} ?>">...Continue Reading</a>
						</div>
					<div id="title"><h1 class="red">The Challenge</h1></div>
					<h3 class="grey"><?php echo $page->challengeName; ?></h3>
					<p><?php echo $page->challenge; ?></p>
					</div>
				</div>

				<div id="extras">
					<div class="extra" id="spacer">
						<div class="label" id="robot-label">Articles</div>
					</div>
					<div class="extra" id="spacer">
						<div class="label" id="robot-label"></div>
					</div>
					<div class="extra">
						<div class="label" id="robot-label">Record</div>
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