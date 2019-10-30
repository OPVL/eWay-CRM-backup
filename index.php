<?php
$pageTitle = 'Home';
require_once 'sections/header.php';

$jsonPattern = '/[^\s"]+\.json/i';
$backups = preg_grep($jsonPattern, scandir('storage'));

function formatDiff(int $past)
{
    $now = time();

    $diff = $now - $past;
    if (1 > $diff) {
        return '0s';
    }
    $w = floor($diff / 86400 / 7);
    $d = $diff / 86400 % 7;
    $h = $diff / 3600 % 24;
    $m = $diff / 60 % 60;
    $s = $diff % 60;

    $return = $w > 0 ? $w . 'w ' : '';
    $return .= $d > 0 ? $d . 'd ' : '';
    $return .= $h > 0 ? $h . 'h ' : '';
    $return .= $m > 0 ? $m . 'm ' : '';
    $return .= $s > 0 ? $s . 's ' : '';



    return $return;
    // return "{$w} weeks, {$d} days, {$h} hours, {$m} minutes and {$s} secs away!";
}
?>
<div class="flex-col full">

    <div class="quickstats">
        <div class="stat">
        <div class="value"><?= count($backups) ?></div>
            <div class="desc">Backups</div>
        </div>
        <div class="stat">
        <div class="value"><?= gmdate("Y/m/d", filemtime('storage/' . $backups[0])) ?></div>
            <div class="desc">Last Backup</div>
        </div>
        <div class="stat">
            <div class="value"><?= 0 ?></div>
            <div class="desc">Restores</div>
        </div>
    </div>
    <table>
        <caption>Currently Held Backups</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Size</th>
                <th scope="col">Restore</th>
                <th scope="col">View</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            foreach ($backups as $backup) {
                $path = "storage/$backup";
                $size = filesize($path);
                $size = $size > 1024 ? round($size / 1024, 1) . 'kb' : $size . 'b';
                $age = time() - filemtime($path);
                ?>
                <tr>
                    <th scope="row"><?= $index ?></th> <!-- counter -->
                    <td><?= $backup ?></td> <!-- Name -->
                    <td><?= formatDiff(filemtime($path)) ?></td> <!-- Age -->
                    <td><?= $size ?></td> <!-- Size -->
                    <td><a class="bup-action" href="/restore.php?backup=<?= $backup ?>"><?= 'restore' ?></a></td> <!-- Restore Button -->
                    <td><a class="bup-action" href="/view.php?backup=<?= $backup ?>"><?= 'view' ?></a></td> <!-- View Button -->
                    <td><a class="bup-action" href="/delete.php?backup=<?= $backup ?>"><?= 'delete' ?></a></td> <!-- Delete Button -->
                </tr>
            <?php
                $index++;
            }
            ?>
        </tbody>
    </table>

    <button id="backupButton">Take Backup</button>
</div>
<script>
    async function triggerBackup() {
        const res = await fetch('/takeBackup.php');
        const json = await res.json();
        console.info(json);
        location.reload();
    }

    document.getElementById("backupButton").onclick = triggerBackup;
</script>
</body>

</html>