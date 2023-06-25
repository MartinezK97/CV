
$(document).ready(function(){
    $(".paper").click(function(){
        var size = $(this).attr('rel');
        alert(size);
        var classesToRemove = ['a4', 'letter','legal'];
        $('.hoja').removeClass(classesToRemove);
        $('.paper.selected').removeClass('selected');
        $(this).addClass('selected');
        $(".hoja").addClass(size);
    })
    
});