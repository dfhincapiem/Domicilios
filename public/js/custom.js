$(document).ready($('.innerform input').prop('readonly', true))
    

// $("#edit").click(function(event){
//     event.preventDefault();
//     if(($('#innerform input').prop('readonly'))){
//     $('#innerform input').prop('readonly', false);
//     $('#innerform input').prop('disabled', false);
//     }
//     else   {
//     $('#innerform input').prop('readonly', true);
//     $('#innerform input').prop('disabled', true);
    
//     }

// });

function mostrar(){

    $('#newform').toggleClass('nuevoUsuario');
}

function remove(e){
    
        var tag = "#innerform"+e+" input";
    
        if(($(tag).prop('readonly'))){
            $(tag).prop('readonly', false);
            $(tag).prop('disabled', false);
            }
            else   {
            $(tag).prop('readonly', true);
            $(tag).prop('disabled', true);
            
            }
    
    }