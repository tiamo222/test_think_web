<?php


error_reporting (E_ALL ^ E_NOTICE);

//////////////////////////////////////////////////////////////////////////////////
// CONSTANTS  
//////////////////////////////////////////////////////////////////////////////////

// -------------------------------------------------------------------------------
// DEFAULT_LANG
// This should be the default language file to use.
// Language files are stored in [installation directory]/editor_files/lang

define('DEFAULT_LANG', 'en-us.php');

// -------------------------------------------------------------------------------
// DOMAIN_ADDRESS
// This should be the address of the domain under which you are running WysiwygPro, e.g 'http://www.mywebsite.com'
// The code below should automatically detect and set this for you, but if it doesn't you can set it manually

define('DOMAIN_ADDRESS', strtolower(substr($_SERVER['SERVER_PROTOCOL'],0,strpos($_SERVER['SERVER_PROTOCOL'],'/')) . ($_SERVER['HTTPS'] == "on" ? 's://' : '://') . $_SERVER['SERVER_NAME'] ) );

// -------------------------------------------------------------------------------
// The following two variables tell WysiwygPro the location of your 'editor_files' folder.
// The first variable sets the file system address of the folder and the second sets the web address of the folder.





/*
define('WP_FILE_DIRECTORY', $_SERVER['DOCUMENT_ROOT'].'/system_webeditor/');
define('WP_WEB_DIRECTORY', '/system_webeditor/');
define('WP_WEB_DIRECTORY_SUB', '/system_webeditor/');
define('IMAGE_FILE_DIRECTORY', $_SERVER['DOCUMENT_ROOT'].'/picture_bank/');
define('IMAGE_WEB_DIRECTORY', '/picture_bank/');
define('IMAGE_WEB_DIRECTORY_SUB', '/picture_bank/');
define('DOCUMENT_FILE_DIRECTORY', $_SERVER['DOCUMENT_ROOT'].'/downloads/');
define('DOCUMENT_WEB_DIRECTORY', '/downloads/');
*/






/// $config_editor_part = "/thinksoft"; /// server
//// $config_editor_part = "/thinksoft"; /// 

//// ############################
//////////////// config server 
define('WP_FILE_DIRECTORY', $_SERVER['DOCUMENT_ROOT']."$config_editor_part/app_webeditor/");
define('WP_WEB_DIRECTORY', "$config_editor_part/app_webeditor/");
define('WP_WEB_DIRECTORY_SUB', "$config_editor_part/app_webeditor/");

define('IMAGE_FILE_DIRECTORY', $_SERVER['DOCUMENT_ROOT']."$config_editor_part/upload/picture/");
define('IMAGE_WEB_DIRECTORY', "$config_editor_part/upload/picture/");
define('IMAGE_WEB_DIRECTORY_SUB', "$config_editor_part/upload/picture/");

define('DOCUMENT_FILE_DIRECTORY', $_SERVER['DOCUMENT_ROOT']."$config_editor_part/upload/file/");
define('DOCUMENT_WEB_DIRECTORY', "$config_editor_part/upload/file/");






$trusted_directories = array(
	// Follow this format:
	// 'unique id' => array('file dir', 'web dir'),
	// Examples:
	'foo.com_images' => array('c:/html/users/foo.com/html/images/', 'http://www.foo.com/images/'), 
	'bar.com_images' => array($_SERVER['DOCUMENT_ROOT'].'/bar/', '/bar/'),

);

// -------------------------------------------------------------------------------
// If the following variables are set then WP will populate the insert smiley dialoge with smileys from the specified directory.
// Smiley images must be less than 32x32 in GIF or PNG format.
// Leave either of these variables null to use the default smiley set.
// SMILEY_FILE_DIRECTORY
// the full file path to the directory containing your smileys

define('SMILEY_FILE_DIRECTORY', null);

// SMILEY_WEB_DIRECTORY
// The web address to the directory you specified above

define('SMILEY_WEB_DIRECTORY', null);

// -------------------------------------------------------------------------------
// NOCACHE 
// Should be set either true or false, If true headers will be sent to prevent caching by proxy servers.
// This is important because WYSIWYG PRO outputs different data depending on the client browser, if the output is cached by a proxy, browsers behind this proxy may be delivered the wrong data.
// You are advised against changing this variable.
// This has nothing to do with WYSIWYG PRO's configuration saving features.

define('NOCACHE', true);

// -------------------------------------------------------------------------------
// SAVE_DIRECTORY 
// The full file path to the dirctory you want WYSIWYG PRO to save configuration data.
// make sure that the file permissions for this directory have been set to read write.
// Note that the use of this feature is optional, but recommended for high load applications. See the manual for more info.

define('SAVE_DIRECTORY', WP_FILE_DIRECTORY.'save/');

// SAVE_LENGTH The length of time in seconds to save a configuration before re-generation.

define('SAVE_LENGTH', 9000);

// If you are using configuration saving during the development of your project be aware that if you make a configuration change this change will not be visible until the configuration file has expired!
// For the above reason we recommend against using configuration saving during development.


// -------------------------------------------------------------------------------
// All of the following variables affect file management in the image and document windows:
// -------------------------------------------------------------------------------

////////////////////////////
// File Types  
////////////////////////////

// These variables decide what types of files users are allowed to upload using the image or document management windows

// What types of images can be uploaded? Separate with a comma.
$image_types = '.jpg, .jpeg, .gif, .png';

// What types of documents can be uploaded? Separate with a comma.
$document_types = '.html, .htm, .pdf, .doc, .rtf, .txt, .xl, .xls, .ppt, .pps, .zip, .tar, .swf, .wmv, .rm, .mov, .jpg, .jpeg, .gif, .png';

////////////////////////////
// File Sizes
////////////////////////////

// maximum width of uploaded images in pixels set this to ensure that users don't destroy your site's design!!
$max_image_width = 1500;

// maximum height of uploaded images in pixels set this to ensure that users don't destroy your site's design!!
$max_image_height = 1500;

// maximum image filesize to upload in bytes
$max_file_size = 2000000;

// maximum size of documents to upload in bytes
$max_documentfile_size = 2000000;

//////////////////////////
// User Permissions
//////////////////////////

// if you have a user authentication system you might want to dynamically generate values for the following variables based on user permissions:
// the following must be set either true or false.

// can users delete files? (be very careful with this one)
$delete_files = true;

// can users delete directories? (be even more careful with this one)
$delete_directories = true;

// can users create directories?
$create_directories = true;


// can users re-name files?
$rename_files = true;

// can users rename directories?
$rename_directories = true;

// can users upload files??
$upload_files = true;

// If users can upload and they upload a file with the same name as an existing file are they allowed to overwrite the existing file?
$overwrite = true;

// end variables, do not change naything below
// ----------------------------------------
define('WP_CONFIG', true);
global $wp_has_been_previous;
$wp_has_been_previous = false;
// ----------------------------------------


?>
