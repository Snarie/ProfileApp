window.addEventListener('load', hideOverflowing);
window.addEventListener('resize', hideOverflowing);

// function navElementWidth() {
//     const menus = document.querySelectorAll('.menu');
//     const menuWidths = [];
//     let i = 0;
//     menus.forEach( menu => {
//         i++;
//         const links = menu.querySelectorAll('.navbar > li');
//         let usedWidth = 0;
//         for(const link of links) {
//             usedWidth += link.offsetWidth;
//         }
//         const menuWidths[i]
//     })
// }
function hideOverflowing() {
    const menus = document.querySelectorAll('.menu');
    menus.forEach(menu => {
        const menuWidth = menu.offsetWidth;
        let usedWidth = 0;
        const links = menu.querySelectorAll('.navbar > li');
        for(const link of links) {
            usedWidth += link.offsetWidth;
        }
        const subLinks = menu.querySelectorAll('.menu-left > li:not(:first-child)')
        const hide = (usedWidth > menuWidth);
        for(const subLink of subLinks) {
            if(hide){
                subLink.style.display = 'none';
            } else {
                subLink.style.display = 'flex';
            }
        }

    })

}
document.addEventListener("DOMContentLoaded", function() {
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
