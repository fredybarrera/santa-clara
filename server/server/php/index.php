<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */


error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
session_start();
$carpeta = $_SESSION['carpeta'];

$upload_handler =   new UploadHandler(array(
		'upload_dir' => 'files/'.$carpeta.'/',
		'upload_url' => '/santa_clara_v3/server/php/files/'.$carpeta.'/',
	
));