<?php

namespace app\admin\controller;

use app\common\interface\Login as LoginInterface;
use tank\BaseController;
use app\model\Login as LoginModel;
use tank\Request\Request;
use tank\Tool\Tool;
use function tank\BathVerParams;
use function tank\VerificationInclude;
use app\void\Router;


/**
 * 登录类
 * @author liulei
 * @date 2024-07-15
 * @implements LoginInterface
 * @extends BaseController
 */
class Login extends BaseController implements LoginInterface
{
    /**
     * 账号密码登录
     * @access public
     * @author liulei
     * @param Request $request
     * @api Login/AccountLogin
     * @see @param app\verification\Login.php
     * @date 2024-07-15
     * @return mixed
     */
    public function AccountLogin(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude("Login")["login"]);
        $params = $this->app->getAppParams();
        $find = (new LoginModel())->where([
            "login_account" => $params["login_account"],
            "login_password" => $params["login_password"],
        ])->Once();
        if (empty($find))
            return $this->throwWarning(LOGINMODEL_LOGIN_WARNING);
        else {
            return $this->throwSuccess(LOGINMODEL_LOGIN_SUCCESS, $find);
        }
    }
    /**
     * 新建用户账号
     * @access public
     * @author liulei
     * @param Request $request
     * @api Login/CreateLogin
     * @see @param app\verification\Login.php
     * @date 2024-07-15
     * @return mixed
     */
    public function CreateLogin(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude("Login")["create"]);
        (new LoginModel())->Modelcreate($this->app->getAppParams(true));
        return $this->throwSuccess(LOGINMODEL_CREATE_SUCCESS, []);
    }
}