<?php

/**
 * 接收脚本参数
 */
$arg = $argv[1];

/**
 * 服务代理
 */
switch ($arg) {
        case 'apache':
                exec("Start ," . getcwd() . "\\.bat\\.StartApache.bat");
                break;
        case 'nginx':
                exec("Start ," . getcwd() . "\\.bat\\.StartNginx.bat");
                break;
        case 'server':
                exec("Start ," . getcwd() . "\\.bat\\.TankExec.bat");
        case 'web':
                echo "WEB服务开启!\n";
                exec("php -S localhost:8080");
        case 'document':
                exec("Start ," . getcwd() . "\\.bat\\.StartDocument.bat");
        case 'pack':
                shell_exec("tar -cf pack.gz ./.bat ./.do ./.exec ./app ./config ./constant ./document ./env ./logs ./proxy ./public ./views ./必看.md ./app.json ./composer.json ./composer.lock ./init.php");
        default:
                sleep(1);
                echo "没有该参数或中断执行!";
                echo "请重新启动init.php!";
                break;
}
