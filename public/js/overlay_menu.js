var overlay = document.getElementById('overlay');
var background = document.getElementById('background');
var dropdown = document.getElementById('dropdown-mapel');


function overlayOpen() {
    overlay.classList.remove('-left-full');
    overlay.classList.remove('max-[719px]:-left-full');
    background.classList.remove('hidden');
    overlay.classList.add('left-0');
    // background.classList.add('z-100');
}

document.getElementById('background').addEventListener('click', overlayClose);

function overlayClose() {
    overlay.classList.remove('left-0');
    // background.classList.remove('z-10');
    overlay.classList.add('-left-full');
    overlay.classList.add('max-[719px]:-left-full');
    background.classList.add('hidden');
}

function DropDownCheck(){
    localStorage.getItem('DropdownCond') === 'true' ? dropdown.classList.remove('hidden') : dropdown.classList.add('hidden');
}

function DropDown() {
    if (localStorage.getItem('DropdownCond') === 'true') {
        dropdown.classList.add('hidden');
        localStorage.setItem('DropdownCond', 'false');
    } else {
        dropdown.classList.remove('hidden');
        localStorage.setItem('DropdownCond', 'true');
    }

}
