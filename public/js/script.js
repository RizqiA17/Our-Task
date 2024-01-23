function scrollContainer(containerId, amount) {
    const container = document.getElementById(containerId);
    const screenWidth = window.innerWidth;

    
    const scrollAmount = screenWidth > 501 ? 510 * amount : screenWidth * amount;
    // alert(scrollAmount);
    // console.log(scrollAmount);
    container.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
}

function backPage(){
    window.history.back();
}

