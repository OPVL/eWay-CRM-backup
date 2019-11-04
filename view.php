<?php
require_once 'config.php';
require_once 'sections/header.php';

$backup = $_GET['backup'];
// $backup = fopen('storage/'.$backup, 'r');
// $backup = file_get_contents('storage/eway-backup-2019-10-30T15:23:31.json');
$backup = file_get_contents('storage/'.$backup);

if (!$backup){
    die('yeeet'. $_GET['backup']);
    // header('Location: ' . $_SERVER['HTTP_HOST']);
}

$backup = json_decode($backup);

if ($DEBUG){
    echo("<p>capture debug log:</p>");
    foreach ($backup->debug as $log) {
        echo($log.'<br>');
    }
}
?>
<div class="flex-col full">
    <table>
        <caption>Companies</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">CompanyName</th>
                <th scope="col">EmployeesCount</th>
                <th scope="col">Phone</th>
                <th scope="col">WebPage</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            foreach ($backup->companies as $company) {
                ?>
                <tr>
                    <th scope="row"><?= $index ?></th> <!-- counter -->
                    <td><?= $company->CompanyName ?></td> <!-- CompanyName -->
                    <td><?= $company->EmployeesCount ?></td> <!-- EmployeesCount -->
                    <td><?= $company->Phone ?></td> <!-- Phone -->
                    <td><?= $company->WebPage ?></td> <!-- WebPage -->
                </tr>
            <?php
                $index++;
            }
            ?>
        </tbody>
    </table>
    <table>
        <caption>Contacts</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Job Title</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            foreach ($backup->contacts as $contact) {
                ?>
                <tr>
                    <th scope="row"><?= $index ?></th> <!-- counter -->
                    <td><?= $contact->FirstName . ' ' . $contact->LastName ?></td> <!-- CompanyName -->
                    <td><?= $contact->TelephoneNumber1 ?></td> <!-- EmployeesCount -->
                    <td><?= $contact->Email1Address ?></td> <!-- Phone -->
                    <td><?= $contact->Title ?></td> <!-- WebPage -->
                </tr>
            <?php
                $index++;
            }
            ?>
        </tbody>
    </table>
</div>
