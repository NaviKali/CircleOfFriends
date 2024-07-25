<?php

namespace app\admin\controller;

use tank\BaseController;
use app\common\interface\Friend as FriendInterface;
use app\model\Friend as FriendModel;
use tank\Request\Request;
use function tank\VerificationInclude;
use function tank\BathVerParams;

/**
 * 好友类
 * @author liulei
 * @date 2024-07-17
 * @implements FriendInterface
 * @extends BaseController
 */
class Friend extends BaseController implements FriendInterface
{
}