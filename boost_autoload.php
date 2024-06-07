<?php session_start(); ?>
<?php
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
?>
<?php
require_once "boost_config.php";
$_SESSION['ses_abs_path'] = __DIR__;
$delmiter = "/";
if ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") {
    $delmiter = "\\";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "dbs.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "dbs.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "login_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "login_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "base.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "base.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "students_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "students_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "session_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "session_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "courses_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "courses_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "email_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "email_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "notifications_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "notifications_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "settings_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "settings_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "activity_log_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "activity_log_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "global_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "global_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "reports_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "reports_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "cron_jobs_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "cron_jobs_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "custom_scorm_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "custom_scorm_class.php";
}
if (is_file($_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "encryption_service_class.php")) {
    require_once $_SESSION['ses_abs_path'] . $delmiter . "custom_classes" . $delmiter . "encryption_service_class.php";
}
$dt     = date("Y-m-d");
$tm     = date("H:i:s");
$ts     = time();
$dt_tm  = $dt . " " . $tm;
$dbs = new myDB($uname, $pwd, $dbs);
$dbsInst    = new BASE($dbs->getObj());
$crsInst    = new COURSE($dbs->getObj());
$stdInst    = new STUDENT($dbs->getObj());
$emailInst  = new EMAIL($dbs->getObj());
$sesInst    = new SESSION($dbs->getObj());
$setInst    = new SETTINGS($dbs->getObj());
$logInst    = new ACTIVITY_LOG($dbs->getObj());
$ntfInst    = new NOTIFICATION($dbs->getObj());
$glbInst    = new GLOBALCLS($dbs->getObj());
$rptInst    = new REPORTS($dbs->getObj());
$cronInst   = new CRON_JOBS($dbs->getObj());
$scormInst  = new CUSTOM_SCORM($dbs->getObj());
$_SESSION['SES_ROOT']       = ROOT;
$_SESSION['SES_ROOT_ADMIN'] = ROOT_ADMIN;
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
}
/*
if( $setInst->getKeyVal('http_link')['dataSet']=="https" ){
    define('MODULE_SYM_LINK', "course_modules/");
    define('PACKAGE_PATH'   , "course_modules/");
}else{
    define('MODULE_SYM_LINK', "launch-auth/");
    define('PACKAGE_PATH'   , "launch-auth/");
    //define('MODULE_SYM_LINK', "course_modules/");
    //define('PACKAGE_PATH'   , "course_modules/");
}
*/
//define('MODULE_SYM_LINK', "launch-auth/");
//define('PACKAGE_PATH'   , "launch-auth/");
define('MODULE_SYM_LINK', "course_modules/");
define('PACKAGE_PATH', "course_modules/");
?>