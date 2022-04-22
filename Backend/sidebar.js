var alreadyopen = false;
var firsttime = true;

function toggle() {

    if (screen.width > 992){
        if (firsttime) {
            document.getElementById("sidebar").style.width = "250px";
            document.getElementById("wrapper").style.marginLeft = "250px";
            firsttime = false;
            alreadyopen = true;
        }
        else {
            if (!alreadyopen) {
                document.getElementById("sidebar").style.width = "250px";
                document.getElementById("wrapper").style.marginLeft = "250px";
                alreadyopen = true;
            }
            else {
                document.getElementById("sidebar").style.width = "0px";
                document.getElementById("wrapper").style.marginLeft = "0px";
                alreadyopen = false;
            }
        }
    }

    if (screen.width <= 992) {
        if (firsttime) {
            document.getElementById("sidebar").style.width = "0px";
            document.getElementById("wrapper").style.marginLeft = "0px";
            firsttime = false;
            alreadyopen = false;
        }
        else{
            if (!alreadyopen) {
                document.getElementById("sidebar").style.width = "250px";
                document.getElementById("wrapper").style.marginLeft = "250px";
                alreadyopen = true;
            }
            else {
                document.getElementById("sidebar").style.width = "0px";
                document.getElementById("wrapper").style.marginLeft = "0px";
                alreadyopen = false;
            }
        }
    }
}

document.addEventListener('mouseup', function () {
    if (screen.width <= 992) {
        if (event.target != document.getElementById('sidebar') &&
        event.target != document.getElementById('menu-btn') &&
        event.target.parentNode != document.getElementById('menu-btn') &&
        event.target.parentNode != document.getElementById('sidebar') && 
        alreadyopen) {
            toggle();
        }
    }
})