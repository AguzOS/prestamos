<?php
    class conexion{

        protected $db;

        public function __construct(){

            $this->db = new mysqli('127.0.0.1:3307','root','','prestamo');

            if ($this->db->connect_errno) {
                # code...
                echo "Fallo al conectar al a base de datos".$this->db->connect_error;
                return;
            }
            else{
                $this->db->set_charset='utf-8';
            }
        }

        #funcion para obtener al administrador e inicio de sesino
        public function session($user,$pdw){

            return $sesion = $this->db->query("select * from administrador where usuario='$user' and contrasenia='$pdw'");
        }

        public function admin($id){

            return $admin = $this->db->query("select * from administrador where idadmi=$id");
        }
        public function foto_admin($id){

            return $foto = $this->db->query("select * from administrador where idadmi=$id");
        }

        public function update_admin($name,$user,$photo,$id){

            return $admin = $this->db->query("update administrador set nom_completo='$name',usuario='$user', foto='$photo' where idadmi=$id");
        }

        public function update_admin_sin_foto($name,$user,$id){

            return $admin = $this->db->query("update administrador set nom_completo='$name',usuario='$user' where idadmi=$id");
        }

        public function borrar_foto_admin($id){

            return $admin = $this->db->query("update administrador set foto='' where idadmi=$id");
        }

        #funcion para cambiar la contraseña del administrador
        public function update_pass($pwd,$id){

            return $pass = $this->db->query("update administrador set contrasenia='$pwd' where idadmi=$id");
        }

        #funciones para la tabla de libros
        public function insert_book($id,$nom_libro,$edit,$autor,$cantidad,$desc){

            echo$registro = $this->db->query("insert into libros values(0,$id,'$nom_libro','$edit','$autor',$cantidad,'$desc');");
        }

        public function view_book(){
            return $register = $this->db->query("select * from libros");
        }

        public function update_data_book($n,$edit,$a,$c,$con,$id_l){

            return $update=$this->db->query("update libros set nom_libro='$n',editorial='$edit',autor='$a',cantidad=$c,condicion='$con' where idlibros=$id_l");
        }

        public function delete_book($id){

            return $delete=$this->db->query("delete from libros where idlibros=$id");
        }

        #funciones para la tabla de materiales
        public function insert_material($id,$nombre,$c,$desc){

            $registro = $this->db->query("insert into materiales values(0,$id,'$nombre',$c,'$desc')");
        }

        public function view_material($letra){
            if ($letra != "") {
                # code...
                return $select = $this->db->query("select * from materiales where nombre like '%$letra%'");
            } else {
                # code...
                return $select = $this->db->query("select * from materiales");
            }
        }

        public function update_data_material($nom_m,$c,$desc,$id){

            return $update = $this->db->query("update materiales set nombre='$nom_m',cantidad=$c,condicion='$desc' where idm=$id");
        }

        public function delete_material($id){

            return $delete = $this->db->query("delete from materiales where idm=$id");
        }

        #funciones para la tabla de usuarios
        public function insert_usuario($id,$full_name,$addres,$photo){

            $register = $this->db->query("insert into usuarios values(0,$id,'$full_name','$addres','$photo')");
        }

        public function view_users($palabra){

            if ($palabra != "") {
                # code...
            return $select = $this->db->query("select * from usuarios where nom_completo like '%$palabra%'");
            } else {
                # code...
            return $select = $this->db->query("select * from usuarios");
            }
        }

        public function update_user($name,$adress,$photo,$id_u){

            return $update = $this->db->query("update usuarios set nom_completo='$name',direccin='$adress',foto_ine='$photo' where idusuarios=$id_u");
        }

        public function delete_user($id){

            return $delete = $this->db->query("delete from usuarios where idusuarios=$id");
        }

        // funcion para buscar la imagen del usuario
        public function search_ine($id){

            return $search = $this ->db ->query("select foto_ine from usuarios where idusuarios=$id");
        }

        public function delete_foto($id){

            return $delete = $this->db->query("update usuarios set foto_ine='' where idusuarios=$id");
        }

        #modificar los datos sin modificar la foto del usuario
        public function update_ususarios_sin_foto($name,$direccion,$id){

            return $update_sn_foto = $this->db->query("update usuarios set nom_completo='$name',direccin='$direccion' where idusuarios=$id");
        }

        #funcion para la tabla de prestamolibro
        public function buscar_usuario($name){

            return $buscar = $this->db->query("select idusuarios,nom_completo from usuarios where nom_completo like '%$name%' limit 1");
        }

        public function buscar_libro($libro){

            return $libro = $this->db->query("select idlibros,nom_libro,cantidad from libros where nom_libro like '%$libro%' limit 1");
        }

        public function insert_prestamo($user,$book,$c,$f){

            $libro = $this->db->query("insert into prestamolibro values(0,$user,$book,$c,'$f',1)");
        }

        public function view_prestamos(){

            return $prestamo = $this->db->query("select *,TIMESTAMPDIFF(day, CURDATE(), tiempo) as dias from usuarios inner join prestamolibro on
            prestamolibro.idusuario=usuarios.idusuarios inner join libros on
            libros.idlibros=prestamolibro.idbook where activo=1");
        }

        public function view_devolucion(){

            return $devolucion = $this->db->query("select *,TIMESTAMPDIFF(day, CURDATE(), tiempo) as dias from usuarios inner join prestamolibro on
            prestamolibro.idusuario=usuarios.idusuarios inner join libros on
            libros.idlibros=prestamolibro.idbook where activo=0");
        }

        public function borrar_prestamo($id){

            return $prestamo = $this->db->query("update prestamolibro set activo=0 where idprestamolibro=$id");
        }

        public function dias(){

            return $dias = $this->db->query("select *,TIMESTAMPDIFF(day, CURDATE(), tiempo) as dias from usuarios inner join prestamolibro on
                prestamolibro.idusuario=usuarios.idusuarios inner join libros on
                libros.idlibros=prestamolibro.idbook where activo=1 order by tiempo desc");
        }

        #funcion para el reporte de libros prestados
        public function reporte_prestamo(){

            return $reporte = $this->db->query("select * from usuarios inner join prestamolibro on
            prestamolibro.idusuario=usuarios.idusuarios inner join libros on
            libros.idlibros=prestamolibro.idbook where activo=1 order by tiempo asc");
        }

        public function reporte_prestamo_devuelto(){

            return $reporte = $this->db->query("select * from usuarios inner join prestamolibro on
            prestamolibro.idusuario=usuarios.idusuarios inner join libros on
            libros.idlibros=prestamolibro.idbook where activo=0");
        }
    }
?>