<?php include("../template/cabecera.php"); ?>
<?php include("../productocontroller.php"); ?>

<div class="contenedor">
    <div class="col-md-3" style="margin:20px">

        <div class="card">
            <div class="card-header">
                Productos
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="txtID" class="form-label">ID</label>
                        <input type="text" require readonly class="form-control" name="txtID" aria-describedby="emailHelp" id="txtID" value="<?php echo $txtID; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txtNombre" class="form-label">Nombre del Producto</label>
                        <input type="text" required class="form-control" name="txtNombre" aria-describedby="emailHelp" id="txtNombre" placeholder="Nombre del Producto" value="<?php echo $txtNombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txtImangen" class="form-label">Imagen del Producto</label>
                        <?php echo $txtImagen; ?>
                        <input type="file" class="form-control" name="txtImagen" aria-describedby="emailHelp" id="txtImagen" placeholder="Nombre del Producto">
                    </div>
                    <div class="mb-3">
                        <label for="txtdescripcion" class="form-label">Descripcion del Producto</label><br />
                        <textarea name="txtDescripcion" id="txtDescripcion"><?php echo $txtDescripcion; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="txtprecio" class="form-label">Precio</label><br />
                        <input type="text" require class="form-control" name="txtPrecio" id="txtprecio" value="<?php echo $txtPrecio; ?>">
                    </div>

                    <div class="btn-group" role="group" aria-label="">

                        <button type="submit" class="responsive-btn-add btn btn-success mx-2" <?php echo ($editar) ? "disabled" : ""; ?> value="Agregar" id="agregar" name="accion">Agregar</button>
                        <button type="submit" class="responsive-btn-edit btn btn-info mx-2" value="Modificar" <?php echo (!$editar) ? "disabled" : ""; ?> name="modificar">Modificar</button>
                        <button type="submit" class="responsive-btn-can btn btn-danger mx-2" value="Modificar" <?php echo (!$editar) ? "disabled" : ""; ?> name="cancelar">Cancelar</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="col-md-9">
        <table  class="table" id="tabla">
            <thead id="tabla">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php foreach ($ejecutar as $producto) { ?>
                <tbody>
                    <tr>
                        <td scope="row"><?php echo $producto["id"] ?></td>
                        <td><?php echo $producto["nombre"] ?></td>
                        <td><?php echo $producto["descripcion"] ?></td>
                        <td><?php echo "$" . $producto["precio"] ?></td>
                        <td><img src="../../img/<?php echo $producto["imagen"] ?>" alt="" width="50px" height="50px"></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="txtID" value="<?php echo $producto["id"] ?>">
                                <input type="submit" class="btn btn-success" value="Editar" name="editar">
                                <input type="submit" class="btn btn-danger" value="Eliminar" name="eliminar">
                            </form>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ Registros por paginas",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first": "Primero",
                    "last": "Ultimo"
                }
            }
        });
    });
</script>

<?php include("../template/pie.php"); ?>
<style>
    .img {
        display: flex;
        align-items: center;
        flex-direction: row;
        justify-content: center;
        margin: auto;
        margin-top: 20px;
    }

    .img img {
        max-height: 193px;
    }

    .contenedor {
        display: flex;
        width: 100%;
    }

    .contariner-form {
        margin-bottom: 12px;
        margin-left: 14px;
    }

    .table {
        margin: 20px;
    }
    .tabla {
        margin: 20px;
    }




    @media (max-width: 1450px) {}
</style>