$(document).ready(function() {
  // Obtener el editor y los botones
  var editor = $('#editor');
  var boldButton = $('#boldButton');
  var italicButton = $('#italicButton');
  var underlineButton = $('#underlineButton');
  var increaseFontSizeButton = $('#increaseFontSizeButton');
  var decreaseFontSizeButton = $('#decreaseFontSizeButton');
  var textColorButton = $('#textColorButton');

  // Agregar eventos a los botones
  boldButton.on('click', function() {
    applyStyle('bold');
  });

  italicButton.on('click', function() {
    applyStyle('italic');
  });

  underlineButton.on('click', function() {
    applyStyle('underline');
  });

  increaseFontSizeButton.on('click', function() {
    applyStyle('fontSize', 'increase');
  });

  decreaseFontSizeButton.on('click', function() {
    applyStyle('fontSize', 'decrease');
  });

  textColorButton.on('click', function() {
    var textColor = prompt('Ingrese el color de texto (nombre del color o código hexadecimal):');
    if (textColor) {
      applyStyle('textColor', textColor);
    }
  });

  $('#inputFontcolor')

  // Función para aplicar estilos al texto seleccionado
  function applyStyle(style, value) {
    var selectedText = getSelectedText();
    var newText = '';
    switch (style) {
      case 'bold':
        newText = '<strong>' + selectedText + '</strong>';
        break;
      case 'italic':
        newText = '<em>' + selectedText + '</em>';
        break;
      case 'underline':
        newText = '<u>' + selectedText + '</u>';
        break;
      case 'fontSize':
        var emSize = parseFloat($(selectedText).css("font-size"));
        alert(emSize);
        
        var currentFontSize = $(selectedText).css('font-size');
        console.log(currentFontSize);
        alert(currentFontSize);
        return;
        var newFontSize;
        if (value === 'increase') {
          newFontSize = currentFontSize + 2; // Incremento de 2 píxeles
        } else if (value === 'decrease') {
          newFontSize = currentFontSize - 2; // Decremento de 2 píxeles
        }
        newText = '<span style="font-size:' + newFontSize + 'px;">' + selectedText + '</span>';
        break;
      case 'textColor':
        newText = '<span style="color:' + value + ';">' + selectedText + '</span>';
        break;
    }
    document.execCommand('insertHTML', false, newText);
  }

  // Función para obtener el texto seleccionado
  function getSelectedText() {
    var text = '';
    if (window.getSelection) {
      text = window.getSelection().toString();
    } else if (document.selection && document.selection.type !== 'Control') {
      text = document.selection.createRange().text;
    }
    return text;
  }

  $('#saveCovringLetter').click(function(){
    $('')



  });
});
