<?php  
    session_start();
    include('templates/header.php');    
    include('templates/nav_bar.php');
    if(!isset($_SESSION['usuario'])){
        header('location:../index.php');
        die();
    }
    include('../modelo/alumnos_modelo.php');
    $Alumnos = new Alumnos();
    $matrizAlumnos = $Alumnos->get_alumnos();    
?>

<div class='container-fluid'>
    <div class='row'>
        <div class='col-sm-2'><?php include('templates/menu_lateral.php')?></div>
        <div class='col-sm-8' id='panel_mostrar'>
            <br>
            <tabla class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td class='p-4' colspan='4'>
                            <p class='h3 text-center'>Listado de Alumnos Activos</p>
                        </td>
                    </tr>
                </thead>
                </table>
                <table class='table mt-2' id='talumnos'>
                    <thead>
                        <tr>
                            <td class='p-2'>Id</td>
                            <td class='p-2'>Cedula</td>
                            <td class='p-2'>Nombre del Alumno</td>
                            <td class='text-center p-2'>Editar Datos</td>
                            <td class='text-center p-2'>Record Acad.</td>
                            <td class='text-center p-2'>Eliminar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($matrizAlumnos as $registro){?>
                        <tr>
                            <td><?=$registro["id"]?></td>
                            <td><?=$registro["cedula"]?></td>
                            <td><?=$registro["nombre"]?></td>
                                <td  class='p-2 text-center'>
                                    <form method='post' action="../controlador/alumnos_controlador.php">
                                        <input type='hidden' name='id' value ='<?=$registro['id']?>'>
                                        <input type='hidden' name='accion' value='llamarEditar'>
                                        <input type='image' src='imagenes/editar_datos.png' value='Editar' title="Editar datos">
                                    </form>
                                </td>                                
                                <td class='p-2 text-center'><a href='#' onclick="">
                                    <img title='record académico' src='imagenes/record.png'></a></td>
                                    <?php if($_SESSION['tipo'] == 'ADMINISTRADOR'){?>
                                    <td class='p-2 text-center'>
                                        <form method="post" action="../controlador/alumnos_controlador.php">
                                        <input type='hidden' name='id' value ='<?=$registro['id']?>'>
                                        <input type='hidden' name='cedula' value ='<?=$registro['cedula']?>'>
                                        <input type='hidden' name='nombre' value ='<?=$registro['nombre']?>'>
                                        <input type='hidden' name='accion' value='llamarValidarEliminar'>
                                        <input type='image' src='imagenes/eliminar.png' value='Editar' title="Eliminar">
                                        </form>
                                    </td>
                                    <?php }else{ ?>
                                        <td><img src='imagenes/eliminar.png' alt='eliminar alumno'></td>
                                    <?php }  ?> 
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
        <div class='col-sm-2'></div>
    </div>
</div>


<?php    
    include('templates/footer.php');
?>
<!--2023 Ing. Carlos R. Izquierdo G.-->
