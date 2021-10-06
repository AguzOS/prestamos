<table class="table table-hover">
    <tbody>
        <?php
            require_once "../conexion.php";
            $null = new conexion();

            $nom_l = $_GET['busqueda'];
            $var = $null->buscar_libro($nom_l);

            foreach ($var as $value) {
                # llamar a la lista de datos desde la base de datos
                echo "<tr class='edit id='detail>";
                $cadena = str_replace(" ","&nbsp;",$value['nom_libro']);
                echo "<input id='id_l' hidden class='text-center' value=".$value['idlibros'].">";
                    echo "<td id='nols' class='text-center'> ".$value['nom_libro']." </td>";
                    echo "<input id='nol' hidden class='text-center' value=" .$cadena. ">";
                    echo "<input id='st' hidden class='text-center' value=" .$value['cantidad']. ">";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>