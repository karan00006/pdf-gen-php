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
require_once('admin_inc.php');
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

//print_r($_GET); exit();

$upload_handler = new UploadHandler();
