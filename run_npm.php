<?php
echo "Starting npm install...\n";
$cmd = '"C:\\Program Files\\nodejs\\npm.cmd" install';
// Use proc_open to capture output in real-time
$descriptors = [
    0 => ['pipe', 'r'],
    1 => ['pipe', 'w'],
    2 => ['pipe', 'w'],
];
$process = proc_open($cmd, $descriptors, $pipes, null, ['CD' => 'C:\\xampp\\htdocs\\laravel_new']);
if (!is_resource($process)) {
    echo "FAIL: could not start npm\n";
    exit(1);
}
stream_set_blocking($pipes[1], false);
stream_set_blocking($pipes[2], false);

$start = time();
$heartbeat = time();
while (proc_get_status($process)['running']) {
    $out = stream_get_contents($pipes[1]);
    $err = stream_get_contents($pipes[2]);
    if ($out) echo $out;
    if ($err) fwrite(STDERR, $err);
    if (time() - $heartbeat > 5) {
        echo ".[seconds=" . (time() - $start) . "]\n";
        $heartbeat = time();
    }
    usleep(200000);
    if (time() - $start > 300) {
        echo "TIMEOUT after 5 minutes\n";
        break;
    }
}
$out = stream_get_contents($pipes[1]);
$err = stream_get_contents($pipes[2]);
if ($out) echo $out;
if ($err) fwrite(STDERR, $err);
fclose($pipes[1]);
fclose($pipes[2]);
proc_close($process);
echo "\nnpm install finished.\n";