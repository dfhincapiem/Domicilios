$(document).ready(
    
    $('.innerform .userform').prop('readonly', true)

)
    

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
    
        var tag2 = "#innerform"+e+" .formselect";
        var tag = "#innerform"+e+" .forminput";
        
        
    
        if(($(tag).prop('readonly'))){
            $(tag).prop('readonly', false);
            $(tag2).prop('disabled', false);
            }
            else   {
            $(tag).prop('readonly', true);
            $(tag2).prop('disabled', true);
            
            }
    
    }