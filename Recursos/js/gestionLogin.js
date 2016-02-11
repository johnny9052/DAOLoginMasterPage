function validarLogin(f1, tipo  ){
    f1.type.value = tipo;
    
    if (tipo =="con"){
        if(f1.usuario.value != "" && f1.password != ""){
            f1.submit();
        }else{
            alert("Ingrese Los Datos");
        }            
    }
    
    if(tipo == "desc"){        
        f1.submit();
    }
}