<?php
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    file_put_contents('blocked_ips.txt', $ip . PHP_EOL, FILE_APPEND);
    echo "IP {$ip} has been blocked.";
} else {
    echo "IP not provided.";
}
?>
