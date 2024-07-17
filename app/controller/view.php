<?php

namespace app\controller;

require_once '../../config/Base.php';

use tank\Func\Func;
use function tank\{VerificationInclude, Weclome};
use app\void\Router;

Func::AutoVerCallFunction(Router::class);