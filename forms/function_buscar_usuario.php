<table class="table table-hover">
    <tbody>
        <?php
            require_once "../conexion.php";
            $null = new conexion();
            $nom_u="";

            if (isset($_GET['texto'])) {
                # code...
                $nom_u = $_GET['texto'];
            }
            $var = $null->buscar_usuario($nom_u);

            foreach ($var as $value) {
                # llamar a la lista de datos desde la base de datos
                echo "<tr class='edit id='detail>";
                $cadena = str_replace(" ","&nbsp",$value['nom_completo']);
                echo "<input id='idu'  hidden class='text-center' value=".$value['idusuarios']."> ";
                    echo "<td id='nom' value= class='text-center'> ".$value['nom_completo']." </td>";
                    echo "<input id='nom' hidden class='text-center' value=".$cadena."> ";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>