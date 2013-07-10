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
$upload_handler = new UploadHandler(array(
		'image_versions' => array(
			'' => array(
								'max_width' => 620,
								'max_height'=> 400,
								'jpeg_quality' => 80
				),
			'medium' => array(
								'max_width' => 620,
								'max_height'=> 400,
								'jpeg_quality' => 80
				),
			),
	));
