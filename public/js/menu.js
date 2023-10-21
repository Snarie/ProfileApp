var mini = true;

window.addEventListener("resize", function() {
	console.log("resize event "+window.innerWidth);
});

function toggleSidebar() {
	if (mini) {
		// console.log("opening sidebar");
		// document.getElementById("mySidebar").style.width = "250px";
		// document.getElementById("myMain").style.marginLeft = "165px";
		// document.getElementsByTagName("sidebar")[0].style.width = "250px";
		// document.getElementsByTagName("main")[0].style.marginLeft = "165px";
		if (window.innerWidth > 769) {
			document.body.style.gridTemplateColumns = "250px 1fr"; // 250px sidebar, 1fr main
		}
		this.mini = false;
	} else {
		// console.log("closing sidebar");
		// document.getElementById("mySidebar").style.width = "85px";
		// document.getElementById("myMain").style.marginLeft = "0px";
		// document.getElementsByTagName("sidebar")[0].style.width = "85px";
		// document.getElementsByTagName("main")[0].style.marginLeft = "0px";
		document.body.style.gridTemplateColumns = ""; // reset to default
		this.mini = true;
	}
}
