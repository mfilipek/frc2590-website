<?php
/*
	Index Page
*/
include("./header.inc");
?>
	<div id="main" class="container">

		<div id="content">
			<div id ="member-container">
				<div id ="member">
					<div id ="profile"></div>
						<script>
							document.getElementById("profile").style.backgroundImage = "url('<?php echo $page->profile->url?>')";
						</script>
					<div id ="fields">
						<div id ="name" class="red"><?php echo $page->title?></div>
						<div id ="status" class="grey">
							<?php
								//output Member or Student info
								if($page->mentor){ echo "Mentor"; }
								else{ echo "Class of $page->class";}
							?>
						</div>
						<div id ="team" class="grey">
							<?php
								//Output Teams or Multiple Teams
								printTeam($page);
							?>
						</div>
							<?php 
							if($page->mentor){ 
								echo"<div id ='profession' class='grey'>$page->job</div>";
								}
							if($page->college){
								echo"<div id='profession' class='grey'>$page->college</div>";
							}
							?>
					</div>
				</div>
				<div id ="bio">
					<?php echo $page->postContent?>
				</div>
			</div><!--member-container-->
			<div id ="recentPosts">
				<h3>Recent Posts</h3>
				<ul>
					<li>Build Team Protocols</li>
					<li>The Art of Irish Cooking</li>
					<li>Science it Works</li>
					<li>Take your Stinking Paws Off Me You Dirty Ape</li>
				</ul>
			</div>			
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