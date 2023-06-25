$(document).ready(function(){
    $("#escolaridad").change(function(){

        alert("Nueva escolaridad agregada");
        var file = this.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      var pdfData = e.target.result;
      $('#contenedor-hojas').append('<section class="hoja a4"><object style="none;height:100%;" data="' + pdfData + '" type="application/pdf" width="100%" height="500px"></object></section>');
    };

    reader.readAsDataURL(file);
    })
})
    