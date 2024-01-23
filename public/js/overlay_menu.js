var overlay = document.getElementById('overlay');
var background = document.getElementById('background');

function overlayOpen() {
    overlay.classList.remove('close');
    background.classList.remove('close');
    overlay.classList.add('open');
    background.classList.add('open');
}

document.getElementById('background').addEventListener('click', overlayClose);

function overlayClose() {
    overlay.classList.remove('open');
    background.classList.remove('open');
    overlay.classList.add('close');
    background.classList.add('close');
}

function pathFind(pathName) {

    var pathArray = window.location.pathname.split('/');
    var lokasi = pathArray[pathArray.length - 1];
    var url = 'http://localhost/ourtaskmvc/public/' + pathName;
    var lokasi = window.location.href;

    // alert(lokasi);

    if (lokasi == url)
        overlayClose();
    else {
        if (pathName == undefined) {
            overlayClose();
            window.location.href = 'http://localhost/ourtaskmvc/public/menu';
        }
        else{
            overlayClose();
            window.location.href = 'http://localhost/ourtaskmvc/public/' + pathName;
        }
    }
}
