<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

 
    function __construct() {
        parent::__construct();
        //se inicia la sesion
        session_start();

        $this->load->library('ckeditor');
        $this->ckeditor->basePath = base_url().'js/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
                        array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Link','-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
                                                            );
        $this->ckeditor->config['language'] = 'es';
        $this->ckeditor->config['height'] = 300;
        $this->ckeditor->config['resize_maxHeight'] = 400;

        //se comprueba que la variable de sesion esté definida o sea distinta de NULL
        if (isset($_SESSION['username'])) {
            //si la variable de sesion esta definida o es distinta de NULL, verifico que sea igual de 'relatores'
            if ($_SESSION['username'] != 'admin') {
                //si la variable de sesion es igual a 'admin', destruyo la sesion y redirecciono al welcome
                session_destroy();
                die('Acceso no autorizado');
            }
        } else {
            //si la variable de sesion no está definida o es NULL, redirecciono al welcome
            die('Acceso no autorizado');
        }

       

        //si la variable de sesion es definida, no es NULL y es distinta de 'relatores', cargo el modelo y muestra el index del admin
        $this->load->model('admin_model');
        $this->load->model('welcome_model');
    }

//=================================== INDEX ===========================================================================                    
    function index() {
        $data['galeria'] = $this->welcome_model->get_all_galeria();
        $data['videos'] = $this->welcome_model->get_all_videos();
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/inicio.php');
        $this->load->view('template/footer.php');
    }

    function inicio() {
        $data['galeria'] = $this->welcome_model->get_all_galeria();
        $data['videos'] = $this->welcome_model->get_all_videos();
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/inicio.php');
        $this->load->view('template/footer.php');
    }


//========================================================== VIDEOS INDEX

    function inicio_editar_video($vide_slug) {
        if(!isset($vide_slug)){
            die('No se recibio el parametro del video');
        }
        
        $data['video_item'] = $this->admin_model->get_video_slug($vide_slug);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['video_item'])) {
            show_404();
        }
        
        $this->ckeditor->config['width'] = '520px';
        $this->ckeditor->config['height'] = '200px'; 
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/inicio_editar_video.php');
        $this->load->view('template/footer.php');
    }

    function nuevo_video() {        
        $this->ckeditor->config['width'] = '520px';
        $this->ckeditor->config['height'] = '200px'; 
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/nuevo_video.php');
        $this->load->view('template/footer.php');
    }


    function set_nuevo_video() {
        $clean = $this->quitar_tildes($this->input->post('vide_titulo'));
        $vide_slug = url_title($clean, 'dash', TRUE);

        $datos = array(
            'usua_id' => ADMINISTRADOR,
            'vide_titulo' => $this->input->post('vide_titulo'),
            'vide_link' => $this->input->post('vide_link'),
            'vide_contenido' => $this->input->post('vide_contenido'),
            'vide_estado' => $this->input->post('vide_estado'),
            'vide_principal' => $this->input->post('vide_principal'),
            'vide_slug' => $vide_slug
        );

        $respuesta = $this->admin_model->set_nuevo_video($datos);

        if ($respuesta == 1) {
            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "Video registrado correctamente";
            $data['continuar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        } else {
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo registrar el vídeo";
            $data['volver'] = "admin/nuevo_video/";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error');
            $this->load->view('template/footer');
        }
    }


  

    function update_video_inicio(){
        $clean = $this->quitar_tildes($this->input->post('vide_titulo'));
        $vide_slug = url_title($clean, 'dash', TRUE);
  
        $datos = array(
            'vide_id' => $this->input->post('vide_id'),
            'vide_titulo' => $this->input->post('vide_titulo'),
            'vide_link' => $this->input->post('vide_link'),
            'vide_contenido' => $this->input->post('vide_contenido'),
            'vide_estado' => $this->input->post('estado'),
            'vide_principal' => $this->input->post('vide_principal'),    
            'vide_slug' => $vide_slug
        );

        $this->admin_model->update_video_inicio($datos);
        
        $data['title'] = "Administrador - Fundación Santa Clara";
        $data['texto'] = "Video actualizado correctamente";
        $data['continuar'] = "admin/inicio_editar_video/".$vide_slug;

        $this->load->view('template/header', $data);
        $this->load->view('template/success');
        $this->load->view('template/footer');
    }


    //======================================================= VIDEOS INDEX


    function inicio_editar_galeria($gapi_id) {
        if(!isset($gapi_id)){
            die('No se recibio el id de la galería');
        }
        if(!is_numeric($gapi_id)){
            die('El id debe ser valor nuerico');
        }   
        
        $data['galeria_item'] = $this->admin_model->get_galeria_id($gapi_id);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['galeria_item'])) {
            show_404();
        }
        
        $this->ckeditor->config['width'] = '520px';
        $this->ckeditor->config['height'] = '200px'; 
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/inicio_editar_galeria.php');
        $this->load->view('template/footer.php');
    }


    function nueva_galeria() {
        $this->ckeditor->config['width'] = '520px';
        $this->ckeditor->config['height'] = '200px'; 
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/nueva_galeria.php');
        $this->load->view('template/footer.php');
    }



    public function do_upload() {

        //funcion para subir foto al servidor
        //preferencias de configuracion
        $this->load->helper('string');
        $this->load->helper('url');
    
        $image_name = $_FILES['userfile']['name'];

        //Valido que se selccione una imagen para cargar
        if(!empty($image_name)){
            $clean = $this->quitar_tildes($image_name);
            $image_name = url_title($clean, 'dash', TRUE);

            $rand = random_string('alnum', 16);
            $nombre_foto = $rand.'-'.$image_name;


            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5120';
            $config['file_name'] = $nombre_foto;

            //cargo la libreria "upload" y le paso los parametros definidos en "$config"
            $this->load->library('upload', $config);

            //Si  la funcion do_upload es falsa
            if (!$this->upload->do_upload()) {

                $error = array('error' => $this->upload->display_errors());
                $data['title'] = "Administrador - Fundación Santa Clara <br />";
                $data['texto'] = "No se pudo cambiar la foto de la galería";
                $data['errores'] = $error;
                $data['volver'] = "admin/inicio_editar_galeria/".$this->input->post('gapi_id');
                $data['cancelar'] = "admin";

                $this->load->view('template/header', $data);
                $this->load->view('template/error_upload');
                $this->load->view('template/footer');
            }else{
                $gapi_id = $this->input->post('gapi_id');
                $datos = array(
                    'gapi_id' => $this->input->post('gapi_id'),
                    'gapi_imagen' => $nombre_foto,
                    'gapi_estado' => $this->input->post('gapi_estado'),
                    'gapi_texto' => $this->input->post('gapi_texto'),
                );  

                $this->admin_model->update_imagen_galeria($datos);
                $data['title'] = "Administrador - Fundación Santa Clara";
                $data['texto'] = "Galería actualizada correctamente";
                $data['continuar'] = "admin/inicio_editar_galeria/".$gapi_id;

                $this->load->view('template/header', $data);
                $this->load->view('template/success');
                $this->load->view('template/footer');
            }

        }else{

            $data_galeria = $this->admin_model->get_galeria_id($this->input->post('gapi_id'));
            $nombre_foto = $data_galeria['gapi_imagen'];
        
            $gapi_id = $this->input->post('gapi_id');
            $datos = array(
                'gapi_id' => $this->input->post('gapi_id'),
                'gapi_imagen' => $nombre_foto,
                'gapi_estado' => $this->input->post('gapi_estado'),
                'gapi_texto' => $this->input->post('gapi_texto'),
            );

            $this->admin_model->update_imagen_galeria($datos);
            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "Galería actualizada correctamente";
            $data['continuar'] = "admin/inicio_editar_galeria/".$gapi_id;

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        }
    }






    public function upload_galeria() {

        //funcion para subir foto al servidor
        //preferencias de configuracion
        $this->load->helper('string');
        $this->load->helper('url');
    
        $image_name = $_FILES['userfile']['name'];

        //Valido que se selccione una imagen para cargar
        
        $clean = $this->quitar_tildes($image_name);
        $image_name = url_title($clean, 'dash', TRUE);

        $rand = random_string('alnum', 16);
        $nombre_foto = $rand.'-'.$image_name;


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5120';
        $config['file_name'] = $nombre_foto;

        //cargo la libreria "upload" y le paso los parametros definidos en "$config"
        $this->load->library('upload', $config);

        //Si  la funcion do_upload es falsa
        if (!$this->upload->do_upload()) {

            $error = array('error' => $this->upload->display_errors());
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo subir la imágen de la galería";
            $data['errores'] = $error;
            $data['volver'] = "admin/nueva_galeria/";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error_upload');
            $this->load->view('template/footer');
        }else{
            $gapi_id = $this->input->post('gapi_id');
            $datos = array(
                'usua_id' => ADMINISTRADOR,
                'gapi_imagen' => $nombre_foto,
                'gapi_estado' => $this->input->post('gapi_estado'),
                'gapi_texto' => $this->input->post('gapi_texto'),
            );  

            $this->admin_model->set_imagen_galeria($datos);
            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "Imágen subida correctamente";
            $data['continuar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        }        
    }



//========================================================================== EQUIPO


    public function equipo(){
        $data['equipo'] = $this->welcome_model->get_all_equipo();
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/equipo.php');
        $this->load->view('template/footer.php');
    }


    public function eliminar_equipo($equi_id){

        if(!isset($equi_id)){
            die('No se recibio el id del funcionario');
        }

        if(!is_numeric($equi_id)){
            die('El id debe ser valor nuerico');
        }   


        $respuesta = $this->admin_model->deleteFuncionario($equi_id);

        if ($respuesta == 1) {
            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "funcionario eliminado correctamente";
            $data['continuar'] = "admin/equipo";

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        } else {
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo eliminar el funcionario";
            $data['volver'] = "admin/equipo";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error');
            $this->load->view('template/footer');
        }
    }



    public function editar_equipo($equi_id){

        if(!isset($equi_id)){
            die('No se recibio el id del funcionario');
        }

        if(!is_numeric($equi_id)){
            die('El id debe ser valor nuerico');
        }   
        
        $data['equipo_item'] = $this->admin_model->get_equipo_id($equi_id);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['equipo_item'])) {
            show_404();
        }
        
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/editar_equipo.php');
        $this->load->view('template/footer.php');
    }



    public function update_equipo(){           
          
        $equi_id = $this->input->post('equi_id');
        $datos = array(
            'equi_id' => $this->input->post('equi_id'),
            'equi_nombre' => $this->input->post('equi_nombre'),
            'equi_cargo' => $this->input->post('equi_cargo'),
            'equi_estado' => ESTADO_ACTIVO
        );

        $this->admin_model->update_equipo($datos);
        
        $data['title'] = "Administrador - Fundación Santa Clara";
        $data['texto'] = "Funcionario actualizado correctamente";
        $data['continuar'] = "admin/editar_equipo/".$equi_id;

        $this->load->view('template/header', $data);
        $this->load->view('template/success');
        $this->load->view('template/footer');
    }


    public function nuevo_equipo() {
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/nuevo_equipo.php');
        $this->load->view('template/footer.php');
    }




    public function set_nuevo_equipo() {

        $datos = array(
            'usua_id' => ADMINISTRADOR,
            'equi_nombre' => $this->input->post('equi_nombre'),
            'equi_cargo' => $this->input->post('equi_cargo'),
            'equi_estado' => ESTADO_ACTIVO
        );

        $respuesta = $this->admin_model->set_nuevo_equipo($datos);

        if ($respuesta == 1) {
            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "Funcionario registrado correctamente";
            $data['continuar'] = "admin/equipo";

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        } else {
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo registrar al funcionario";
            $data['volver'] = "admin/nuevo_equipo/";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error');
            $this->load->view('template/footer');
        }
    }





    //-------------------------------------- TARJETAS DE SALUDO


    public function tarjetasSaludo(){
        $data['tarjetas'] = $this->welcome_model->get_all_tarjeta_saludo();
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/tarjeta_saludo.php');
        $this->load->view('template/footer.php');
    }


    public function nueva_tarjeta_saludo() {
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/nueva_tarjeta_saludo.php');
        $this->load->view('template/footer.php');
    }


    public function upload_tarjeta_saludo() {

        //funcion para subir foto al servidor
        //preferencias de configuracion
        $this->load->helper('string');
        $this->load->helper('url');
    
        $image_name = $_FILES['userfile']['name'];

        $clean = $this->quitar_tildes($image_name);
        $image_name = url_title($clean, 'dash', TRUE);

        $rand = random_string('alnum', 16);
        $nombre_foto = $rand.'-'.$image_name;


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5120';
        $config['file_name'] = $nombre_foto;

        //cargo la libreria "upload" y le paso los parametros definidos en "$config"
        $this->load->library('upload', $config);

        //Si  la funcion do_upload es falsa
        if (!$this->upload->do_upload()) {

            $error = array('error' => $this->upload->display_errors());
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo subir la imágen de la tarejeta de saludo";
            $data['errores'] = $error;
            $data['volver'] = "admin/nueva_tarjeta_saludo/";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error_upload');
            $this->load->view('template/footer');

        }else{

            $datos = array(                
                'usua_id' => ADMINISTRADOR,
                'tasa_imagen' => $nombre_foto,
                'tasa_titulo' => $this->input->post('tasa_titulo'),
                'tasa_texto'  => $this->input->post('tasa_texto'),
                'tasa_estado' => $this->input->post('tasa_estado'),
            );  
            
            $this->admin_model->set_tarjeta_saludo($datos);
            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] =  "Tarjeta de saludo creada correctamente";
            $data['continuar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        }
    }



    function editar_tarjeta_saludo($tasa_id) {
        if(!isset($tasa_id)){
            die('No se recibio el id de la tarjeta');
        }
        if(!is_numeric($tasa_id)){
            die('El id debe ser valor nuerico');
        }   
        
        $data['tarjeta_item'] = $this->admin_model->get_tarjeta_id($tasa_id);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['tarjeta_item'])) {
            show_404();
        }
        
        $this->ckeditor->config['width'] = '520px';
        $this->ckeditor->config['height'] = '200px'; 
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/editar_tarjeta_saludo.php');
        $this->load->view('template/footer.php');
    }


    public function do_upload_tarjeta_saludo() {

        //funcion para subir foto al servidor
        //preferencias de configuracion
        $this->load->helper('string');
        $this->load->helper('url');
    
        $image_name = $_FILES['userfile']['name'];

        //Valido que se selccione una imagen para cargar
        if(!empty($image_name)){
            $clean = $this->quitar_tildes($image_name);
            $image_name = url_title($clean, 'dash', TRUE);

            $rand = random_string('alnum', 16);
            $nombre_foto = $rand.'-'.$image_name;


            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5120';
            $config['file_name'] = $nombre_foto;

            //cargo la libreria "upload" y le paso los parametros definidos en "$config"
            $this->load->library('upload', $config);

            //Si  la funcion do_upload es falsa
            if (!$this->upload->do_upload()) {

                $error = array('error' => $this->upload->display_errors());
                $data['title'] = "Administrador - Fundación Santa Clara <br />";
                $data['texto'] = "No se pudo cambiar la foto de la tarjeta de saludo";
                $data['errores'] = $error;
                $data['volver'] = "admin/editar_tarjeta_saludo/".$this->input->post('tasa_id');
                $data['cancelar'] = "admin";

                $this->load->view('template/header', $data);
                $this->load->view('template/error_upload');
                $this->load->view('template/footer');
            }else{
                $tasa_id = $this->input->post('tasa_id');
                $datos = array(
                    'tasa_id' => $this->input->post('tasa_id'),
                    'tasa_imagen' => $nombre_foto,
                    'tasa_titulo' => $this->input->post('tasa_titulo'),
                    'tasa_texto' => $this->input->post('tasa_texto'),
                    'tasa_estado' => $this->input->post('tasa_estado'),
                );  

                $this->admin_model->update_tarjeta_saludo($datos);
                $data['title'] = "Administrador - Fundación Santa Clara";
                $data['texto'] = "Tarjeta de saludo actualizada correctamente";
                $data['continuar'] = "admin/editar_tarjeta_saludo/".$tasa_id;

                $this->load->view('template/header', $data);
                $this->load->view('template/success');
                $this->load->view('template/footer');
            }

        }else{

            $data_tarjeta = $this->admin_model->get_tarjeta_id($this->input->post('tasa_id'));
            $nombre_foto = $data_tarjeta['tasa_imagen'];
        
            $tasa_id = $this->input->post('tasa_id');
            $datos = array(
                'tasa_id' => $this->input->post('tasa_id'),
                'tasa_imagen' => $nombre_foto,
                'tasa_titulo' => $this->input->post('tasa_titulo'),
                'tasa_texto' => $this->input->post('tasa_texto'),
                'tasa_estado' => $this->input->post('tasa_estado'),
            );

            $this->admin_model->update_tarjeta_saludo($datos);
            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "Tarjeta de saludo actualizada correctamente";
            $data['continuar'] = "admin/editar_tarjeta_saludo/".$tasa_id;

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        }
    }



    //------------------------------------------------------------ PATROCINADORES

    public function patrocinadores(){
        $data['patrocinadores'] = $this->welcome_model->get_all_patrocinadores();
        $data['title'] = "Patrocinadores - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/patrocinadores.php');
        $this->load->view('template/footer.php');
    }

    
    public function nuevo_patrocinador() {
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/nuevo_patrocinador.php');
        $this->load->view('template/footer.php');
    }


    public function upload_patrocinador() {

        //funcion para subir foto al servidor
        //preferencias de configuracion
        $this->load->helper('string');
        $this->load->helper('url');
    
        $image_name = $_FILES['userfile']['name'];

        $clean = $this->quitar_tildes($image_name);
        $image_name = url_title($clean, 'dash', TRUE);

        $rand = random_string('alnum', 16);
        $nombre_foto = $rand.'-'.$image_name;


        $config['upload_path'] = './images/tmp/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5120';
        $config['file_name'] = $nombre_foto;

        
        //cargo la libreria "upload" y le paso los parametros definidos en "$config"
        $this->load->library('upload', $config);

        //Si  la funcion do_upload es falsa
        if (!$this->upload->do_upload()) {

            $error = array('error' => $this->upload->display_errors());
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo subir la imágen del patrocinador";
            $data['errores'] = $error;
            $data['volver'] = "admin/nuevo_patrocinador/";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error_upload');
            $this->load->view('template/footer');

        }else{

            //Redimensiono la imagen
            $config['image_library'] = 'gd2';
            $config['source_image'] = './images/tmp/'.$nombre_foto;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 265;
            $config['height'] = 231;
            $config['new_image'] = './images/'.$nombre_foto;
            $config['quality'] = 100;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if (!$this->image_lib->resize()) {
                $error = array('error' => $this->image_lib->display_errors());
                $data['title'] = "Administrador - Fundación Santa Clara <br />";
                $data['texto'] = "No se pudo subir la imágen del patrocinador";
                $data['errores'] = $error;
                $data['volver'] = "admin/nuevo_patrocinador/";
                $data['cancelar'] = "admin";

                $this->load->view('template/header', $data);
                $this->load->view('template/error_upload');
                $this->load->view('template/footer');       

            }else{

                $file = "./images/tmp/".$nombre_foto;
                unlink($file);

                $datos = array(                
                    'usua_id' => ADMINISTRADOR,
                    'patr_imagen' => $nombre_foto,
                    'patr_url' => $this->input->post('patr_url'),
                    'patr_estado'  => $this->input->post('patr_estado')
                );  
                
                $this->admin_model->set_patrocinador($datos);
                $data['title'] = "Administrador - Fundación Santa Clara";
                $data['texto'] =  "Patrocinador registrado correctamente";
                $data['continuar'] = "admin";

                $this->load->view('template/header', $data);
                $this->load->view('template/success');
                $this->load->view('template/footer');
            }
        }
    }


    
    function editar_patrocinador($patr_id) {
        if(!isset($patr_id)){
            die('No se recibio el id de la tarjeta');
        }
        if(!is_numeric($patr_id)){
            die('El id debe ser valor nuerico');
        }   
        
        $data['patrocinador_item'] = $this->admin_model->get_patrocinador_id($patr_id);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['patrocinador_item'])) {
            show_404();
        }
         
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/editar_patrocinador.php');
        $this->load->view('template/footer.php');
    }

    
    public function do_upload_patrocinador() {

        //funcion para subir foto al servidor
        //preferencias de configuracion
        $this->load->helper('string');
        $this->load->helper('url');
    
        $image_name = $_FILES['userfile']['name'];

        //Valido que se selccione una imagen para cargar
        if(!empty($image_name)){
            $clean = $this->quitar_tildes($image_name);
            $image_name = url_title($clean, 'dash', TRUE);

            $rand = random_string('alnum', 16);
            $nombre_foto = $rand.'-'.$image_name;


            $config['upload_path'] = './images/tmp/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5120';
            $config['file_name'] = $nombre_foto;

            //cargo la libreria "upload" y le paso los parametros definidos en "$config"
            $this->load->library('upload', $config);

            //Si  la funcion do_upload es falsa
            if (!$this->upload->do_upload()) {

                $error = array('error' => $this->upload->display_errors());
                $data['title'] = "Administrador - Fundación Santa Clara <br />";
                $data['texto'] = "No se pudo cambiar la foto del patrocinador";
                $data['errores'] = $error;
                $data['volver'] = "admin/editar_patrocinador/".$this->input->post('patr_id');
                $data['cancelar'] = "admin";

                $this->load->view('template/header', $data);
                $this->load->view('template/error_upload');
                $this->load->view('template/footer');
            }else{

                //Redimensiono la imagen
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/tmp/'.$nombre_foto;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 86;
                $config['height'] = 75;
                $config['new_image'] = './images/'.$nombre_foto;
                $config['quality'] = 100;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                if (!$this->image_lib->resize()) {
                    $error = array('error' => $this->image_lib->display_errors());
                    $data['title'] = "Administrador - Fundación Santa Clara <br />";
                    $data['texto'] = "No se pudo subir la imágen del patrocinador";
                    $data['errores'] = $error;
                    $data['volver'] = "admin/nuevo_patrocinador/";
                    $data['cancelar'] = "admin";

                    $this->load->view('template/header', $data);
                    $this->load->view('template/error_upload');
                    $this->load->view('template/footer');       

                }else{

                    //Elimino el tmp de la imagen original
                    $file = "./images/tmp/".$nombre_foto;
                    unlink($file);

                    $patr_id = $this->input->post('patr_id');
                    $datos = array(
                        'patr_id' => $this->input->post('patr_id'),
                        'patr_imagen' => $nombre_foto,
                        'patr_url' => $this->input->post('patr_url'),
                        'patr_estado' => $this->input->post('patr_estado'),
                    );  

                    $this->admin_model->update_patrocinador($datos);
                    $data['title'] = "Administrador - Fundación Santa Clara";
                    $data['texto'] = "Patrocinador actualizado correctamente";
                    $data['continuar'] = "admin/editar_patrocinador/".$patr_id;

                    $this->load->view('template/header', $data);
                    $this->load->view('template/success');
                    $this->load->view('template/footer');
                }
            }

        }else{

            $data_patrocinador = $this->admin_model->get_patrocinador_id($this->input->post('patr_id'));
            $nombre_foto = $data_patrocinador['patr_imagen'];
        
            $patr_id = $this->input->post('patr_id');
            $datos = array(
                'patr_id' => $this->input->post('patr_id'),
                'patr_imagen' => $nombre_foto,
                'patr_url' => $this->input->post('patr_url'),
                'patr_estado' => $this->input->post('patr_estado'),
            );

            $this->admin_model->update_patrocinador($datos);
            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "Patrocinador actualizado correctamente";
            $data['continuar'] = "admin/editar_patrocinador/".$patr_id;

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        }
    }



    //------------------------------------------------------------ NOTICIAS

    public function noticias(){
        $this->load->helper('text');
        $data['noticias'] = $this->welcome_model->get_all_noticias();
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/noticias.php');
        $this->load->view('template/footer.php');
    }



    public function nueva_noticia() {
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/nueva_noticia.php');
        $this->load->view('template/footer.php');
    }


    public function upload_noticia() {

        //funcion para subir foto al servidor
        //preferencias de configuracion
        $this->load->helper('string');
        $this->load->helper('url');
    
        $image_name = $_FILES['userfile']['name'];

        $clean = $this->quitar_tildes($image_name);
        $image_name = url_title($clean, 'dash', TRUE);

        $rand = random_string('alnum', 16);
        $nombre_foto = $rand.'-'.$image_name;


        $config['upload_path'] = './images/noticias/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5120';
        $config['file_name'] = $nombre_foto;

        //cargo la libreria "upload" y le paso los parametros definidos en "$config"
        $this->load->library('upload', $config);

        //Si  la funcion do_upload es falsa
        if (!$this->upload->do_upload()) {

            $error = array('error' => $this->upload->display_errors());
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo subir la imágen de la noticia";
            $data['errores'] = $error;
            $data['volver'] = "admin/nueva_noticia/";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error_upload');
            $this->load->view('template/footer');

        }else{


            $titulo_limpio = $this->quitar_tildes($this->input->post('noti_titulo'));
            $slug = url_title($titulo_limpio, 'dash', TRUE);

            $datos = array(                
                'usua_id' => ADMINISTRADOR,
                'noti_titulo' => $this->input->post('noti_titulo'),
                'noti_slug' => $slug,
                'noti_contenido'  => $this->input->post('noti_contenido'),
                'noti_imagen' => $nombre_foto,
                'noti_estado' => $this->input->post('noti_estado'),
                'noti_slide' => $this->input->post('noti_slide')
            );  
            
            $noti_id = $this->admin_model->set_noticia($datos);


            $opcion_galeria = $this->quitar_tildes($this->input->post('noti_galeria'));

            switch ($opcion_galeria) {
                case 'crear':
                        
                    redirect('admin/crear_galeria_noticia/'.$noti_id);

                break;

                case 'relacionar':

                    $gaim_id = $this->input->post('id_galeria');
                    $respuesta = $this->admin_model->update_noticia(array('noti_id' => $noti_id, 'gaim_id' => $gaim_id));

                    if ($respuesta == 1) {

                        $data['title'] = "Administrador - Fundación Santa Clara";
                        $data['texto'] =  "Noticia creada correctamente";
                        $data['continuar'] = "admin/noticias";

                        $this->load->view('template/header', $data);
                        $this->load->view('template/success');
                        $this->load->view('template/footer');

                    } else {
                        $data['title'] = "Administrador - Fundación Santa Clara <br />";
                        $data['texto'] = "No se pudo registrar la galería";
                        $data['volver'] = "admin/noticias/";
                        $data['cancelar'] = "admin";

                        $this->load->view('template/header', $data);
                        $this->load->view('template/error');
                        $this->load->view('template/footer');
                    }          
                    
                break;
                
                default:
                    $data['title'] = "Administrador - Fundación Santa Clara";
                    $data['texto'] =  "Noticia creada correctamente";
                    $data['continuar'] = "admin/noticias";

                    $this->load->view('template/header', $data);
                    $this->load->view('template/success');
                    $this->load->view('template/footer');
                break;
            }
        }
    }

    
    function editar_noticia($noti_slug) {
        if(!isset($noti_slug)){
            die('No se recibio el id de la noticia');
        }
        
        $data['noticias_item'] = $this->admin_model->get_noticias_slug($noti_slug);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['noticias_item'])) {
            show_404();
        }
         
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/editar_noticia.php');
        $this->load->view('template/footer.php');
    }

    
    function do_upload_noticia() {

        //funcion para subir foto al servidor
        //preferencias de configuracion
        $this->load->helper('string');
        $this->load->helper('url');
    
        $image_name = $_FILES['userfile']['name'];

        //Valido que se selccione una imagen para cargar
        if(!empty($image_name)){
            $clean = $this->quitar_tildes($image_name);
            $image_name = url_title($clean, 'dash', TRUE);

            $rand = random_string('alnum', 16);
            $nombre_foto = $rand.'-'.$image_name;


            $config['upload_path'] = './images/noticias/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5120';
            $config['file_name'] = $nombre_foto;

            //cargo la libreria "upload" y le paso los parametros definidos en "$config"
            $this->load->library('upload', $config);

            //Si  la funcion do_upload es falsa
            if (!$this->upload->do_upload()) {

                $error = array('error' => $this->upload->display_errors());
                $data['title'] = "Administrador - Fundación Santa Clara <br />";
                $data['texto'] = "No se pudo cambiar la foto de la noticia";
                $data['errores'] = $error;
                $data['volver'] = "admin/editar_noticia/".$this->input->post('noti_id');
                $data['cancelar'] = "admin";

                $this->load->view('template/header', $data);
                $this->load->view('template/error_upload');
                $this->load->view('template/footer');
            }else{
                $noti_id = $this->input->post('noti_id');
                $titulo_limpio = $this->quitar_tildes($this->input->post('noti_titulo'));
                $slug = url_title($titulo_limpio, 'dash', TRUE);

                $$noti_galeria = $this->input->post('noti_galeria');
                $id_galeria = $this->input->post('id_galeria');

                $datos = array(
                    'noti_id' => $this->input->post('noti_id'),
                    'noti_titulo' => $this->input->post('noti_titulo'),
                    'noti_slug' => $slug,
                    'noti_contenido' => $this->input->post('noti_contenido'),
                    'noti_imagen' => $nombre_foto,
                    'noti_estado' => $this->input->post('noti_estado'),
                    'noti_slide' => $this->input->post('noti_slide'),
                );  

                if($noti_galeria == 'relacionar'){
                    $datos['gaim_id'] = $id_galeria;
                }

                if($noti_galeria == 'nada'){
                    $datos['gaim_id'] = null;
                }

                $this->admin_model->update_noticia($datos);
                
                //Si decide crear una galeria para la noticia, redirecciono a la pagina de creacion de galeria
                if($noti_galeria == 'crear'){
                     redirect('admin/crear_galeria_noticia/'.$noti_id);
                }

                $data['title'] = "Administrador - Fundación Santa Clara";
                $data['texto'] = "Noticia actualizada correctamente";
                $data['continuar'] = "admin/editar_noticia/".$slug;

                $this->load->view('template/header', $data);
                $this->load->view('template/success');
                $this->load->view('template/footer');
            }

        }else{

            $noti_id = $this->input->post('noti_id');

            $data_noticia = $this->admin_model->get_noticias_id($noti_id);
            $nombre_foto = $data_noticia['noti_imagen'];

            $titulo_limpio = $this->quitar_tildes($this->input->post('noti_titulo'));
            $slug = url_title($titulo_limpio, 'dash', TRUE);


            $noti_galeria = $this->input->post('noti_galeria');
            $id_galeria = $this->input->post('id_galeria');

            $datos = array(
                'noti_id' => $noti_id,
                'noti_titulo' => $this->input->post('noti_titulo'),
                'noti_slug' => $slug,
                'noti_contenido' => $this->input->post('noti_contenido'),
                'noti_imagen' => $nombre_foto,
                'noti_estado' => $this->input->post('noti_estado'),
                'noti_slide' => $this->input->post('noti_slide'),
            );

            if($noti_galeria == 'relacionar'){
                $datos['gaim_id'] = $id_galeria;
            }

            if($noti_galeria == 'nada'){
                $datos['gaim_id'] = null;
            }
     
            $this->admin_model->update_noticia($datos);

            //Si decide crear una galeria para la noticia, redirecciono a la pagina de creacion de galeria
            if($noti_galeria == 'crear'){
                 redirect('admin/crear_galeria_noticia/'.$noti_id);
            }

            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "Noticia actualizada correctamente";
            $data['continuar'] = "admin/editar_noticia/".$slug;

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        }
    }



//------------------------------------------------------------ NOTICIAS

//------------------------------------------------------------ GALERIAS


    public function galeria(){
        $this->load->helper('text');
        $data['imagenes'] = $this->welcome_model->get_all_galerias_imagenes();
        $data['title'] = "Administrador - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/galerias.php');
        $this->load->view('template/footer.php');
    }



    public function editar_galeria($gaim_carpeta = false){
        if(!$gaim_carpeta){
            die('No se recibio el nombre de la carpeta');
        }
        $data['galeria_item'] = $this->admin_model->get_galeria_imagen($gaim_carpeta);
        $this->load->helper('text');
        $data['title'] = "Administrador - Fundación Santa Clara";
        $_SESSION['carpeta'] = $gaim_carpeta;
        $this->load->view('template/header.php', $data);
        $this->load->view('admin/galeria.php');
        $this->load->view('template/footer.php');
    }



    public function eliminar_galeria($gaim_id = false){
        
        if(!$gaim_id){
            die('No se recibio el id de la galeria');
        }
        
        if(!is_numeric($gaim_id)){
            die('El id debe ser valor nuerico');
        }

        $objCarpeta = $this->admin_model->get_carpeta($gaim_id);
        $carpeta = $objCarpeta['gaim_carpeta'];

        //Elimino la relacion con la noticia si es que la tuviera.
        $this->admin_model->delete_galeria_noticia($gaim_id);
        $respuesta = $this->admin_model->delete_galeria_imagenes($gaim_id);


        if ($respuesta == 1) {

            //Creo el path de la carpeta y la elimino
            $ruta_directorio="server/php/files/".$carpeta;            
            $this->rrmdir($ruta_directorio);

            $data['title'] = "Administrador - Fundación Santa Clara";
            $data['texto'] = "Galería eliminada correctamente";
            $data['continuar'] = "admin/galeria";

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        } else {
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo eliminar la gelría";
            $data['volver'] = "admin/galeria";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error');
            $this->load->view('template/footer');
        }
    }




    public function crear_galeria_noticia($noti_id = false){

        if(!$noti_id){
            die('No se recibio el id de la noticia');
        }

        $data['title'] = "Administrador - Fundación Santa Clara";
        $data['noti_id'] = $noti_id;
                    
        $this->load->view('template/header', $data);
        $this->load->view('admin/crear_galeria');
        $this->load->view('template/footer');
    }


    public function set_galeria_noticia(){

        $noti_id = $this->input->post('noti_id');
        $this->load->helper('string');
        $rand = random_string('numeric', 10);
        $nombre_carpeta = 'folder_'.mb_strtolower($rand);

        $datos = array(
            'gaim_titulo' => $this->input->post('gaim_titulo'),
            'gaim_descripcion' => $this->input->post('gaim_descripcion'),
            'gaim_carpeta' => $nombre_carpeta,
            'gaim_estado' => $this->input->post('gaim_estado'),
        );

        $gaim_id = $this->admin_model->set_nueva_galeria($datos);
        $respuesta = $this->admin_model->update_noticia(array('noti_id' => $noti_id, 'gaim_id' => $gaim_id));

        if ($respuesta == 1) {

            redirect('admin/editar_galeria/'.$nombre_carpeta);    

        } else {
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo registrar la galería";
            $data['volver'] = "admin/noticias/";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error');
            $this->load->view('template/footer');
        }

    }



    public function relacionar_galeria_noticia(){
        $data['title'] = "Administrador - Fundación Santa Clara";
                    
        $this->load->view('template/header', $data);
        $this->load->view('admin/relacionar_galeria');
        $this->load->view('template/footer');
    }




    public function crear_nueva_galeria_noticia(){

        $data['title'] = "Administrador - Fundación Santa Clara";
                    
        $this->load->view('template/header', $data);
        $this->load->view('admin/crear_nueva_galeria.php');
        $this->load->view('template/footer');
    }



    public function set_nueva_galeria(){
        
        $this->load->helper('string');
        $rand = random_string('numeric', 10);
        $nombre_carpeta = 'folder_'.mb_strtolower($rand);

        $datos = array(
            'gaim_titulo' => $this->input->post('gaim_titulo'),
            'gaim_descripcion' => $this->input->post('gaim_descripcion'),
            'gaim_carpeta' => $nombre_carpeta,
            'gaim_estado' => $this->input->post('gaim_estado'),
        );

        $gaim_id = $this->admin_model->set_nueva_galeria($datos);

        if ($gaim_id) {

            redirect('admin/editar_galeria/'.$nombre_carpeta);    

        } else {
            $data['title'] = "Administrador - Fundación Santa Clara <br />";
            $data['texto'] = "No se pudo registrar la galería";
            $data['volver'] = "admin/noticias/";
            $data['cancelar'] = "admin";

            $this->load->view('template/header', $data);
            $this->load->view('template/error');
            $this->load->view('template/footer');
        }

    }


function update_galeria(){
        $clean = $this->quitar_tildes($this->input->post('vide_titulo'));
        $vide_slug = url_title($clean, 'dash', TRUE);
  
        $datos = array(
            'gaim_titulo' => $this->input->post('gaim_titulo'),
            'gaim_descripcion' => $this->input->post('gaim_descripcion'),
            'gaim_imagen' => $this->input->post('gaim_imagen'),
            'gaim_estado' => $this->input->post('gaim_estado'),
            'gaim_carpeta' => $this->input->post('gaim_carpeta'),
        );

        $this->admin_model->update_galeria($datos);
        
        $data['title'] = "Administrador - Fundación Santa Clara";
        $data['texto'] = "Galeria actualizada correctamente";
        $data['continuar'] = "admin/galeria/";

        $this->load->view('template/header', $data);
        $this->load->view('template/success');
        $this->load->view('template/footer');
    }





    





    



    



    



    
    




















//=================================== CAPACITACION ===========================================================================                















/*

    function capacitacion() {
        //a la variable $data['inicio'] le asigno el resultado del metodo 'get_inicio' del modelo 'admin_model'
        $data['datos'] = $this->admin_model->get_capacitaciones();
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Capacitaciones";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/capacitacion', $data);
        $this->load->view('templates/footer');
    }

    public function view_capacitacion($slug) {
        //Le asigno a la variable "$data['capacitacion_item']" el resultado del metodo "get_capacitaciones" del modelo "admin_model"
        $data['capacitacion_item'] = $this->admin_model->get_capacitaciones($slug);
        //Si la variable "$data['capacitacion_item']" está vacia, muestro la página de error 404
        if (empty($data['capacitacion_item'])) {
            show_404();
        }
        $data['title'] = $data['capacitacion_item']['nombre_capacitacion'];
        $data['hola'] = "Hola $_SESSION[username]";
        $data['cap'] = $this->admin_model->get_categorias();
        $this->load->view('templates/head', $data);
        $this->load->view('admin/view', $data);
        $this->load->view('templates/footer');
    }

    function nueva_capacitacion() {
        //metodo para presentar un formulario de registro de nueva capacitacion
        $data['hola'] = "Hola $_SESSION[username]";
        $data['cap'] = $this->admin_model->get_categorias();
        $data['title'] = "Administrador - Nueva capacitacion";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/nueva_capacitacion', $data);
        $this->load->view('templates/footer');
    }

//=================================== FIN CAPACITACION ===========================================================================            
//=================================== CONSULTORIA ================================================================================            
    function consultoria() {
        //a la variable $data['inicio'] le asigno el resultado del metodo 'get_inicio' del modelo 'admin_model'
        $data['datos'] = $this->admin_model->get_consultoria();
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Consultoria";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/consultoria', $data);
        $this->load->view('templates/footer');
    }

    public function view_consultoria($slug) {
        //Le asigno a la variable "$data['capacitacion_item']" el resultado del metodo "get_consultoria" del modelo "admin_model"
        $data['consultoria_item'] = $this->admin_model->get_consultoria($slug);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['consultoria_item'])) {
            show_404();
        }
        $data['title'] = $data['consultoria_item']['nombre_consultoria'];
        $data['hola'] = "Hola $_SESSION[username]";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_consultoria', $data);
        $this->load->view('templates/footer');
    }

    function nueva_consultoria() {
        //metodo para presentar un formulario de registro de nueva consultoria
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Nueva consultoria";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/nueva_consultoria', $data);
        $this->load->view('templates/footer');
    }

//=================================== FIN CONSULTORIA ===========================================================================            
//=================================== QUIENES SOMOS ===========================================================================                
    function quienes_somos() {
        //a la variable $data['inicio'] le asigno el resultado del metodo 'get_inicio' del modelo 'admin_model'
        $data['datos'] = $this->admin_model->get_all_profesionales();
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Quienes Somos";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/quienes_somos', $data);
        $this->load->view('templates/footer');
    }

    public function view_profesional($slug) {
        //Le asigno a la variable "$data['capacitacion_item']" el resultado del metodo "get_consultoria" del modelo "admin_model"
        $data['profesional_item'] = $this->admin_model->get_profesionales($slug);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['profesional_item'])) {
            show_404();
        }
        $data['title'] = $data['profesional_item']['nombre_profesional'];
        $data['hola'] = "Hola $_SESSION[username]";
        $data['error'] = '';

        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_profesional', $data);
        $this->load->view('templates/footer');
    }

    function nuevo_profesional() {
        //metodo para presentar un formulario de registro de un nuevo profesional
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Nuevo profesional";
        $data['error'] = '';

        $this->load->view('templates/head', $data);
        $this->load->view('admin/nuevo_profesional', $data);
        $this->load->view('templates/footer');
    }

//=================================== FIN QUIENES SOMOS ===========================================================================                
//=================================== THINK TANK ===========================================================================                    
    function think_tank() {
        //a la variable $data['inicio'] le asigno el resultado del metodo 'get_inicio' del modelo 'admin_model'
        $data['datos'] = $this->admin_model->get_think_tank();
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Think Tank";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/think_tank', $data);
        $this->load->view('templates/footer');
    }

    public function view_think_tank($slug) {
        //Le asigno a la variable "$data['capacitacion_item']" el resultado del metodo "get_consultoria" del modelo "admin_model"
        $data['think_item'] = $this->admin_model->get_think_tank($slug);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['think_item'])) {
            show_404();
        }
        $data['title'] = $data['think_item']['nombre_think'];
        $data['hola'] = "Hola $_SESSION[username]";
        $data['error'] = '';
        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_think_tank', $data);
        $this->load->view('templates/footer');
    }

    function nuevo_think_tank() {
        //metodo para presentar un formulario de registro de un nuevo profesional
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Nuevo Think Tank";
        $data['error'] = '';

        $this->load->view('templates/head', $data);
        $this->load->view('admin/nuevo_think_tank', $data);
        $this->load->view('templates/footer');
    }

//=================================== FIN THINK TANK ===========================================================================                    

    function textos_laterales() {
        $data['datos'] = $this->admin_model->get_textos();
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Textos laterales";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/textos_laterales', $data);
        $this->load->view('templates/footer');
    }

    function relatores() {
        $data['datos'] = $this->cursos_model->get_userdata();
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Cursos Sence";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/relatores', $data);
        $this->load->view('templates/footer');
    }

    function sence() {
        $id = $this->input->post('id');
        $data['datos'] = $this->cursos_model->get_data($id);
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Cursos relatores";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/sence', $data);
        $this->load->view('templates/footer');
    }

    function curriculum() {
        $data['datos'] = $this->user_model->get_user_cv();
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Curriculum";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/curriculum', $data);
        $this->load->view('templates/footer');
    }

    function view_curriculum() {
        $rut = $this->input->post('rut');
        $data['rut'] = $rut;
        $data['datos'] = $this->user_model->get_data($rut);
        $data['titulos'] = $this->user_model->get_titulos($rut);
        $data['exp'] = $this->user_model->get_experiencias($rut);
        $data['academico'] = $this->user_model->get_academicos($rut);
        $data['ref'] = $this->user_model->get_referencias($rut);
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Cursos relatores";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_curriculum', $data);
        $this->load->view('templates/footer');
    }

    function btsa() {
        $data['datos'] = $this->btsa_model->get_btsa();
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - BTSA";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/btsa');
        $this->load->view('templates/footer');
    }

    function view_btsa() {
        $rut = $this->input->post('rut');
        $data['rut'] = $rut;
        $data['datos'] = $this->btsa_model->get_btsa_user($rut);
        $data['modo1'] = $this->btsa_model->result_modo1($rut);
        $data['modo2'] = $this->btsa_model->result_modo2($rut);
        $data['modo3'] = $this->btsa_model->result_modo3($rut);
        $data['modo4'] = $this->btsa_model->result_modo4($rut);
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - BTSA";

        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_btsa');
        $this->load->view('templates/footer');
    }

    function free_btsa() {
        $rut = $this->input->post('rut');
        $res = $this->btsa_model->delete_btsa($rut);
        if ($res > 0) {
            $data['hecho'] = "Test BTSA eliminado correctamente";
            $this->load->view('templates/head', $data);
            $this->load->view('admin/error');
            $this->load->view('templates/footer');
        } else {
            $data['hecho'] = "Test BTSA ya se eliminó anteriormente";
            $this->load->view('templates/head', $data);
            $this->load->view('admin/error');
            $this->load->view('templates/footer');
        }
    }

    function neuro() {
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Neuro competencias";
        $data['neuro'] = $this->neuro_model->get_neuros();
        $this->load->view('templates/head', $data);
        $this->load->view('admin/neuro');
        $this->load->view('templates/footer');
    }

    function view_neuro() {
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Neuro competencias";
        $id = $this->input->post('id');
        $user = $this->input->post('user');
        $empresa = $this->input->post('empresa');
        $cargo = $this->input->post('cargo');
        $tipo = $this->input->post('tipo');
        $data['datos'] = array(
            'user' => $user,
            'empresa' => $empresa,
            'cargo' => $cargo,
            'id' => $id,
            'tipo' => $tipo
        );
        $data['competencias'] = $this->neuro_model->get_comp($id);
        $data['bloqueadores'] = $this->neuro_model->get_bloq($id);
        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_neuro');
        $this->load->view('templates/footer');
    }

    function export_pdf() {
        $id = $this->input->post('id');
        $user = $this->input->post('user');
        $empresa = $this->input->post('empresa');
        $cargo = $this->input->post('cargo');
        $tipo = $this->input->post('tipo');
        $data['datos'] = array(
            'user' => $user,
            'empresa' => $empresa,
            'cargo' => $cargo,
            'id' => $id,
            'tipo' => $tipo
        );
        $data['competencias'] = $this->neuro_model->get_comp($id);
        $data['bloqueadores'] = $this->neuro_model->get_bloq($id);
        $this->load->view('PDF/neuro', $data);
    }

    //--------------------------------- TEST & CUESTIONARIOS

    function test() {
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/listado_test');
        $this->load->view('templates/footer');
    }

    function compromiso() {
        $data['hola'] = "Hola $_SESSION[username]";
        $data['test'] = $this->test_model->get_user_test();
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/compromiso');
        $this->load->view('templates/footer');
    }

    function view_compromiso() {
        $rut = $this->input->post('rut');
        $data['row'] = $this->test_model->get_result($rut);
        $data['datos'] = $this->test_model->get_data($rut);
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_compromiso');
        $this->load->view('templates/footer');
    }

    function prevencion() {
        $data['hola'] = "Hola $_SESSION[username]";
        $data['test'] = $this->test_model->get_users_prev();
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/prevencion');
        $this->load->view('templates/footer');
    }

    function view_prevencion() {
        $rut = $this->input->post('rut');
        $data['row'] = $this->test_model->get_result_prevencion($rut);
        $data['datos'] = $this->test_model->get_data($rut);
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_prevencion');
        $this->load->view('templates/footer');
    }

    function positivismo() {
        $data['hola'] = "Hola $_SESSION[username]";
        $data['test'] = $this->test_model->get_users_posit();
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/positivismo');
        $this->load->view('templates/footer');
    }

    function view_positivismo() {
        $rut = $this->input->post('rut');
        $data['row'] = $this->test_model->get_result_positivismo($rut);
        $data['datos'] = $this->test_model->get_data($rut);
        $data['inter'] = $this->test_model->get_inter($rut);
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_positivismo');
        $this->load->view('templates/footer');
    }

    function trabajo() {
        $data['hola'] = "Hola $_SESSION[username]";
        $data['test'] = $this->test_model->get_users_trabajo();
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/trabajo');
        $this->load->view('templates/footer');
    }

    function view_trabajo() {
        $rut = $this->input->post('rut');
        $data['row'] = $this->test_model->get_result_trabajo($rut);
        $data['datos'] = $this->test_model->get_data($rut);
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Test y cuestionarios";
        $this->load->view('templates/head', $data);
        $this->load->view('admin/view_trabajo');
        $this->load->view('templates/footer');
    }
    
    function usuarios() {
        $data['hola'] = "Hola $_SESSION[username]";
        $data['title'] = "Administrador - Usuarios Registrados";
        $data['datos'] = $this->neuro_model->get_usuarios();
        $this->load->view('templates/head', $data);
        $this->load->view('admin/usuarios');
        $this->load->view('templates/footer');
    }

    */

//=================================== LOGOUT ===========================================================================            
    public function logout() {
        date_default_timezone_set("America/Santiago");
        $id = $_SESSION['id'];
        $logs_hora_fin = date("H:i:s");
        $data = array(
            'log_id'       => $id,
            'log_hora_fin' => $logs_hora_fin
            );  
        $this->welcome_model->set_fin_log($data);
        session_destroy();
        redirect('welcome');
    }

//=================================== FIN LOGOUT ===========================================================================                

    public function sesion(){
        echo var_dump($_SESSION);
    }


    function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹", "  ");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E", " ");
        $cadena = trim($cadena);
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }


    public function eliminarDir($carpeta){
        foreach(glob($carpeta . "/*") as $archivos_carpeta){
            if (is_dir($archivos_carpeta)){
                $this->eliminarDir($archivos_carpeta);
            }else{
                unlink($archivos_carpeta);
            }
        }         
        $this->rmdir($carpeta);
    }



    public function rrmdir($dir) { 
        if (is_dir($dir)) { 
            $objects = scandir($dir); 
            foreach ($objects as $object) { 
                if ($object != "." && $object != "..") { 
                    if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
                } 
            } 
            reset($objects); 
            rmdir($dir); 
        } 
    }
}