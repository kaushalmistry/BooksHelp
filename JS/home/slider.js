
var slideIndex = 1;
showSlides(slideIndex);
    
function plusSlides(n) {
    showSlides(slideIndex += n);
}
    
function currentSlide(n) {
    showSlides(slideIndex = n);
}
    
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("myslide26");
    var dots = document.getElementsByClassName("dot26");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active26", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active26";
}

var x=1;
function s1(){
    showSlides(x);
    if(x<3)
        x++;
    else
        x=1;
}    
setInterval(s1,3000);

