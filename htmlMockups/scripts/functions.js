
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

/*Is Overflowed
 *
 * takes a DOM element and returns a boolean if the element has an overflow value
 * element must have a fixed height for this to work.
 */
 
function isOverflowed(element){
    return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
}
