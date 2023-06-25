$(document).ready(function(){
    //Change color stream
    let colorPicker;
    window.addEventListener("load", headerColor, false);
    window.addEventListener("load", titleColor, false);
    window.addEventListener("load", subtitleColor, false);
    window.addEventListener("load", profColor, false);
    window.addEventListener("load", nameColor, false);
    window.addEventListener("load", textSelectColor, false);

    function profColor() {
        colorPicker = document.querySelector("#profColor");
        colorPicker.addEventListener("input", changeProfColor, false);
        colorPicker.select();
      }

      function textSelectColor() {
        colorPicker = document.querySelector("#profColor");
        colorPicker.addEventListener("input", changeProfColor, false);
        colorPicker.select();
      }
    
      function headerColor() {
        colorPicker = document.querySelector("#headerColor");
        colorPicker.addEventListener("input", changeHeaderColor, false);
        colorPicker.select();
      }
    
    function titleColor() {
        colorPicker = document.querySelector("#titleColor");
        colorPicker.addEventListener("input", changeTitleColor, false);
        colorPicker.select();
      }
    
      function nameColor() {
        colorPicker = document.querySelector("#nameColor");
        colorPicker.addEventListener("input", changeNameColor, false);
        colorPicker.select();
      }
    
      function subtitleColor() {
        colorPicker = document.querySelector("#subtitleColor");
        colorPicker.addEventListener("input", changeSubtitleColor, false);
        colorPicker.select();
      }


    function changeHeaderColor(event){      document.documentElement.style.setProperty('--headerColor', event.target.value);}
    function changeNameColor(event) {       document.documentElement.style.setProperty('--nameColor', event.target.value);}
    function changeProfColor(event){        document.documentElement.style.setProperty('--profColor', event.target.value);}
    function changeTitleColor(event){       document.documentElement.style.setProperty('--titleColor', event.target.value);}
    function changeSubtitleColor(event){    document.documentElement.style.setProperty('--subtitleColor', event.target.value);}
    // function changeTextSelectColor(event){    document.documentElement.style.setProperty('--subtitleColor', event.target.value);}
    

    $('#headerColor').change(function(){
        console.log('Header: '+ $(this).val())
        send('user/styles/headerColor/', {'headerColor':$(this).val()});
    });

    $('#nameColor').change(function(){
        console.log('nameColor: '+ $(this).val())
        send('user/styles/nameColor/', {'nameColor':$(this).val()});
    });

    $('#profColor').change(function(){
        console.log('profColor: '+ $(this).val())
        send('user/styles/profColor/', {'profColor':$(this).val()});
    });
    $('#titleColor').change(function(){
        console.log('titlrColor: '+ $(this).val())
        send('user/styles/titleColor/', {'titleColor':$(this).val()});
    });
    
    $('#subtitleColor').change(function(){
        console.log('subtitleColor: '+ $(this).val())
        send('user/styles/subtitleColor/', {'titleColor':$(this).val()});
    });



})