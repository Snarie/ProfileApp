window.onload = function() {
	const menu = document.querySelector('header > .menu');
	if(window.innerWidth > 1100) {
		menu.style.display = 'block';
	} else {
		menu.style.display = 'none';
	}
};
window.addEventListener("resize", function() {
	console.log("resize event "+window.innerWidth);
	const menu = document.querySelector('header > .menu');
	if(window.innerWidth > 1100) {
		menu.style.display = 'block';
	} else {
		menu.style.display = 'none';
	}
});

function displayLinks() {
	const menu = document.querySelector('header > .menu');
	if(menu.style.display === 'none' || getComputedStyle(menu).display === 'none' ) {
		menu.style.display = 'block';
	} else {
		menu.style.display = 'none';
	}
}