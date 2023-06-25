
  //Colors
  import './colorManager.js';
  //Personal Info
  import './dataManager.js';
  //Educations
  import './educationManager.js';
  //Cursos
  import './courseManager.js';
  //Experiences
  import './experienceManager.js';
  //External Files
  import './externalFilesManager.js';
  //Language
  import './langManager.js';
  //Paper size
  import './paperSize.js';
  //Picture
  import './pictureManager.js';
  //Destrezas
  import './dexterityManager.js';
  //Habilidades
  import './skillManager.js';


  //Covering Letter
  import '../coveringLetter.js';
  //Certifications
  import '../diplomas.js';
  //PDF
  import '../exportPDF.js';


$(document).ready(function() {
    $('.hoja textarea').each(function() {
      autoGrow($(this));
    });
    $('.hoja textarea').trigger('input');
  });

  function autoGrow(element) {
    element.on('input', function() {
      this.style.height = 'auto';
      this.style.height = (this.scrollHeight) + 'px';
    });
  }

  