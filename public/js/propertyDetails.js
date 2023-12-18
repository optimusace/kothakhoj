let slideIndex = 1
showSlide(slideIndex)

function showSlide(slideIndex){
    let slides = document.getElementsByClassName("slide");
    let columns = document.getElementsByClassName("column");
    for(let i=0;i<slides.length;i++){
        slides[i].style.display = "none"
    }
    for(let i=0;i<columns.length;i++){
        columns[i].classList.remove("active")
    }
    slides[slideIndex-1].style.display = "block"
    columns[slideIndex-1].classList.add("active")
} 