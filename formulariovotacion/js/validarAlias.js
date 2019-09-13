    
    
    
    // Validacion de campo Alias
    var validarAlias = function (e) {

        // validacion de largo mayor a 5
        if (formulario.alias.value.length <= 5){
            alert ('Alias debe tener mas de 5 caracteres');
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
            alert ('Alias debe tener al menos un numero');
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
            alert ('Alias debe tener al menos una letra');
            e.preventDefault();
        }


    }