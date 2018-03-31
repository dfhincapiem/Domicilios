$(document).ready($('#innerform input').prop('readonly', true))
    

$("#edit").click(function(event){
    event.preventDefault();
    if(($('#innerform input').prop('readonly'))){
    $('#innerform input').prop('readonly', false);
    $('#innerform input').prop('disabled', false);
    }
    else   {
    $('#innerform input').prop('readonly', true);
    $('#innerform input').prop('disabled', true);
    
    }

});

function mostrar(){

    $('#newform').toggleClass('nuevoUsuario');
}