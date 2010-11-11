<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/* Admin constants */
/*
|--------------------------------------------------------------------------
|Size upload image for Upload_img_lib form MyLibrary 
|--------------------------------------------------------------------------
*/
define('IMAGE_TINY_WIDTH', 40);
define('IMAGE_TINY_HEIGHT', 40);
define('IMAGE_SMALL_WIDTH', 60);
define('IMAGE_SMALL_HEIGHT', 60);
define('IMAGE_MEDIUM_WIDTH', 120);
define('IMAGE_MEDIUM_HEIGHT', 120);
define('IMAGE_LARGE_WIDTH', 240);
define('IMAGE_LARGE_HEIGHT', 240);
define('IMAGE_RECIPE_PREFIX','re_');
define('IMAGE_PRODUCT_PREFIX','pi_');
define('IMAGE_STEP_PREFIX','sp_');
/*
|--------------------------------------------------------------------------
|f
|--------------------------------------------------------------------------
*/
define('RECIPE_IMAGE_MAIN_TYPE', 1);
define('DEFAULT_PRODUCTS_IN_RECIPE', 5);
/* End of file constants.php */
/* Location: ./system/application/config/constants.php */