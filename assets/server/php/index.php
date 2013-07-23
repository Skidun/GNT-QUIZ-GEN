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
require('UploadHandler2.php');
$upload_handler = new UploadHandler(array(
		'image_versions' => array(
			'' => array(
								'max_width' => 240,
								'max_height'=> 260,
								'jpeg_quality' => 80
				),
			'medium' => array(
								'max_width' => 240,
								'max_height'=> 260,
								'jpeg_quality' => 80
				),
			),
	));
