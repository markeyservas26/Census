<?php
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    $blockedIps = file('blocked_ips.txt', FILE_IGNORE_NEW_LINES);
    if (($key = array_search($ip, $blockedIps)) !== false) {
        unset($blockedIps[$key]);
        file_put_contents('blocked_ips.txt', implode(PHP_EOL, $blockedIps) . PHP_EOL);
        echo "IP {$ip} has been unblocked.";
    } else {
        echo "IP not found in the blocked list.";
    }
} else {
    echo "IP not provided.";
}
?>
