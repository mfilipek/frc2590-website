<?php
/*
	Members Page
*/
include("./header.inc");
?>
	<div id="main" class="container">
		<div id="content">	
			<div id="members-container">
				<div id="post-header"><h2 class="red"> Members</h2></div>
				<?php
				/*Pull all member pages with a graduation year within four years
				  of the current year*/
				$curMembers;
				
				$year = intval(date("Y"));
				$curMonth = intval(date("m"));
				if($curMonth >= 8){
					$curMembers = $pages->find("parent=/members/, mentor=0, class>$year, sort=class, sort=lastName");
				}
				else{
					$curMembers = $pages->find("parent=/members/, mentor=0, class>=$year, sort=class, sort=lastName");
				}
				foreach($curMembers as $member){
						echo "<div class='person'>";
						echo "<a href='$member->url' title='$member->shortBio' class='bio'><span title='More'><div id='profile' name='profile'>";
						echo $member->profile->url;
						echo "</div></span></a><div id='fields'>";
						echo "<a href='$member->url'><h3>$member->title</h3></a>";
						echo "<div id='status'>";
						printStatus($member);
						echo "</div><div id='team'>";
						printTeam($member);
						echo "</div></div></div>";
					}
				?>
				<div id="post-header"><h2 class="red"> Mentors</h2></div>
				<?php
				/*Pull all member pages with the Mentor flag flipped*/
					$mentors = $pages->find("mentor=1, sort=class");
					foreach($mentors as $mentor){
						echo "<div class='person'>";
						echo "<a href='$mentor->url' title='$mentor->shortBio' class='bio'><span title='More'><div id='profile' name='profile'>";
						echo $mentor->profile->url;
						echo "</div></span></a><div id='fields'>";
						echo "<a href='$mentor->url'><h3>$mentor->title</h3></a>";
						echo "<div id='status'>";
						printStatus($mentor);
						echo "</div><div id='team'>";
						printTeam($mentor);
						echo "</div>";
						if(($mentor->job)!=null){echo "<div id='profession'>$mentor->job</div>";}
						echo "</div></div>";
					}
				?>
				<div id="post-header"><h2 class="red"> Alumni </h2></div>
				<?php
				/*Pull all member pages with a graduation year greater than the cur year */
				$alumni;
				
				$year = intval(date("Y"));
				$curMonth = intval(date("m"));
				if($curMonth >= 8){
					$alumni = $pages->find("parent=/members/, mentor=0, class<=$year, sort=-class, sort=lastName");
				}
				else{
					$alumni = $pages->find("parent=/members/, mentor=0, class<$year, sort=-class, sort=lastName");
				}
				foreach($alumni as $member){
						echo "<div class='person'>";
						echo "<a href='$member->url' title='$member->shortBio' class='bio'><span title='More'><div id='profile' name='profile'>";
						echo $member->profile->url;
						echo "</div></span></a><div id='fields'>";
						echo "<a href='$member->url'><h3>$member->title</h3></a>";
						echo "<div id='status'>";
						printStatus($member);
						echo "</div><div id='team'>";
						printTeam($member);
						echo "</div><div id='profession'>";
						if($member->college!=null){echo $member->college; echo "</br>";}
						if($member->job!=null){echo $member->job;}
						echo "</div></div></div>";
					}
				?>
			</div><!--members-container-->
			
			<script>
			/*Script that replaces the php generated URL in the "profile" div with
			  a background-image css attribute and erases the URL*/
				var profileImages = document.getElementsByName("profile");
				for( var i=0; i<profileImages.length; i++){
					var url = "url('";
					url = url.concat(profileImages[i].innerHTML);
					url = url.concat("')");
					profileImages[i].style.backgroundImage = url;
					profileImages[i].innerHTML="";
				}
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