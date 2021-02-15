$(document).ready(function() {
    $('#example').DataTable();

});
//////////////////////////////////////////////////////////////////////////////
function alerta(){
    if(confirm("Confirme Para Registrar")){
        return true;
    }else{
        return false;
    }

}

function validar(){
    
    if(confirm("Confirme Para Registrar")){
        return true;
    }else{
        return false;
    }

}

function buscar(){
    
    var esperar =300;
    $.ajax({
      
        type: "POST",
        
        data: $("form1").serialize(), 
        // codigo es el nombre de la variable que llamaré en el archivo procesar.php 
        // y es extraido de lo que tiene el input txt_codigo 
        url: "producto/all", 
        
        beforeSend : function(){
            $('#resultado').text('...Cargando Por Favor espere...');
          } ,
    
          success : function(datos){
            setTimeout(function(){
              $('#resultado').html(datos);
            },esperar
            );
          }  // el archivo php al cual se va a direccionar
        
    });
}



function busca(){
    alert("siii");
    $.ajax({

        url: "producto/all",
        method: 'POST',
        data:$("form1").serialize(),
    }).done(function(res){
        alert("sii");
        alert(res);
    });
}