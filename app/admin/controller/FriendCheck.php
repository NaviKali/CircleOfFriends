<?php

namespace app\admin\controller;

use tank\BaseController;
use app\common\interface\FriendCheck as FriendCheckInterface;
use tank\Request\Request;
use app\model\FriendCheck as FriendCheckModel;
use function tank\VerificationInclude;
use function tank\BathVerParams;

/**
 * 好友申请类
 * @author liulei
 * @date 2024-07-1
 * @implements FriendCheckInterface
 * @extends BaseController
 */
class FriendCheck extends BaseController implements FriendCheckInterface
{
    /**
     * 创建好友申请
     * @access public
     * @author liulei
     * @param Request $request
     * @api FriendCheck/CreateFriendCheck
     * @see @param app\verification\FriendCheck.php
     * @date 2024-07-1
     * @return mixed
     */
    public function CreateFriendCheck(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude("FriendCheck")["create"]);

        $params = $this->app->getAppParams();

        $find = (new FriendCheckModel())->where([
            '$or' => [
                [
                    "friendcheck_send_name" => $params["friendcheck_send_name"],
                    "friendcheck_receiv_name" => $params["friendcheck_receiv_name"],
                ],
                [
                   "friendcheck_send_name" => $params["friendcheck_receiv_name"],
                    "friendcheck_receiv_name" => $params["friendcheck_send_name"],
                ],
            ]
        ])->select();

        if ($find)
            return $this->throwWarning("申请已存在!");

        (new FriendCheckModel)->Modelcreate(array_merge($this->app->getAppParams(true), [
            "1"//*默认状态为待审核
        ]));
        return $this->throwSuccess(FRIENDCHECKMODEL_CREATE_SUCCESS);
    }
}