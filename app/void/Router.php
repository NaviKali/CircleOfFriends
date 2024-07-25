<?php

namespace app\void;

use tank\BaseController;
use tank\View\View;
use app\model\Menu as MenuModel;
use app\model\Versiondescription as VersiondescriptionModel;
use tank\View\Dom;
use function tank\getPublicUrl;
use tank\Request\Request;
use app\void\Home as HomeVoid;
use app\model\User as UserModel;

/**
 * 路由试图控制
 * @author liulei
 * @extends BaseController
 * @date 2024-07-15
 */

class Router extends BaseController
{
    /**
     * 登录页面
     * @access public
     * @static
     * @author liulei
     * @return void
     */
    final public static function LoginPage(): void
    {
        View::Start("login", [
        ], [
            "title" => "[云梦]Login"
        ]);
    }
    /**
     * 首页
     * @access public
     * @static
     * @author liulei
     * @return void
     */
    final public static function HomePage(): void
    {

        $con = HomeVoid::JoinPageGetData();
        View::Start("home", array_merge($con, [

        ]), [
            "title" => "[云梦]Home"
        ]);
    }
    /**
     * 好友
     * @access public
     * @static
     * @author liulei
     * @return void
     */
    final public static function FirstPage(): void
    {
        $con = HomeVoid::JoinPageGetData();

        /**
         * 获取其他用户数据
         */
        $getOtherUserData = (new UserModel)->where([
            "login_guid" => ['$ne' => Request::param()["LOGINGUID"]]
        ])->select();
        array_filter($getOtherUserData, function ($query) {
            $query->user_sex = UserModel::$UserSexType[$query->user_sex];
            return $query;
        });


        View::Start("friends", array_merge($con, [
            "OtherUserData" => $getOtherUserData,
        ]), [
            "title" => "[云梦]friends",
        ]);
    }

}