<?php

if($_SESSION["perfil"] == "Usuario"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Credenciales
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar credenciales</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCredenciales">
          
          Agregar Credenciales

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaCredenciales" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Carpeta</th>
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Password</th>
           <th>Web</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>      

       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CREDENCIAL
======================================-->

<div id="modalAgregarCredenciales" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar credenciales</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CARPETAS -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCarpetas" name="nuevaCarpetas" required>
                  
                  <option value="">Selecionar carpeta</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $carpetas = ControladorCarpetas::ctrMostrarCarpetas($item, $valor);

                  foreach ($carpetas as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["carpetas"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span   class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar el nombre"  required>

              </div>

            </div>

            <!-- ENTRADA PARA USER -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar tu usuario" required>

              </div>

            </div>

              <!-- ENTRADA PARA PASSWORD -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar tu password" required>

              </div>

            </div>

            

              <!-- ENTRADA PARA url -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoWeb" placeholder="Ingresar tu direcion web" required>

              </div>

            </div>
            </div>

            </div>

        
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar datos</button>

        </div>

      </form>

        <?php

          $crearCredenciales = new ControladorCredenciales();
          $crearCredenciales -> ctrCrearCredenciales();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CREDENCIALES
======================================-->

<div id="modalEditarCredenciales" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar credenciales</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

<div class="box-body">


  <!-- ENTRADA PARA SELECCIONAR CARPETAS -->

  <div class="form-group">
    
    <div class="input-group">
    
      <span class="input-group-addon"><i class="fa fa-th"></i></span> 

      <select class="form-control input-lg" id="editarCarpetas" name="editarCarpetas" required>
        
        <option value="">Selecionar carpeta</option>

        <?php

        $item = null;
        $valor = null;

        $carpetas = ControladorCarpetas::ctrMostrarCarpetas($item, $valor);

        foreach ($carpetas as $key => $value) {
          
          echo '<option value="'.$value["id"].'">'.$value["carpetas"].'</option>';
        }

        ?>

      </select>

    </div>

  </div>

  <!-- ENTRADA PARA EL NOMBRE -->
  
  <div class="form-group">
    
    <div class="input-group">
    
      <span class="input-group-addon"><i class="fa fa-code"></i></span> 

      <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar el nombre"  required>

    </div>

  </div>

  <!-- ENTRADA PARA USER -->

   <div class="form-group">
    
    <div class="input-group">
    
      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

      <input type="text" class="form-control input-lg" name="editarUsuario" placeholder="Ingresar tu usuario" required>

    </div>

  </div>

    <!-- ENTRADA PARA PASSWORD -->

    <div class="form-group">
    
    <div class="input-group">
    
      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

      <input type="text" class="form-control input-lg" name="editarPassword" placeholder="Ingresar tu password" required>

    </div>

  </div>

  

    <!-- ENTRADA PARA url -->

    <div class="form-group">
    
    <div class="input-group">
    
      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

      <input type="text" class="form-control input-lg" name="editarWeb" placeholder="Ingresar tu direcion web" required>

    </div>

  </div>
  </div>

  </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

        <?php

          $editarCredenciales = new ControladorCredenciales();
          $editarCredenciales -> ctrEditarCredenciales();

        ?>      

    </div>

  </div>

</div>

<?php

  $eliminarCredenciales = new ControladorCredenciales();
  $eliminarCredenciales -> ctrEliminarCredenciales();

?>      



