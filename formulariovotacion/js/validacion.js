document.addEventListener("DOMContentLoaded", function(){

    
    
    
    var formulario = document.getElementsByName('formulario')[0],
    elementos = formulario.elements,
    boton = document.getElementById('btn');
    errores = document.getElementById('errores');



    // Validacion de campo Alias
    var validarAlias = function (e) {

        // validacion de largo mayor a 5
        if (formulario.alias.value.length <= 5){
            errores.innerHTML+="Alias debe tener mas de 5 caracteres<br>";
            e.preventDefault();
        }

        // validacion de numeros
        var numeros="0123456789";

        function tiene_numeros(texto){
        for(i=0; i<texto.length; i++){
            if (numeros.indexOf(texto.charAt(i),0)!=-1){
                return 1;
            }
        }
        return 0;
        }

        if (tiene_numeros(formulario.alias.value)==0){
            errores.innerHTML+="Alias debe tener al menos un numero<br>";
            e.preventDefault();
        }



        // validacion de letras
        var letras="abcdefghyjklmnñopqrstuvwxyz";

        function tiene_letras(texto){
           texto = texto.toLowerCase();
           for(i=0; i<texto.length; i++){
              if (letras.indexOf(texto.charAt(i),0)!=-1){
                 return 1;
              }
           }
           return 0;
        }

        if (tiene_letras(formulario.alias.value)==0){
            errores.innerHTML+="Alias debe tener al menos una letra<br>";
            e.preventDefault();
        }



    } // Fin Validacion Alias

    // Validación de Región
    var validarRegion = function (e){
        if (formulario.region.value == 0){
            errores.innerHTML+="Debe seleccionar región<br>";
            e.preventDefault();            
        }
    }
    

    // Validación de Comuna
    var validarComuna = function (e){
        if (formulario.comuna.value == 0){
            errores.innerHTML+="Debe seleccionar comuna<br>";
            e.preventDefault();            
        }
    }



    // Validación de Candidato
    var validarCandidato = function (e){
        if (formulario.candidato.value == 0){
            errores.innerHTML+="Debe seleccionar candidato<br>";
            e.preventDefault();            
        }
    }


    // Validación de checkboxes seleccionados
    var validarCheckbox = function (e) { 
        //checkboxes
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        
        var checkeados=0;

        for (i=0 ; i < checkboxes.length ; i++){
            if (checkboxes[i].checked){
                checkeados++;
            }
        }

        //validar que al menos haya 2 seleccionados
        if(checkeados<2){
            errores.innerHTML+="Debe seleccionar al menos 2 opciones de como se enteró de nosotros<br>";
            e.preventDefault();
        }
        
        
     }








        // Validar que alias no exista
        function aliasExiste (e){

            

            var xhr = new XMLHttpRequest();

            //abrir conexion
            xhr.open("GET", "includes/getAlias.php?aliasIngresado="+formulario.alias.value, false);
            xhr.onreadystatechange = function() {

                if (xhr.readyState == 4 && xhr.status == 200) {

                    var cantidad = parseInt(xhr.responseText);
                    
                    if (cantidad>0){
                        errores.innerHTML+="Alias ya ingresado.<br>";                        
                        e.preventDefault();
                        
                    }

                }

                
            }

            xhr.send();

        }



        // Validar que rut no exista
        function rutExiste (e){

    

            var xhr = new XMLHttpRequest();

            //abrir conexion
            xhr.open("GET", "includes/getRut.php?rutIngresado="+formulario.rut.value, false);
            xhr.onreadystatechange = function() {

                if (xhr.readyState == 4 && xhr.status == 200) {

                    var cantidad = parseInt(xhr.responseText);
                    
                    if (cantidad>0){
                        errores.innerHTML+="Rut ya ingresado.<br>";                        
                        e.preventDefault();
                        
                    }

                }

                
            }

            xhr.send();

        }


     //Llamar funciones de validacion de campos
    var validar = function(e){

        errores.innerHTML="";
        validarAlias(e);
        aliasExiste(e);
        rutExiste(e);
        validarRegion(e);
        validarComuna(e);
        validarCandidato(e);
        validarCheckbox(e);
        
    }
    
    
    formulario.addEventListener("submit", validar);




});
