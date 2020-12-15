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
                <h1>Categorias</h1>
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
                            Mis Categorias.
                        </div>
                        <div class="card-body">
                            <span class="btn btn-primary" data-toggle="modal" data-target="#agregardatosmodal">
                                Agregar nueva categoria <span class="fas fa-plus-circle"></span>
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
                            <input type="text" class="form-control input-sm" id="nombreC" name="nombreC">
                            <label>Fecha - "YYYY-MM-DD"</label>
                            <input type="text" class="form-control input-sm" id="fechaC" name="fechaC">
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
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmnuevoU">
                            <label>Nombre</label>
                            <input type="text" class="form-control input-sm" id="nombreCU" name="nombreCU">
                            <label>Fecha - "YYYY-MM-DD"</label>
                            <input type="text" class="form-control input-sm" id="fechaCU" name="fechaCU">
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
        $('#tablaDatatable').load('tabla2.php');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnagregarnuevo').click(function(){
            datos=$('#frmnuevo').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"vistas/agregar1.php",
                success:function(r){
                    if (r==1) {
                        //para limpiar el formulario
                        $('#frmnuevo')[0].rest();
                        //para recargar en automatico la tabla.
                        $('#tablaDatatable').load('tabla2.php');
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
    function agregaFrmActualizar(id_cat){
        $.ajax({
            type:"POST",
            data:"id_cat=" + id_cat,
            url:"vistas/obtener1.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#id_cat').val(datos['id_cat']);
                $('#nombreCU').val(datos['nombreCU']);
                $('#fechaCU').val(datos['fechaCU']);

            }
        });
    }
    function EliminarDatos(id_cat){
        alertify.confirm('Eliminar categoria', '¿Seguro de elimiar esta categoria?', function(){ 
                $.ajax({
                    type:"POST",
                    data:"id_gasto=" + id_gasto,
                    url:"vistas/eliminar1.php",
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