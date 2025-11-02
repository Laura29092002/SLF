let slidePosition = 0;
const slides = document.getElementsByClassName('carousel__item');
const totalSlides = slides.length;

document.
  getElementById('carousel__button--next')
  .addEventListener("click", function() {
    moveToNextSlide();
  });
document.
  getElementById('carousel__button--prev')
  .addEventListener("click", function() {
    moveToPrevSlide();
  });

function updateSlidePosition() {
  for (let slide of slides) {
    slide.classList.remove('carousel__item--visible');
    slide.classList.add('carousel__item--hidden');
  }

  slides[slidePosition].classList.add('carousel__item--visible');
}

function moveToNextSlide() {
  if (slidePosition === totalSlides - 1) {
    slidePosition = 0;
  } else {
    slidePosition++;
  }

  updateSlidePosition();
}

function moveToPrevSlide() {
  if (slidePosition === 0) {
    slidePosition = totalSlides - 1;
  } else {
    slidePosition--;
  }

  updateSlidePosition();
}


let bouton = document.querySelector('.menu-button');

let menu = document.querySelector('.menu');

bouton.addEventListener('click', onClick);

function onClick(){
 
    menu.classList.toggle('is-open');
}


let boutonsPopup = document.querySelectorAll('.popup-button');
let boutonsClose = document.querySelectorAll('.popup-close');
let popup = document.querySelector('.popup');

boutonsPopup.forEach(function(boutonPopup){
    boutonPopup.addEventListener('click', showPopup);
})

boutonsClose.forEach(function(boutonClose){
    boutonClose.addEventListener('click', hidePopup);
})

function showPopup(event){
    let buttonOpen = event.target;

    let idPopup = buttonOpen.getAttribute('data-popup');

    let popup = document.querySelector(idPopup)

    popup.classList.add('is-open')
}

function hidePopup(event){
 
    let buttonClose = event.target;
    let popup = buttonClose.parentElement; 
    popup.classList.remove('is-open')
}







