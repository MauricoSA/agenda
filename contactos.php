<?php 
    require_once "header.php";
    require_once "Menu2.php";

?>
<?php 
    require_once "dependencias.php";
    require_once "scripts.php"; 
?>

<!-- Header lo que se vera encima de la imagen -->
<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Contactos</h1>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->

</header> <!-- end of header -->
<!-- end of header -->


<div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card text-left">
                        <div class="card-header">
                            Mis Contactos.
                        </div>
                        <div class="card-body">
                            <span class="btn btn-primary" data-toggle="modal" data-target="#agregardatosmodal">
                                Agregar Nuevo Contacto<span class="fas fa-plus-circle"></span>
                            </span>
                            <hr>
                            <div id="tablaDatatable"></div>
                        </div>
                        <div class="card-footer text-muted">
                            By Shankz_scrafs :-P.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="agregardatosmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Contacto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmnuevo">
                            <label>Nombre</label>
                            <input type="text" class="form-control input-sm" id="nombre" name="nombre">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control input-sm" id="paterno" name="paterno">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control input-sm" id="materno" name="materno">
                            <label>Telefono</label>
                            <input type="text" class="form-control input-sm" id="telefono" name="telefono">
                            <label>Email</label>
                            <input type="text" class="form-control input-sm" id="email" name="email">
                            <!--<label>Categoria</label>
                            <input type="text" class="form-control input-sm" id="fecha" name="fecha">-->
                            <label>Categoria <br>  
                                <select type="text" class="form-control input-sm" id="categoria"  name="categoria">
                                    <?php  
                                        require_once "clases/conexion.php";
                                        $obj = new conexion();
                                        $conexion = $obj->conectar();
                                        $sql="SELECT * FROM contactos";
                                        $ejecutar = mysqli_query($conexion, $sql) or die (mysqli_error($conexion, $sql)); 
                                    ?>
                                    <?php foreach ($ejecutar as  $opciones): ?>
                                        <option value="<?php echo $opciones['id_cat'] ?>">
                                            <?php echo $opciones['id_cat'] ?>
                                        </option>    
                                    <?php endforeach ?>
                                </select>
                            </label>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="btnagregarnuevo" class="btn btn-primary">Agregar Nuevo</button>
                    </div>  
                </div>
            </div>
        </div>
        <!-- Modal-2 -->

        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Contacto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmnuevoU">
                            <label>Nombre</label>
                            <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control input-sm" id="paternoU" name="paternoU">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control input-sm" id="maternoU" name="maternoU">
                            <label>Telefono</label>
                            <input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
                            <label>Email</label>
                            <input type="text" class="form-control input-sm" id="emailU" name="emailU">
                            <!--<label>Categoria</label>
                            <input type="text" class="form-control input-sm" id="fecha" name="fecha">-->
                            <label>Categoria <br>  
                                <select type="text" class="form-control input-sm" id="categoriaU"  name="categoriaU">
                                    <?php  
                                        require_once "clases/conexion.php";
                                        $obj = new conexion();
                                        $conexion = $obj->conectar();
                                        //$sql =  "SELECT * FROM contactos";
                                        $sql="SELECT * FROM contactos";
                                        $ejecutar = mysqli_query($conexion, $sql) or die (mysqli_error($conexion, $sql)); 
                                    ?>
                                    <?php foreach ($ejecutar as  $opciones): ?>
                                        <option value="<?php echo $opciones['id_cat'] ?>">
                                            <?php echo $opciones['id_cat'] ?>
                                        </option>    
                                    <?php endforeach ?>
                                </select>
                            </label>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnActualizar">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
    //apertura docuemto jquery
    $(document).ready(function(){
        $('#tablaDatatable').load('tabla.php');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnagregarnuevo').click(function(){
            datos=$('#frmnuevo').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"vistas/agregar.php",
                success:function(r){
                    if (r==1) {
                        //para limpiar el formulario
                        $('#frmnuevo')[0].rest();
                        //para recargar en automatico la tabla.
                        $('#tablaDatatable').load('tabla.php');
                        alertify.success("Agregado Con Exito :D");
                    }else{
                        alertify.error("No se pudo agregar. :(");
                    }
                }
            });

        });

        });
</script>
<script type="text/javascript">
    function agregaFrmActualizar(id_con){
        $.ajax({
            type:"POST",
            data:"id_con=" + id_con,
            url:"vistas/obtener.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#id_con').val(datos['id_con']);
                $('#nombreU').val(datos['nombreUe']);
                $('#paternoU').val(datos['paternoU']);
                $('#maternoU').val(datos['maternoU']);
                $('#telefonoU').val(datos['telefonoU']);
                $('#emailU').val(datos['emailU']);
                $('#categoriaU').val(datos['categoriaU']);

            }
        });
    }
    function EliminarDatos(id_con){
        alertify.confirm('Eliminar contacto', '¿Seguro de elimiar este contacto?', function(){ 
                $.ajax({
                    type:"POST",
                    data:"id_con=" + id_con,
                    url:"vistas/eliminar.php",
                    success:function(r){
                        if (r==1) {
                            $('#tablaDatatable').load('tabla.php');
                            alertify.success("Eliminado con exito!");
                        }else{
                            alertify.error("No se pudo eliminar");
                        }
                    }
                });         
             }
                , function(){ alertify.error('Cancel')});
    }
</script>

<?php 
require_once "footer.php";

?>