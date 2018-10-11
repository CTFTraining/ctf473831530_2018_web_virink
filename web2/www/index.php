<?php
/**
 * Hitcon2017 BabyFirst Revenge By Orange
 */
error_reporting(0);

$source = '<?php
    $sandbox = \'/www/sandbox/\' . md5(\'orange\' . $_SERVER[\'REMOTE_ADDR\']);
    mkdir($sandbox);
    chdir($sandbox);
    if (isset($_GET[\'cmd\']) && strlen($_GET[\'cmd\']) <= 20) {
        exec($_GET[\'cmd\']);
    } else if (isset($_GET[\'reset\'])) {
        exec(\'/bin/rm -rf \' . $sandbox);
    }
    echo "<br /> IP : {\$_SERVER[\'REMOTE_ADDR\']}";
?>';

$sandbox = '/www/sandbox/' . md5('orange' . $_SERVER['REMOTE_ADDR']);
mkdir($sandbox);
chdir($sandbox);
if (isset($_GET['cmd']) && strlen($_GET['cmd']) <= 20) {
	exec($_GET['cmd']);
} else if (isset($_GET['reset'])) {
	exec('/bin/rm -rf ' . $sandbox);
}

?>
<html>
    <head>
        <title>GetShell for Next</title>
    </head>
    <body>
        <h2>Hint</h2>
        <hr>
        <div>
            <ul>
                <li>1. flag is not here (this server)</li>
                <li>2. python3</li>
                <li>3. 脚本要骚才能 getflag</li>
                <li><b>不准暴力！不准暴力！！不准暴力！！！</b></li>
            </ul>
        </div>
        <hr>
        <h2>Source</h2>
        <hr>
        <div>
            <?php highlight_string($source);?>
        </div>
        <hr>
        <h2>Your IP</h2>
        <hr>
        <div>
            <?php echo "IP : {$_SERVER['REMOTE_ADDR']}"; ?>
        </div>
    </body>
</html>
