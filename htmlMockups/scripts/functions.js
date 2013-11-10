
/*CSS Background
 *
 *takes url stored in html of div and makes it the background image
 */
function cssBackground(divName){
	var images = document.getElementsByName(divName);
	for( var i=0; i<images.length; i++){
		var url = "url('";
		url = url.concat(images[i].innerHTML);
		url = url.concat("')");
		images[i].style.backgroundImage = url;
		images[i].innerHTML="";
	}
}
