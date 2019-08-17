<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('welcome_model');
        session_start();
        //Defino la zona horaria correspondiente a nuestra region, sirve para consultar fechas.
        date_default_timezone_set("America/Santiago");
    }


	public function index(){
        $this->load->helper('text');
        $data['inicio'] = $this->welcome_model->get_inicio();
        $data['video_principal'] = $this->welcome_model->get_video_principal();
        $data['noticias'] = $this->welcome_model->get_noticias_home();
        $data['patrocinadores'] = $this->welcome_model->get_patrocinadores();
        $data['title'] = "Home - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/inicio.php');
        $this->load->view('template/footer.php');
    }

    public function inicio(){
        $this->load->helper('text');
        $data['inicio'] = $this->welcome_model->get_inicio();
        $data['video_principal'] = $this->welcome_model->get_video_principal();
        $data['noticias'] = $this->welcome_model->get_noticias_home();
        $data['title'] = "Home - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('template/header.php');
        $this->load->view('contenido/inicio.php');
        $this->load->view('template/footer.php');
    }

    public function historia(){
        $data['title'] = "Historia - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/historia.php');
        $this->load->view('template/footer.php');
    }

    public function equipo(){
        $data['equipo'] = $this->welcome_model->get_equipo();
        $data['title'] = "Equipo - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/equipo.php');
        $this->load->view('template/footer.php');
    }

    public function entorno(){
        $data['title'] = "Entorno - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/entorno.php');
        $this->load->view('template/footer.php');
    }

    public function comoAyudarnos(){
        $data['title'] = "Cómo Ayudarnos - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/comoAyudarnos.php');
        $this->load->view('template/footer.php');
    }

    public function casaAcogida(){
        $data['title'] = "Casa Acogida - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/casaAcogida.php');
        $this->load->view('template/footer.php');
    }

    public function hagaseSocio(){
        $data['title'] = "Hágase Socio - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/hagaseSocio.php');
        $this->load->view('template/footer.php');
    }

    public function voluntariado(){
        $data['title'] = "Voluntariado - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/voluntariado.php');
        $this->load->view('template/footer.php');
    }


    public function apadrinamiento(){
        $data['title'] = "Apadrinamiento - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/apadrinamiento.php');
        $this->load->view('template/footer.php');
    }

    public function donaciones(){
        $data['title'] = "Donaciones - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/donaciones.php');
        $this->load->view('template/footer.php');
    }

    public function tarjetasSaludo(){
        $data['tarjetas'] = $this->welcome_model->get_tarjeta_saludo();
        $data['title'] = "Tarjetas de Saludos - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/tarjetasSaludo.php');
        $this->load->view('template/footer.php');
    }

    public function coronasCaridad(){
        $data['title'] = "Coronas de Caridad - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/coronasCaridad.php');
        $this->load->view('template/footer.php');
    }

    public function patrocinadores(){
        $data['patrocinadores'] = $this->welcome_model->get_patrocinadores();
        $data['title'] = "Patrocinadores - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/patrocinadores.php');
        $this->load->view('template/footer.php');
    }

    public function noticias(){

        $this->load->helper('text');
        $this->load->library('pagination'); //Cargamos la librería de paginación

        $data["title"] = "Noticias - Fundación Santa Clara";
        $pages = 5; //Número de registros mostrados por páginas
        $config['base_url'] = base_url().'index.php/welcome/noticias/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->welcome_model->get_filas_noticias();//calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';//primer link
        $config['last_link'] = 'Última';//último link
        $config["uri_segment"] = 3;//el segmento de la paginación
        $config['next_link'] = 'Siguiente &#8594;'; //siguiente link
        $config['next_tag_open'] = '<div class="nav-previous">';
        $config['display_pages'] = FALSE;
        $config['next_tag_close'] = '</div>';

        $config['prev_link'] = '&#8592; Anterior'; //anterior link
        $config['prev_tag_open'] = '<div class="nav-next">';
        $config['prev_tag_close'] = '</div>';

        $config['full_tag_open'] = '<div class="page-navigation">';//el div que debemos maquetar
        $config['full_tag_close'] = '</div>';//el cierre del div de la paginación
        $this->pagination->initialize($config); //inicializamos la paginación
        $data["noticias"] = $this->welcome_model->total_paginados($config['per_page'],$this->uri->segment(3));
        $data["paginacion"] = $this->pagination->create_links();

        //$data['noticias'] = $this->welcome_model->get_noticias();

        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/noticias.php', $data);
        $this->load->view('template/footer.php');
    }


    public function articulo($noti_slug) {
        if(!isset($noti_slug)){
            die('No se recibio el id del artuculo');
        }

        $this->load->helper('text');
        //Le asigno a la variable "$data['noticia_item']" el resultado del metodo "get_noticia_slug" del modelo "welcome_model"
        $data['noticia_item'] = $this->welcome_model->get_noticia_slug($noti_slug);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['noticia_item'])) {
            show_404();
        }


        $data['title'] = "Campañas - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/articulo.php', $data);
        $this->load->view('template/footer.php');
    }



    public function contacto(){
        $data['title'] = "Contacto - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/contacto.php');
        $this->load->view('template/footer.php');
    }

    public function campania(){
        $data['campanias'] = $this->welcome_model->get_campanias();
        $data['title'] = "Campañas - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/campania.php');
        $this->load->view('template/footer.php');
    }

    public function campania_2009_2010(){
        $data['title'] = "Campañas - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/campania_2009_2010.php');
        $this->load->view('template/footer.php');
    }

    public function campania_2011(){
        $data['title'] = "Campañas - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/campania_2011.php');
        $this->load->view('template/footer.php');
    }


    public function galerias(){

        $gaim_id=$this->input->post('id');

        if($gaim_id){
            $objCarpeta = $this->admin_model->get_carpeta($gaim_id);
            if($objCarpeta){
                $carpeta = $objCarpeta['gaim_carpeta'];
                $data['carpeta'] = $carpeta;
            }
        }

        $data['title'] = "Galeria - Fundación Santa Clara";
        $this->load->view('contenido/galerias.php', $data);
        $this->load->view('template/footer.php');
    }

    public function galeria(){
        $data['galerias'] = $this->welcome_model->get_galeria_imagenes();
        $data['title'] = "Galeria - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/galeria.php');
        $this->load->view('template/footer.php');
    }


    public function video($vide_slug) {
        if(!isset($vide_slug)){
            die('No se recibio el id del video');
        }

        $this->load->helper('text');
        
        //Le asigno a la variable "$data['noticia_item']" el resultado del metodo "get_noticia_slug" del modelo "welcome_model"
        $data['video_principal'] = $this->welcome_model->get_video_slug($vide_slug);
        //Si la variable "$data['consultoria_item']" está vacia, muestro la página de error 404
        if (empty($data['video_principal'])) {
            show_404();
        }
        


        //Obtengo todos los videos registrados excepto el video principal
        $data['videos'] = $this->welcome_model->get_videos_otros($vide_slug);

        $data['title'] = "Campañas - Fundación Santa Clara";
        $this->load->view('template/header.php', $data);
        $this->load->view('contenido/video.php');
        $this->load->view('template/footer.php');
    }


    public function login(){
         //reglas de validacion
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|xss_clean');
        $this->form_validation->set_rules('clave', 'Clave', 'required|trim|xss_clean');

        //si NO se cumplen las reglas de validacion, se muestra el index normal
        if ($this->form_validation->run() == false) {

            $this->load->library('form_validation');
            $data['title'] = "Login - Fundación Santa Clara";
            $this->load->view('template/header.php', $data);
            $this->load->view('contenido/login.php');
            $this->load->view('template/footer.php');

            //si se cumplen las reglas de validacion se ejecuta el "else"
        } else {

            //asigno el retorno del metodo "verify_user" del modelo "admin_model" a la variable "$res"
            //le paso como argumentos lo que recojo del post = nombre y clave
            $res = $this->welcome_model->verify_user(
                    $this->input->post('nombre'),
                    $this->input->post('clave')
            );

            //si el retorno del metodo "verify_user es verdadero"
            if ($res !== false) {
                //si la respuesta es verdadera, le asigno a la variable de sesion el nombre de usuario
                $_SESSION['username'] = $this->input->post('nombre');

                //Armo el array que contendrá la informacion para almacenar en logs
                date_default_timezone_set("America/Santiago");
                global $_dias, $_meses;
                $logs_fecha = $_dias[date('w')]." ".date('d')." de ".$_meses[date('n')-1]. " del ".date('Y') ;
                $logs_usuario = $_SESSION['username'];
                if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
                elseif (isset($_SERVER['HTTP_VIA'])) {
                   $ip = $_SERVER['HTTP_VIA'];
                }
                elseif (isset($_SERVER['REMOTE_ADDR'])) {
                   $ip = $_SERVER['REMOTE_ADDR'];
                }
                else {
                   $ip = "unknown";
                }
                $logs_ip = ip2long($ip);
                $logs_hora_inicio = date("H:i:s");
                $logs_hora_fin = "";

                $data = array(
                    'log_fecha_creacion'=> $logs_fecha,
                    'log_usuario'       => $logs_usuario,
                    'log_ip'            => $logs_ip,
                    'log_hora_inicio'   => $logs_hora_inicio,
                    'log_hora_fin'      => $logs_hora_fin
                );

                //Obtengo el id del registro insertado en la db y lo guardo en session para poder setear la hora de termino de la sesion
                $id = $this->welcome_model->set_log($data);
                $_SESSION['id'] = $id;

                //redirecciona al controller "admin"
                redirect('admin');
            } else {
                //si el usuario no tiene cuenta, se muestra el mensaje de error

                die('sin cuenta');

                $data['inicio'] = $this->welcome_model->get_inicio();
                $data['error'] = "Nombre de usuario y/o contraseña incorrecta";
                $data['title'] = "Inicio - Develart Consultores - error";
                $this->load->view('templates/head', $data);
                $this->load->view('contenido/error');
                $this->load->view('templates/footer');
            }
        }
    }




    public function contacto_postulante(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('Apaterno', 'Apellido paterno', 'required|xss_clean');
        $this->form_validation->set_rules('Amaterno', 'Apellido materno', 'required|xss_clean');
        $this->form_validation->set_rules('nombres', 'Nombres', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean');
        $this->form_validation->set_rules('rut', 'Rut', 'required|trim|xss_clean');
        $this->form_validation->set_rules('comuna', 'Comuna', 'required|xss_clean');
        $this->form_validation->set_rules('celular', 'Celular', 'required|trim|xss_clean');
        $this->form_validation->set_rules('monto', 'Monto aporte', 'required|trim|xss_clean');
        $this->form_validation->set_rules('tipo_socio', 'Tipo de socio', 'required|xss_clean');
        $this->form_validation->set_rules('dia_pago', 'Día de pago', 'required|trim|xss_clean');
        

        //si NO se cumplen las reglas de validacion, se muestra el index normal
        if ($this->form_validation->run() == false) {

            $this->load->library('form_validation');
            $data['title'] = "Login - Fundación Santa Clara";
            $this->load->view('template/header.php', $data);
            $this->load->view('contenido/hagaseSocio.php');
            $this->load->view('template/footer.php');

            //si se cumplen las reglas de validacion se ejecuta el "else"
        } else {

            
            $Apaterno = $this->input->post('Apaterno');
            $Amaterno = $this->input->post('Amaterno');
            $nombres = $this->input->post('nombres');
            $email = $this->input->post('email');
            $rut = $this->input->post('rut');
            $fnacimiento = @$this->input->post('fnacimiento');
            $direccion = @$this->input->post('direccion');
            $comuna = $this->input->post('comuna');
            $ciudad = @$this->input->post('ciudad');
            $telefono = @$this->input->post('telefono');
            $celular = $this->input->post('celular');
            $empresa = @$this->input->post('empresa');
            $monto = $this->input->post('monto');
            $tipo_socio = $this->input->post('tipo_socio');
            $dia_pago = $this->input->post('dia_pago');
            
            
            $from       = $this->input->post('email');
            $subject    = 'Nuevo socio';
            $to         = 'info@fundacionsantaclara.cl';
            $mensaje    = "<p>Se ha solicitado una nueva incorporación desde el formulario de contacto<p><br /><br />
                            <p>Datos del interesado:</p><br />
                            <p>Nombre: $nombres $Apaterno $Amaterno</p>
                            <p>Rut: $rut</p>
                            <p>Email: $email</p>
                            <p>Fecha nacimiento: $fnacimiento</p>
                            <p>Dirección: $direccion</p>
                            <p>Comuna: $comuna</p>
                            <p>Ciudad: $ciudad</p>
                            <p>Teléfono fijo: $telefono</p>
                            <p>Celular: $celular</p>
                            <p>Empresa: $empresa</p>
                            <p>Monto: $ $monto</p>
                            <p>Tipo de aporte: $tipo_socio</p>
                            <p>Día de pago: $dia_pago</p>";


            $this->send_mail($from, $to, $subject, $mensaje);
        }
    }




    public function formulario_contacto(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nombre', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
        $this->form_validation->set_rules('message', 'Mensaje', 'required|xss_clean');
        

        //si NO se cumplen las reglas de validacion, se muestra el index normal
        if ($this->form_validation->run() == false) {

            $this->load->library('form_validation');
            $data['title'] = "Login - Fundación Santa Clara";
            $this->load->view('template/header.php', $data);
            $this->load->view('contenido/contacto.php');
            $this->load->view('template/footer.php');

            //si se cumplen las reglas de validacion se ejecuta el "else"
        } else {

            
            $nombre = $this->input->post('name');
            $email = $this->input->post('email');
            $contenido = $this->input->post('message');
                        
            $from       = $email;
            $subject    = 'Contacto Santa Clara';
            $to         = 'info@fundacionsantaclara.cl';
            $mensaje    = "Se ha registrado un nuevo mensaje a través del formulario de contacto
                            Nombre: $nombre.
                            Mensaje: $contenido";

            $this->send_mail($from, $to, $subject, $mensaje);
        }
    }




    public function send_mail($from, $to, $subject, $mensaje) {
        $this->load->library('email');
        $this->load->helper('url');

        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($mensaje);

        if (!$this->email->send()) {
            $error = $this->email->print_debugger();
            $data['title'] = "Fundación Santa Clara";
            $data['texto'] = "No se pudo enviar el mensaje";
            $data['errores'] = $error;
            $data['volver'] = "welcome";
            $data['cancelar'] = "welcome";

            $this->load->view('template/header', $data);
            $this->load->view('template/error_upload');
            $this->load->view('template/footer');
        } else {
            $data['title'] = "Fundación Santa Clara";
            $data['texto'] = "Mensaje enviado con éxito";
            $data['continuar'] = "welcome";

            $this->load->view('template/header', $data);
            $this->load->view('template/success');
            $this->load->view('template/footer');
        }
    }



    public function sesion(){
        echo var_dump($_SESSION);
    }











}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
