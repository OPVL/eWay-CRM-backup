<?php

require_once 'config.php';
header('Content-Type: application/json');

$action = $_GET['action'];
$backup = $_GET['backup'];
$backup = file_get_contents('storage/' . $backup);

if (!$backup) {
    die(json_encode(['error' => 'Valid Backup not provided']));
}

$backup = json_decode($backup);

switch ($action) {
    case 'eway':
        require_once 'php-lib-2.1/eway.class.php';
        $dbg = [];
        try {
            $eway = new eWayConnector($EWAY_URL, $EWAY_USER, md5($EWAY_PASS), true);
        } catch (\Throwable $th) {
            die(json_encode(['eway-error' => $th->getMessage()]));
        }

        // backup the companies first
        foreach ($backup->companies as $company) {
            exit($eway->saveCompany([
                'FileAs' => $company->CompanyName
            ]));
        }

        break;

    case 'local':
        # code
        break;

    default:
        die(json_encode(['error' => 'Unrecognised argument supplied: ' . $action]));
        break;
}

exit();