<?php
require_once("vendor/autoload.php");

use Symfony\Component\Yaml\Yaml;

$file = file_get_contents(dirname(__FILE__) . "/app/config/parameters.yml", true);
$config = Yaml::parse($file);

date_default_timezone_set('America/New_York');

// if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' && $_SERVER['REMOTE_ADDR'] != "::1") {

  $server = explode(".", $_SERVER['HTTP_HOST']);
  $_SESSION['ses_sub_domain'] = $sub_domain = "ssi"; //$server[0];

  if (empty($_SESSION['httpLink'])) {
    $_SESSION['httpLink'] = 'http';
  }

  $dbs = $config["parameters"]["database_name"];

  // use live server for all "-new" temporary subdomains
  // if (strpos($server[0], "-new") !== FALSE) {
  //   $dbs = "boost_" . substr($server[0], 0, -4);
  // }

  $chk     = $sub_domain;
  $uname   = $config["parameters"]["database_user"];
  $pwd     = $config["parameters"]["database_password"];
  $clients = array("pswquality");

  // if (in_array($server[0], $clients)) {
    define('ROOT_ADMIN', "http://localhost:8888/admin/");
    define('ROOT', "http://localhost:8888/");
    define('SesRoot', "http://localhost:8888/");
    if (empty($_SESSION['std_landing_page'])) {
      $_SESSION['std_landing_page'] = "my-learning-path";
    }
    define('LEARNER_URL', "http://localhost:8888/{$_SESSION['std_landing_page']}");
  // } else {
  //   define('ROOT_ADMIN', "http://localhost:8888/admin/");
  //   define('ROOT', "http://localhost:8888/");
  //   define('ROOT_PATH', "http://localhost:8888/");
  // }
// }
