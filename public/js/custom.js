$(document).ready($('input').prop('readonly', true))
    

$("#edit").click(function(event){
    event.preventDefault();
    if(($('input').prop('readonly'))){
    $('input').prop('readonly', false);
    $('input').prop('disabled', false);
    }
    else   {
    $('input').prop('readonly', true);
    $('input').prop('disabled', true);
    
    }

});