 var slider = document.querySelector('.slider');
    var slides = document.querySelectorAll('.slide');
    var buttons = document.querySelectorAll('.slider-buttons button');
    var currentSlideIndex = 0;
    var autoChangeInterval;

    function changeSlide(index) {
      // Mettre à jour l'indice de la diapositive actuelle
      currentSlideIndex = index;

      
      var slideWidth = slides[0].offsetWidth;             //largeur de la première diapositive (slides[0])
      var displacement = -1 * currentSlideIndex * slideWidth;

      slider.style.transform = `translateX(${displacement}px)`;

      // Mettre à jour l'apparence des boutons
      buttons.forEach(function(button, buttonIndex) {
        if (buttonIndex === index) {
          button.classList.add('active');
        } else {
          button.classList.remove('active');
        }
      });
    }

    function startAutoChange() {
      autoChangeInterval = setInterval(function() {
        // Changer la diapositive automatiquement vers la droite
        currentSlideIndex++;

        // Si on atteint la fin des diapositives, revenir à la première diapositive
        if (currentSlideIndex === slides.length) {
          currentSlideIndex = 0;
        }

        // Changer la diapositive automatiquement
        changeSlide(currentSlideIndex);
      }, 3000); // Changer de diapositive toutes les 3 secondes (ajustez cette valeur selon vos besoins)
    }

    
    startAutoChange();