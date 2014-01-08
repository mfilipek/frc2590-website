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
								<tr><th>MAR Rank</th><td><?php if($page->marRank){echo $page->marRank; } else{ echo "N/A";}?></td>  </tr>
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
								<tr><th>Awards</th>
									<td><?php
										if($page->awards){
											$awards = explode(", ", $page->awards);
											foreach($awards as $award){
												echo "<p>".$award."</p>";
											}
										}
									?>
									</td>  
								</tr>
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
							<?php
								if($page->aboutPointer){
									echo "<a href='".$page->aboutPointer->url."'>...Continue Reading</a>";
								}
								else{
									echo"<script>
										var about = document.getElementById(\"about\");
										about.style.height = about.scrollHeight+'px';
										</script>";
								}
							?>
						</div>
					<div id="title"><h1 class="red">The Challenge</h1></div>
					<h3 class="grey"><?php echo $page->challengeName; ?></h3>
					<p><?php echo $page->challenge; ?></p>
					</div>
				</div>
				<?php
					if( ($page->sliderImage) != null){
						echo "<div id='flexslider-container'> <div class='flexslider'><ul class='slides'>";
							foreach($page->sliderImage as $i){
								echo "<li><img src='".($i->url)."'/></li>";
							}
						echo "</ul></div></div>";
					}
				?>

				<div id="barR"> </div>
				
				<div id="tumblr">
					<?php 
					/*Retrieve latest post from the tumblr*/
						$request_url = "http://frc2590.tumblr.com/api/read?start=0&type=photo&tagged={$page->title}";
						$xml = simplexml_load_file($request_url);
						foreach($xml->posts->post as $post){
							$title = $post->{'photo-caption'};
							$postURL = $post['url'];
							$photoURL = $post->{'photo-url'};
							echo"<div class='tumblr'>
									<a href='".$postURL."'>
										<div id='tumblrImg' class='bgReplace' name='tumblrImg'>{$photoURL}</div>
									</a>
								 ";
							if($title != ""){
								//description in a normal field block
								echo "<div id='fields'><a href='{$postURL}'>".$title."</a></div>";
								//description on a red transparency
								/*echo "<div id='tumblr-desc'><a class='white' href='{$postURL}'>
										".$title."
									  </a></div>";*/
							}
							echo"</div>";
						}
					?>
					</div>
				
				
			</div><!--robot container -->
		<script>
			cssBackground("profile");
			cssBackground("tumblrImg");
		</script>
				
		</div><!--content-->
		
		<aside id="sidebar">
			
			<!-- include sidebar from template file-->
			<?php include("./sidebarNav.inc"); ?>

			<img src="<?php echo $config->urls->templates?>images/div2.jpg">
			<section>
				<h3 class='grey'> Recent Articles about <?php echo $page->title ?> </h3>
				<div id="articles">
					<?php
						/*find all blog posts that mention Athena*/
						$selector = "parent=/blog/, limit=10, tags*=".$page->title;
						$matches = $pages->find($selector);
						echo "<ul>";
						foreach($matches as $match){
							echo "<li><a href='".$match->url."'>".$match->title."</a></li>";
						}
						echo "</ul>";
					?>
				</div>
			</section>
			
		</aside> <!-- sidebar -->
		
	</div> <!--container-->
<?php
include("./footer.inc");
?>