let tblUsuarios;
document.addEventListener("DOMContentLoaded",function(){
    tblUsuarios = $("#tblUsuarios").DataTable({
        ajax:{
            url: base_url + "Usuarios/listar",
            dataSrc: ""
        },
        columns:[
            {data: "id"},
            {data: "usuario"},
            {data: "nombre"},
            {data: "caja"},
            {data: "estado"},
            {data: "acciones"}
        ]
    });
}); 

function formLogin(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const password = document.getElementById("password");
    if (usuario.value == "" ) {
        usuario.classList.add("is-invalid");
        password.classList.remove("is-invalid");
        usuario.focus();
    }
    else if (password.value == "" ) {
        password.classList.add("is-invalid");
        usuario.classList.remove("is-invalid");
        password.focus();
    }
    else{
        const http= new XMLHttpRequest();
        const url= base_url + "Usuarios/validar";
        const form = document.getElementById("formLogin");
        http.open("POST",url,true);
        http.send(new FormData(form)); 
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if(res == "ok"){
                    window.location = base_url + "Usuarios";
                }
                else{
                    document.getElementById("alerta").classList.remove("d-none");
                    //document.getElementById("alerta").innerHTML = res;
                }
            }
        }
    }
}


function registrarUsuario(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const password = document.getElementById("password");
    const password2 = document.getElementById("password2");
    const caja = document.getElementById("Caja");
    if (usuario.value == "" || nombre.value == "" || caja.value == "" ) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 1500,
            position: 'top-end'
        });
    }
    else{
        const http= new XMLHttpRequest();
        const url= base_url + "Usuarios/registrar";
        const form = document.getElementById("formUsuario");
        http.open("POST",url,true);
        http.send(new FormData(form)); 
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if(res == "si"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario registrado correctamente',
                        showConfirmButton: false,
                        timer: 1500,
                        position: 'top-end'
                    });
                    form.reset();
                    tblUsuarios.ajax.reload();
                    $("#modalUsuario").modal("hide");
                }
                else if(res=="modificado"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario modificado correctamente',
                        showConfirmButton: false,
                        timer: 1500,
                        position: 'top-end'
                    });
                    tblUsuarios.ajax.reload();
                    $("#modalUsuario").modal("hide");
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: res,
                        showConfirmButton: false,
                        timer: 1500,
                        position: 'top-end'
                    });
                }
            }
        }
    }
}

function btnEditar(id){
    document.getElementById("tituloModal").innerHTML = "Editar Usuario";
    document.getElementById("btnGuardar").innerHTML = "Actualizar";
    
    const http= new XMLHttpRequest();
    const url= base_url + "Usuarios/editar/"+id;
    http.open("GET",url,true);
    http.send(); 
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("Caja").value = res.id_caja;
            document.getElementById("divPassword").classList.add("d-none"); 
            $("#modalUsuario").modal("show");
        }
    }
}

function formUsuario(){
    document.getElementById("tituloModal").innerHTML = "Nuevo Usuario";
    document.getElementById("btnGuardar").innerHTML = "Guardar";
    document.getElementById("divPassword").classList.remove("d-none"); 
    document.getElementById("formUsuario").reset(); 
    $("#modalUsuario").modal("show");
    document.getElementById("id").value = "";
}

function cerrarModal(){
    $("#modalUsuario").modal("hide");
}


