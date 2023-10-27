//var OneClick = document.getElementsById("#link");
//OneClick.addEventListener('click', OnOneClick, false);
document.addEventListener("DOMContentLoaded", function() {
    // Your code here
    highlightActiveLink();
});
//only highlights links with current location
function highlightActiveLink() {
    let path = window.location.pathname;
    const query = "a[href='"+path+"']";
    const links = document.querySelectorAll(query);
    if(links) {
        links.forEach(function(link) {
            link.parentElement.classList.add('active');
            // link.classList.add('active');
        })
    }
}
//highlights all links leading up to path
function highlightPathLinks(){
    let loc_href = window.location.pathname;
    //creates array with all paths leading to location also including href=""
    const paths = processPath(loc_href);

    //iterate for all paths
    paths.forEach(function(path) {
        //prepare query for all <a> elements with correct path
        const query = "a[href='"+path+"']";
        const links = document.querySelectorAll(query);
        if(links) {
            //add active class to all <a> with correct
            Array.from(links).forEach(function(link) {
                link.classList.add('active');
            })
        }
    })

}

function processPath(path) {
    const segments = path.split('/');
    const result = [];

    for (let i = 0; i < segments.length; i++) {
        //after every iteration remove the last arg
        const currentPath = segments.slice(0, i + 1).join('/');
        result.push(currentPath);
    }
    return result;
}
