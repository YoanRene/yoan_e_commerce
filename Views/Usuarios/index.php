<?php include "Views/Templates/header.php";?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Usuarios</li>
</ol>

<button type="button" class="btn btn-primary mb-2" onclick="formUsuario()">Nuevo</button>

<table class="table table-light" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Caja</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>

<div id="modalUsuario" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tituloModal" >Nuevo Usuario</h4>
                <button type="button" class="close" onclick="cerrarModal()" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formUsuario">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="row" id="divPassword">
                        <div class="col-md-6">
                            <div>
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="password2">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password2" name="password2" required>
                            </div>   
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Caja">Caja</label>
                        <select class="form-control" id="Caja" name="Caja">
                            <?php foreach ($data['cajas'] as $caja) { ?>
                                <option value="<?php echo $caja['id']; ?>"> <?php echo $caja['caja']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" onclick="registrarUsuario(event);" id="btnGuardar">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php";?>