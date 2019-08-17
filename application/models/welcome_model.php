<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }



//=================================== HOME ===========================================================================        
//metodo para obtener los datos de la galeria principal
public function get_inicio() {

    $b = $this
        ->db
        ->where('noti_slide', ESTADO_ACTIVO)
        ->order_by("noti_fecha", "desc")
        ->get('noticia');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


public function get_all_galeria() {

    $b = $this
        ->db
        ->order_by("gapi_fecha", "desc")
        ->get('galeria_princiapal');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}

public function get_galeria_imagenes() {

    $b = $this
        ->db
        ->where('gaim_estado', ESTADO_ACTIVO)
        ->order_by("gaim_fecha", "desc")
        ->get('galeria_imagenes');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


//metodo para obtener los videos del home
public function get_videos() {

    $b = $this
        ->db
        ->where('vide_estado', ESTADO_ACTIVO)
        ->where('vide_principal', ESTADO_INACTIVO)
        ->order_by("vide_fecha", "desc")
        ->limit(3)
        ->get('video');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


//metodo para obtener el video principal del home
public function get_video_principal() {

    $b = $this
        ->db
        ->where('vide_estado', ESTADO_ACTIVO)
        ->where('vide_principal', ESTADO_ACTIVO)
        ->limit(1)
        ->get('video');
    
    if ($b->num_rows > 0) {
        return $b->row_array();
    }

    return false;
}

//metodo para obtener la totalidad de los videos
public function get_all_videos() {

    $b = $this
        ->db
        ->where('vide_estado', ESTADO_ACTIVO)
        ->order_by("vide_fecha", "desc")
        ->get('video');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


//metodo para obtener los integrantes del equipo
public function get_equipo() {

    $b = $this
        ->db
        ->where('equi_estado', ESTADO_ACTIVO)
        ->order_by("equi_orden", "asc")
        ->get('equipo');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


public function get_all_equipo() {
        $b = $this
            ->db
            ->order_by("equi_orden", "asc")
            ->get('equipo');
        
        if ($b->num_rows > 0) {
            return $b->result();
        }

        return false;
    }



//metodo para obtener las tarjetas de saludo
public function get_tarjeta_saludo() {

    $b = $this
        ->db
        ->order_by("tasa_id", "asc")
        ->where('tasa_estado', ESTADO_ACTIVO)
        ->get('tarjeta_saludo');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


public function get_all_tarjeta_saludo() {

    $b = $this
        ->db
        ->order_by("tasa_id", "asc")
        ->get('tarjeta_saludo');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}




//metodo para obtener los patrocinadores
public function get_patrocinadores() {

    $b = $this
        ->db
        ->where('patr_estado', ESTADO_ACTIVO)
        ->order_by("patr_id", "asc")
        ->get('patrocinador');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


public function get_all_patrocinadores() {

    $b = $this
        ->db
        ->order_by("patr_id", "asc")
        ->get('patrocinador');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}

//metodo para obtener las noticias del home
public function get_noticias_home() {

    $b = $this
        ->db
        ->where('noti_estado', ESTADO_ACTIVO)
        ->where('noti_slide', ESTADO_INACTIVO)
        ->order_by("noti_fecha", "desc")
        ->limit(2)
        ->get('noticia');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}

//metodo para obtener las noticias
public function get_noticias() {

    $b = $this
        ->db
        ->where('noti_estado', ESTADO_ACTIVO)
        ->order_by("noti_fecha", "desc")
        ->get('noticia');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


//--------------- Paginacion, retorna la cantidad de filas 
function get_filas_noticias(){
    $consulta = $this->db->get('noticia');
    return  $consulta->num_rows() ;
}


//obtenemos todas las provincias a paginar con la función
//total_posts_paginados pasando la cantidad por página y el segmento
//como parámetros de la misma
function total_paginados($por_pagina, $segmento){
    $consulta = $this
                ->db
                ->where('noti_estado', ESTADO_ACTIVO)
                ->order_by("noti_fecha", "desc")
                ->get('noticia',$por_pagina,$segmento);

    
    if($consulta->num_rows() > 0){
        foreach($consulta->result() as $fila){
            $data[] = $fila;
        }
        
        return $data;
    }
}


public function get_noticia_slug($slug = FALSE) {
        if ($slug === FALSE) {
            //Obtiene todos los registros desde la tabla noticia en orden descendente (del ultimo al primero)
            $query = $this->db->query("SELECT * FROM  `noticia` ORDER BY  `noticia`.`noti_slug` DESC ");
            //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
            return $query->result();
        }
        //Obtiene todos los registros desde la tabla noticia tomando como parametro la variable "$slug"
        $query = $this->db->get_where('noticia', array('noti_slug' => $slug));
        //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo    '];"
        return $query->row_array();
    }


//metodo para obtener las noticias
public function get_all_noticias() {

    $b = $this
        ->db
        ->order_by("noti_fecha", "desc")
        ->get('noticia');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}




//metodo para obtener las campañas
public function get_campanias() {

    $b = $this
        ->db
        ->where('camp_estado', ESTADO_ACTIVO)
        ->order_by("camp_fecha", "desc")
        ->get('campania');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}






public function get_video_slug($vide_slug = FALSE) {
    if ($vide_slug === FALSE) {
        //Obtiene todos los registros desde la tabla video en orden descendente (del ultimo al primero)
        $query = $this->db->query("SELECT * FROM  `video` ORDER BY  `video`.`vide_slug` DESC ");
        //Devuelve los resultados multimples de la consulta en version objetos, para imprimir se usa "echo $row->titulo;"
        return $query->result();
    }
    //Obtiene todos los registros desde la tabla video tomando como parametro la variable "$vide_slug"
    $query = $this->db->get_where('video', array('vide_slug' => $vide_slug));
    //Devuelve los resultados multiples de la consulta en version array, para imprimir se usa "echo $row['titulo    '];"
    return $query->row_array();
}



public function get_videos_otros($vide_slug) {

    //Busco todos los videos subidos, con estado activo excepto el video con slug.
    $sql = "SELECT * FROM  `video` WHERE vide_estado = ".ESTADO_ACTIVO." AND vide_slug <> \"$vide_slug\" ORDER BY  vide_fecha DESC ";
    $query = $this->db->query($sql);
       
    if ($query->num_rows > 0) {
        return $query->result();
    }

    return false;
}











public function get_all_galerias_imagenes() {

    $b = $this
        ->db
        ->order_by("gaim_fecha", "desc")
        ->get('galeria_imagenes');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}



public function get_galerias_imagenes_activas() {

    $b = $this
        ->db
        ->where('gaim_estado', ESTADO_ACTIVO)
        ->order_by("gaim_fecha", "desc")
        ->get('galeria_imagenes');
    
    if ($b->num_rows > 0) {
        return $b->result();
    }

    return false;
}


public function get_nombre_galeria_id($gaim_id){
    $sql = "SELECT gaim_titulo FROM  `galeria_imagenes` WHERE gaim_id = ".$gaim_id."";  
    $query = $this->db->query($sql);
    return $query->row_array();
}




//=================================== SESSION ADMIN ===========================================================================    
    //metodo para verificar el username y password del admin
    public function verify_user($nombre, $clave) {
        $q = $this
                ->db
                ->where('usua_login', $nombre)
                ->where('usua_password', $clave)
                ->limit(1)
                ->get('usuario');

        if ($q->num_rows > 0) {
            return $q->row();
        }
        return false;
    }
//=================================== FIN SESSION ADMIN ===========================================================================        
//=================================== LOGS ===========================================================================        


    function set_log($data){
        $query = $this->db->insert('log', $data);
        $id = $this->db->insert_id($query);
        return $id;
    }   


    function set_fin_log($data){
        $id = $data['log_id'];
        unset($data['log_id']);
        $this->db->where('log_id', $id);
        $this->db->update('log', $data);
    }

    function get_logs(){
        $data = $this->db->get('log');
        return $data->result();
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