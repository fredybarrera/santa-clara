<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }



    public function get_video_slug($slug = FALSE) {
        if ($slug === FALSE) {
            //Obtiene todos los registros desde la tabla video en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `video` ORDER BY  `video`.`vide_id` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla video tomando como parametro la variable "$slug"
        $query = $this->db->get_where('video', array('vide_slug' => $slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }


    public function update_video_inicio($datos) {
                
        if($datos['vide_principal'] == ESTADO_ACTIVO){
            $query = $this->db->query("UPDATE `video` 
            SET  `vide_principal` =  '".ESTADO_INACTIVO."'");
        }

        $id = $datos['vide_id'];
        $this->db->where('vide_id', $id);
        $this->db->update('video', $datos);
        return mysql_affected_rows();
    }


    public function set_nuevo_video($datos){
        return $this->db->insert('video', $datos);
    }

    public function set_imagen_galeria($datos){
        return $this->db->insert('galeria_princiapal', $datos);
    }


    



    public function get_galeria_id($gapi_id = FALSE) {
        if ($gapi_id === FALSE) {
            //Obtiene todos los registros desde la tabla galeria en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `galeria_princiapal` ORDER BY  `galeria_princiapal`.`gapi_id` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla galeria tomando como parametro la variable "$slug"
        $query = $this->db->get_where('galeria_princiapal', array('gapi_id' => $gapi_id));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }


    public function update_imagen_galeria($datos) {
        $id = $datos['gapi_id'];
        $this->db->where('gapi_id', $id);
        $this->db->update('galeria_princiapal', $datos);
        return mysql_affected_rows();
    }
    
    

 
    
    //================================================================== EQUIPO

    public function deleteFuncionario($equi_id){
        $this->db->where('equi_id', $equi_id);
        $this->db->delete('equipo');
        return mysql_affected_rows();
    }


    public function get_equipo_id($equi_id = FALSE) {
        if ($equi_id === FALSE) {
            //Obtiene todos los registros desde la tabla galeria en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `equipo` ORDER BY  `equipo`.`equi_id` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla galeria tomando como parametro la variable "$slug"
        $query = $this->db->get_where('equipo', array('equi_id' => $equi_id));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }



    public function update_equipo($datos) {
        $id = $datos['equi_id'];
        $this->db->where('equi_id', $id);
        $this->db->update('equipo', $datos);
        return mysql_affected_rows();
    }


    public function set_nuevo_equipo($datos){
        $this->db->select_max('equi_orden', 'maximo');
        $query = $this->db->get('equipo');
        $data = $query->row_array();
        $orden = $data['maximo'] + 1;
        $datos['equi_orden'] = $orden;
        return $this->db->insert('equipo', $datos);
    }


    //====================================================== TARJETA DE SALUDO

    public function set_tarjeta_saludo($datos){
        return $this->db->insert('tarjeta_saludo', $datos);
    }


    public function get_tarjeta_id($tasa_id = FALSE) {
        if ($tasa_id === FALSE) {
            //Obtiene todos los registros desde la tabla galeria en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `tarjeta_saludo` ORDER BY  `tarjeta_saludo`.`tasa_id` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla galeria tomando como parametro la variable "$slug"
        $query = $this->db->get_where('tarjeta_saludo', array('tasa_id' => $tasa_id));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }


    public function update_tarjeta_saludo($datos) {
        $id = $datos['tasa_id'];
        $this->db->where('tasa_id', $id);
        $this->db->update('tarjeta_saludo', $datos);
        return mysql_affected_rows();
    }





//================================================================== PATROCINADORES

    public function set_patrocinador($datos){
        return $this->db->insert('patrocinador', $datos);
    }


    public function get_patrocinador_id($patr_id = FALSE) {
        if ($patr_id === FALSE) {
            //Obtiene todos los registros desde la tabla patrocinador en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `patrocinador` ORDER BY  `patrocinador`.`patr_id` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla patrocinador tomando como parametro la variable "$slug"
        $query = $this->db->get_where('patrocinador', array('patr_id' => $patr_id));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }

    public function update_patrocinador($datos) {
        $id = $datos['patr_id'];
        $this->db->where('patr_id', $id);
        $this->db->update('patrocinador', $datos);
        return mysql_affected_rows();
    }






    //====================================================== NOTICIAS

    public function set_noticia($datos){
        $query = $this->db->insert('noticia', $datos);
        $id = $this->db->insert_id($query);
        return $id;
    }


    public function get_noticias_id($noti_id = FALSE) {
        if ($noti_id === FALSE) {
            //Obtiene todos los registros desde la tabla noticia en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `noticia` ORDER BY  `noticia`.`noti_id` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla noticia tomando como parametro la variable "$slug"
        $query = $this->db->get_where('noticia', array('noti_id' => $noti_id));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }


    public function get_noticias_slug($noti_slug = FALSE) {
        if ($noti_slug === FALSE) {
            //Obtiene todos los registros desde la tabla noticia en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `noticia` ORDER BY  `noticia`.`noti_slug` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla noticia tomando como parametro la variable "$slug"
        $query = $this->db->get_where('noticia', array('noti_slug' => $noti_slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }


    
    public function update_noticia($datos) {
        $id = $datos['noti_id'];
        $this->db->where('noti_id', $id);
        $this->db->update('noticia', $datos);
        return mysql_affected_rows();
    }
    


    public function get_carpeta($gaim_id){
        $query = $this->db->get_where('galeria_imagenes', array('gaim_id' => $gaim_id));
        return $query->row_array();
    }



    public function delete_galeria_imagenes($gaim_id){
        $this->db->where('gaim_id', $gaim_id);
        $this->db->delete('galeria_imagenes');
        return mysql_affected_rows();
    }



    public function set_nueva_galeria($datos){
        $query = $this->db->insert('galeria_imagenes', $datos);
        $id = $this->db->insert_id($query);
        return $id;
    }



    public function delete_galeria_noticia($gaim_id){
        $query = $this->db->get_where('noticia', array('gaim_id' => $gaim_id));
        $data = $query->row_array();
        
        if(!empty($data)){
            $noti_id = $data['noti_id'];
            $this->db->where('noti_id', $noti_id);
            $this->db->update('noticia', array('gaim_id' => null));
            return true;
        }else{
            return false;
        }
    }

    
     public function update_galeria($datos) {
        $id = $datos['gaim_carpeta'];
        $this->db->where('gaim_carpeta', $id);
        $this->db->update('galeria_imagenes', $datos);
        return mysql_affected_rows();
    }


    
public function get_galeria_imagen($gaim_carpeta = FALSE) {
        if ($gaim_carpeta === FALSE) {
            //Obtiene todos los registros desde la tabla noticia en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `galeria_imagenes` ORDER BY  `galeria_imagenes`.`gaim_id` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla noticia tomando como parametro la variable "$slug"
        $query = $this->db->get_where('galeria_imagenes', array('gaim_carpeta' => $gaim_carpeta));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }









/*
//=================================== INDEX ===========================================================================        
    //metodo para obtener los datos de la tabla inicio
    public function get_inicio() {

        $b = $this->db->get('inicio');
        
        if ($b->num_rows > 0) {
            return $b->result();
        }
        return false;
        
        
    }
    //metodo para actualizar los datos del index en la tabla "inicio" de la BD
    public function update_inicio($datos) {
        $id = 1;
        $this->db->where('id_inicio', $id);
        $this->db->update('inicio', $datos);
        return mysql_affected_rows();
    }

//=================================== FIN INDEX ===========================================================================        
//=================================== CAPACITACION WELCOME ===========================================================================            

    public function get_cap_limit(){
        $query = $this->db->query("SELECT *
            FROM  `capacitacion` 
            ORDER BY  `capacitacion`.`id_capacitacion` DESC 
            LIMIT 4");
        return $query->result();
    }
    
    public function get_cap_full(){
        $query = $this->db->query("SELECT * 
            FROM  `capacitacion` 
            ORDER BY  `capacitacion`.`id_capacitacion` DESC");
        return$query->result();
    }
    
    public function get_categorias(){
        $query = $this->db->query("select distinct `categoria` from `capacitacion`");
        return $query->result();
    }
    
    public function get_data_categorias($parametro){
        $query = $this->db->query("select * from `capacitacion` where `slug_categoria` = \"$parametro\" ");        
        return $query->result();
    }    
    
//=================================== FIN CAPACITACION WELCOME ===========================================================================        
//=================================== CAPACITACION ADMIN ===========================================================================            
//========== METODO (SLUG) =========================
    public function get_capacitaciones($slug = FALSE) {
        if ($slug === FALSE) {
            //Obtiene todos los registros desde la tabla capacitacion
            $query = $this->db->query("select * from capacitacion order by id_capacitacion desc");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla capacitacion tomando como parametro la variable "$slug"
        $query = $this->db->get_where('capacitacion', array('slug_capacitacion' => $slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }

//===========FIN METODO (SLUG) ====================
//metodo para insertar una nueva capacitacion en la tabla 'capacitacion' de la BD
    public function insert_capacitacion($datos) {
        return $this->db->insert('capacitacion', $datos);
    }

//metodo para actualizar datos en la tabla 'capacitacion' de la BD    
    public function update_capacitacion($datos) {
        $id = $datos['id_capacitacion'];
        $this->db->where('id_capacitacion', $id);
        $this->db->update('capacitacion', $datos);
        return mysql_affected_rows();
    }

//metodo para eliminar una capacitacion en la tabla 'capacitacion' de la BD
    public function delete_capacitacion($id) {
        $this->db->where('id_capacitacion', $id);
        $this->db->delete('capacitacion');
        return mysql_affected_rows();
    }

//=================================== FIN CAPACITACION ADMIN===========================================================================            
//=================================== CONSULTORIA ADMIN ===========================================================================            
//========= METODO (SLUG) ==========
    public function get_consultoria($slug = FALSE) {
        if ($slug === FALSE) {
            //Obtiene todos los registros desde la tabla capacitacion
            $query = $this->db->get('consultoria');
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla capacitacion tomando como parametro la variable "$slug"
        $query = $this->db->get_where('consultoria', array('slug_consultoria' => $slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }

//======= FIN METODO (SLUG) ========
    //metodo para insertar una nueva capacitacion en la tabla 'capacitacion' de la BD
    public function insert_consultoria($datos) {
        return $this->db->insert('consultoria', $datos);
    }

//metodo para actualizar datos en la tabla 'capacitacion' de la BD    
    public function update_consultoria($datos) {
        $id = $datos['id_consultoria'];
        $this->db->where('id_consultoria', $id);
        $this->db->update('consultoria', $datos);
        return mysql_affected_rows();
    }

//metodo para eliminar una capacitacion en la tabla 'capacitacion' de la BD
    public function delete_consultoria($id) {

        $this->db->where('id_consultoria', $id);
        $this->db->delete('consultoria');
        return mysql_affected_rows();
    }

//=================================== FIN CONSULTORIA ADMIN ===========================================================================            
//=================================== QUIENES SOMOS ADMIN ==============================================================================
    public function get_profesionales($slug = FALSE) {
        if ($slug === FALSE) {
            //Obtiene todos los registros desde la tabla capacitacion
            $query = $this
                    ->db
                    ->where('tipo_profesional', "equipo")
                    ->get('profesionales');
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla capacitacion tomando como parametro la variable "$slug"
        $query = $this->db->get_where('profesionales', array('slug_profesional' => $slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }
    
        public function get_staff($slug = FALSE) {
        if ($slug === FALSE) {
            //Obtiene todos los registros desde la tabla capacitacion
            $query = $this
                    ->db
                    ->where('tipo_profesional', "staff")
                    ->get('profesionales');
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla capacitacion tomando como parametro la variable "$slug"
        $query = $this->db->get_where('profesionales', array('slug_profesional' => $slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }
    
    public function get_all_profesionales($slug = FALSE) {
        if ($slug === FALSE) {
            //Obtiene todos los registros desde la tabla capacitacion
            $query = $this->db->get('profesionales');
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla capacitacion tomando como parametro la variable "$slug"
        $query = $this->db->get_where('profesionales', array('slug_profesional' => $slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }    
    
    //metodo para insertar un nuevo profesional en la tabla 'profesionales' de la BD
    public function insert_profesional($datos) {
        return $this->db->insert('profesionales', $datos);
    }

//metodo para actualizar datos en la tabla 'profesionales' de la BD    
    public function update_profesional($datos) {
        $id = $datos['id_profesional'];
        $this->db->where('id_profesional', $id);
        $this->db->update('profesionales', $datos);
        return mysql_affected_rows();
    }
    
    public function update_foto($datos){
        $id=$datos['id_profesional'];
        $foto=$datos['foto_profesional'];
        
        $query = $this->db->query("UPDATE `profesionales` 
            SET  `foto_profesional` =  '".$foto."'
            WHERE `id_profesional` = $id;");  
        
        return mysql_affected_rows();
    }

//metodo para eliminar un profesional en la tabla 'profesionales' de la BD
    public function delete_profesional($id) {

        $this->db->where('id_profesional', $id);
        $this->db->delete('profesionales');
        return mysql_affected_rows();
    }
//=================================== FIN QUIENES SOMOS ADMIN ===========================================================================            

//=================================== THINK TANK ADMIN ==============================================================================
    public function get_think_tank($slug = FALSE) {
        if ($slug === FALSE) {
            //Obtiene todos los registros desde la tabla capacitacion en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `think_tank` ORDER BY  `think_tank`.`id_think` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla capacitacion tomando como parametro la variable "$slug"
        $query = $this->db->get_where('think_tank', array('slug_think' => $slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo'];"
        return $query->row_array();
    }
    
    //metodo para insertar un nuevo profesional en la tabla 'profesionales' de la BD
    public function insert_think_tank($datos) {
        return $this->db->insert('think_tank', $datos);
    }

//metodo para actualizar datos en la tabla 'profesionales' de la BD    
    public function update_think_tank($datos) {
        $id = $datos['id_think'];
        $this->db->where('id_think', $id);
        $this->db->update('think_tank', $datos);
        return mysql_affected_rows();
    }

//metodo para eliminar un profesional en la tabla 'profesionales' de la BD
    public function delete_think_tank($id) {

        $this->db->where('id_think', $id);
        $this->db->delete('think_tank');
        return mysql_affected_rows();
    }
    
    //metodo para actualizar el nombre de la foto de la noticia (nombre y extension del archivo)
        public function update_foto_think($datos){
        $id=$datos['id_think'];
        $foto=$datos['foto_think'];
        
        $query = $this->db->query("UPDATE `think_tank` 
            SET  `foto_think` =  '".$foto."'
            WHERE `id_think` = $id;");  
        
        return mysql_affected_rows();
    }
    
    public function get_noticias(){
        $query = $this->db->query("select `slug_think`, `nombre_think` from `think_tank` order by `id_think` desc limit 8");
        return $query->result();
               
    }
//=================================== FIN THINK TANK ADMIN ===========================================================================                
    
    
//=====================================PAGINACION
    function filas(){
        $consulta = $this->db->get('think_tank');
        return $consulta->num_rows();
    }
    
    function total_paginados($por_pagina, $segmento){
//        $consulta = $this->db->get('think_tank', $por_pagina, $segmento);       
        $this->db->order_by('id_think', 'desc');
        $this->db->limit($por_pagina, $segmento);         
        $consulta = $this->db->get('think_tank');        
        
        if($consulta->num_rows()>0){
            foreach ($consulta->result() as $fila){
                $data[]=$fila;                
            }
            return $data;
        }
    }
//=====================================/PAGINACION
//=====================================TEXTOS LATERALES
    
    function get_textos(){
        $b = $this->db->get('textos_laterales');
        if ($b->num_rows > 0) {
            return $b->result();
        }
        return false;      
    }
    
    function update_textos($datos) {
        $id = 1;
        $this->db->where('id_texto_lateral', $id);
        $this->db->update('textos_laterales', $datos);
        return mysql_affected_rows();
    }


*/    




}