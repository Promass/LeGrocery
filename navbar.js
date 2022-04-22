var BigSearchBar = document.getElementById("big-search-bar");
var BigSearchBtn = document.getElementById("big-search-btn");
var BigSearchBtnc = document.getElementById("big-search-btn-c");
var BigSearchForm = document.getElementById("big-search-form");

var SmallSearchBar = document.getElementById("small-search-bar");
var SmallSearchBtn = document.getElementById("small-search-btn");
var SmallSearchBtnc = document.getElementById("small-search-btn-c");
var SmallSearchForm = document.getElementById("small-search-form");

var alreadyclickedbig = false;
var alreadyclickedsmall = false;

//Big Search Bar Animation Functions
function bighide() {
    bigtop = BigSearchBar.offsetTop;
    if (bigtop > 54) {
        BigSearchBar.style.top = (bigtop - 1) + "px";
        setTimeout(bighide, 1);
    }
}

function bigshow() {
    bigtop = BigSearchBar.offsetTop;
    if (bigtop < 100) {
        BigSearchBar.style.top = (bigtop + 1) + "px";
        setTimeout(bigshow, 1);
    }
}

function bigsearchclick() {
    if (!alreadyclickedbig) {
        bigshow();
        alreadyclickedbig = true;
    }
    else {
        bighide();
        alreadyclickedbig = false;
    }
}

document.addEventListener('mouseup', function () {
    if (event.target != BigSearchBtn &&
        event.target != BigSearchBtnc &&
        event.target != BigSearchBar &&
        event.target.parentNode != BigSearchBar &&
        event.target.parentNode != BigSearchForm) {
        if (alreadyclickedbig) {
            bighide();
            alreadyclickedbig = false;
        }
    }
})

//Small Search Bar Animation Functions
function smallhide() {
    smalltop = SmallSearchBar.offsetTop;
    if (smalltop > 54) {
        SmallSearchBar.style.top = (smalltop - 1) + "px";
        setTimeout(smallhide, 1);
    }
}

function smallshow() {
    smalltop = SmallSearchBar.offsetTop;
    if (smalltop < 100) {
        SmallSearchBar.style.top = (smalltop + 1) + "px";
        setTimeout(smallshow, 1);
    }
}

function smallsearchclick() {
    if (!alreadyclickedsmall) {
        smallshow();
        alreadyclickedsmall = true;
    }
    else {
        smallhide();
        alreadyclickedsmall = false;
    }
}

document.addEventListener('mouseup', function () {
    if (event.target != SmallSearchBtn &&
        event.target != SmallSearchBtnc &&
        event.target != SmallSearchBar &&
        event.target.parentNode != SmallSearchBar &&
        event.target.parentNode != SmallSearchForm) {
        if (alreadyclickedsmall) {
            smallhide();
            alreadyclickedsmall = false;
        }
    }
})

var SmallNavbar = document.getElementById('collapsibleNavbar');
var NavbarBars = document.getElementById('menu-bar');
var NavbarBarsC = document.getElementById('menu-bar-c');

document.addEventListener('mouseup', function () {
    if (event.target != SmallNavbar &&
        event.target.parentNode != SmallNavbar &&
        event.target != NavbarBars &&
        event.target != NavbarBarsC) {
        SmallNavbar.classList.remove('show')
    }
})