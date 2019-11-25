
<?php
require_once 'config.php';
require_once 'php-lib-2.1/eway.class.php';
header('Content-Type: application/json');
$start = time();
$contacts;
$companies;
$dbg = [];
try {
    $eway = new eWayConnector($EWAY_URL, $EWAY_USER, md5($EWAY_PASS), true);
} catch (\Throwable $th) {
    die(json_encode(['eway-error' => $th->getMessage()]));
}
$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS);

if ($db->errno) {
    die(json_encode(['db-error' => $db->error]));
}

$dbg[] = 'Database Connection established';

try {
    $dbg[] = "Authenticating with eWay: $EWAY_URL, $EWAY_USER, " . md5($EWAY_PASS);
    $dbg[] = "Getting Companies from eWay";
    $companies = $eway->getCompanies();
    $dbg[] = "Getting Contacts from eWay";
    $contacts = $eway->getContacts();
    // if ()
} catch (\Throwable $th) {
    die(json_encode(['eway-error' => $th->getMessage()]));
}

if (!empty($companies)) $dbg[] = "Companies Retreived Successfully. Returned " . count($companies->Data) . " Records";
else $dbg[] = "Failed to return any Company records";

if (!empty($contacts)) $dbg[] = "Contacts Retreived Successfully. Returned " . count($contacts->Data) . " Records";
else $dbg[] = "Failed to return any Contact records";

$backup = [
    'companies' => $companies->Data,
    'contacts' => $contacts->Data
];

if ($DEBUG) {
    $backup['debug'] = $dbg;
}
$now = gmdate("Y-m-d\TH:i:s", time());
$filename = "storage/eway-backup-$now.json";
$file = fopen($filename, "a");
$write = fwrite($file, json_encode($backup));
fclose($file);

exit(json_encode(
    $write ?
        ['msg' => 'Success! Backup saved. Took ' . (string)(time() - $start) . 's'] : ['error' => 'Unable to save or 0 Bytes written. Please try again.']
));
?>