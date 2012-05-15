<?php
// Init
error_reporting(NULL);
session_start();
$TAB = 'CRON';
include($_SERVER['DOCUMENT_ROOT']."/inc/main.php");

// Header
include($_SERVER['DOCUMENT_ROOT'].'/templates/header.html');

// Panel
top_panel($user,$TAB);

// Data
if ($_SESSION['user'] == 'admin') {

    exec (VESTA_CMD."v_list_cron_jobs $user json", $output, $return_var);
    check_error($return_var);
    $data = json_decode(implode('', $output), true);
    $data = array_reverse($data);
    unset($output);

    include($_SERVER['DOCUMENT_ROOT'].'/templates/admin/menu_cron.html');
    include($_SERVER['DOCUMENT_ROOT'].'/templates/admin/list_cron.html');
}

// Footer
include($_SERVER['DOCUMENT_ROOT'].'/templates/footer.html');
