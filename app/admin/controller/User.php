<?php

namespace app\admin\controller;

use tank\BaseController;
use app\common\interface\User as UserInterface;
use tank\Request\Request;
use function tank\BathVerParams;
use function tank\VerificationInclude;
use app\model\User as UserModel;


/**
 * 用户信息类
 * @author liulei
 * @date 2024-07-15
 * @implements UserInterface
 * @extends BaseController
 */
class User extends BaseController implements UserInterface
{
    /**
     * 创造对应用户
     * @access public
     * @author liulei
     * @api User\CreateUser
     * @param Request $request look down
     * @see @param app\verification\User.php
     * @date 2024-07-15
     * @return mixed
     */
    public function CreateUser(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude("User")["create"]);
        (new UserModel())->Modelcreate($this->app->getAppParams(true));
        return $this->throwSuccess(USERMODEL_CREATE_SUCCESS);
    }
    /**
     * 获取我的信息
     * @access public
     * @author liulei
     * @api User\getMyInfo
     * @param Request $request look down
     * @see @param app\verification\User.php
     * @date 2024-07-15
     * @return mixed
     */
    public function getMyInfo(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude("User")["getmyinfo"]);
        $params = $this->app->getAppParams();
        $find = (new UserModel())->where([
            "login_guid" => $params["login_guid"]
        ])->Once();
        if (empty($find)) {
            return $this->throwWarning(USERMODEL_GETMYINFO_WARNING);
        } else
            return $this->throwSuccess(USERMODEL_GETMYINFO_SUCCESS, $find);
    }
}