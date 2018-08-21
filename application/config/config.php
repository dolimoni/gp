<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (defined('STDIN')) {
    $config['base_url'] = "gp.ma";
}else{
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    $config['base_url'] = "$root";
}



$config['index_page'] = '';
$config['uri_protocol']	= 'AUTO'; //REQUEST_URI
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['allow_get_array'] = TRUE;
$config['log_threshold'] = 3;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = '';
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 0;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();
$config['compress_output'] = FALSE;

$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';




/*Exceptions Hanlder*/

/*function my_error_handler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno))
    {
        // This error code is not included in error_reporting
        return;
    }
    log_message('error', "$errstr @$errfile::$errline($errno)" );
    throw new ErrorException( $errstr, $errno, 0, $errfile, $errline );
}
set_error_handler("my_error_handler");

function my_exception_handler($exception)
{
    echo '<pre>';
    print_r($exception);
    echo '</pre>';
    header( "HTTP/1.0 500 Internal Server Error" );
}
set_exception_handler("my_exception_handler");

function my_fatal_handler()
{
    $errfile = "unknown file";
    $errstr  = "Fatal error";
    $errno   = E_CORE_ERROR;
    $errline = 0;
    $error = error_get_last();
    if ( $error !== NULL )
    {
        echo '<pre>';
        print_r($error);
        echo '</pre>';
        header( "HTTP/1.0 500 Internal Server Error" );
    }
}
register_shutdown_function("my_fatal_handler");
function my_assert_handler($file, $line, $code)
{
    log_message('debug', "assertion failed @$file::$line($code)" );
    throw new Exception( "assertion failed @$file::$line($code)" );
}
assert_options(ASSERT_ACTIVE,     1);
assert_options(ASSERT_WARNING,    0);
assert_options(ASSERT_BAIL,       0);
assert_options(ASSERT_QUIET_EVAL, 0);
assert_options(ASSERT_CALLBACK, 'my_assert_handler');*/


