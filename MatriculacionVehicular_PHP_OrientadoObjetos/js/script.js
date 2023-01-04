function BuscarTodos(){
    
    let res = document.querySelector("#datos");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Logica/cargar_vehiculos.php",true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            res.innerHTML = this.responseText;
        }
    }

    let data = JSON.stringify({"operacion":"BuscarTodos"});
    xhr.send(data);
}

function cargarAgencias(){
        
    let res = document.querySelector("#datos1");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Logica/cargar_agencias.php",true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            res.innerHTML = this.responseText;
        }
    }

    let data = JSON.stringify({"operacion":"BuscarTodos"});
    xhr.send(data);
    
}
function solicitar($a){
    
    let res = document.querySelector("#res");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Logica/cargar_vehiculos.php",true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            //res.innerHTML = "listo para editar";
            window.open('seleccionar_Agencia.php','_self');
        }
    }

    let data = JSON.stringify({"id":$a,"operacion":"Solicitar"});
    xhr.send(data);

}

function enviarSolicitud($a){
    let res = document.querySelector("#res");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Logica/cargar_matricula.php",true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            //res.innerHTML = "listo para editar";
            //window.open('seleccionar_Agencia.php','_self');
            alert("Matrícula en proceso");
            window.open('mostrarVehiculos.php','_self');
            
        }
    }

    let data = JSON.stringify({"id":$a,"operacion":"Solicitar"});
    xhr.send(data);
}

function buscarMatriculas(){
        
    let res = document.querySelector("#datos2");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Logica/cargar_matricula.php",true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            res.innerHTML = this.responseText;
        }
    }

    let data = JSON.stringify({"operacion":"BuscarTodos"});
    xhr.send(data);
    
}

function aprobar($a){
    let res = document.querySelector("#res");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Logica/cargar_matricula.php",true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            //res.innerHTML = "listo para editar";
                var mensaje = confirm("Presione aceptar para aprobar / Presione cancelar para denegarla");
                //Detectamos si el usuario acepto el mensaje
                if (mensaje) {
                alert("Matrícula aprobada");
                    enviarAprobacion($a);
                }
                //Detectamos si el usuario denegó el mensaje
                else {
                alert("Matrícula denegada");
                    enviarDenegacion($a);

                }
                window.open('mostrarMatricula.php','_self');
            
        }
    }

    let data = JSON.stringify({"id":$a,"operacion":"Solicitar"});
    xhr.send(data);
}

function enviarAprobacion($a){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Logica/cargar_matricula.php",true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            //res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"id":$a,"operacion":"aprobar"});
    xhr.send(data);
}

function enviarDenegacion($a){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../Logica/cargar_matricula.php",true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            //res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"id":$a,"operacion":"denegar"});
    xhr.send(data);
}