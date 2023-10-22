//var OneClick = document.getElementsById("#link");
//OneClick.addEventListener('click', OnOneClick, false);

function highlightActiveLink(url){


    let loc_href = document.URL;
    loc_href = loc_href.endsWith('/') ? loc_href.substring(0, loc_href.length - 1) : loc_href;
    loc_href = loc_href.replace("http://"+window.location.host, "");
    //check if href is empty if so it is main page
    if(loc_href.length === 0) {
        let element = document.getElementById('/');
        element.classList.add('active');
        return;
    }
    //call function and add active to elements
    const paths = processPath(loc_href);

    console.log(paths);

}

function processPath(path) {
    const segments = path.split('/');
    const result = [];

    for (let i = 0; i < segments.length; i++) {
        //after every iteration remove the last arg
        const currentPath = segments.slice(0, i + 1).join('/');
        result.push(currentPath);
        if(currentPath === ""){
            continue;
        }

        //query searching for a correct href
        const query = "a[href='"+currentPath+"']";
        const links = document.querySelectorAll(query);
        if(links){
            Array.from(links).forEach(function(link) {
                link.classList.add('active');
            })
        }
        //execute query and add active class to results parentElement
        // document.querySelector(query).classList.add('active');
    }
    return result;
}