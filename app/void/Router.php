<?php

namespace app\void;

use tank\BaseController;
use tank\View\View;
use app\model\Menu as MenuModel;
use app\model\Versiondescription as VersiondescriptionModel;
use tank\View\Dom;
use function tank\getPublicUrl;
use tank\Request\Request;

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
        //*获取父级菜单
        $menulist = (new MenuModel())->where([
            "menu_father_guid" => ""
        ])->select();
        foreach ($menulist as $k => $v) {
            $v->children = (new MenuModel())->where([
                "menu_father_guid" => $v->menu_guid,
            ])->select();
        }

        //*获取版本说明
        $versiondescription = (new VersiondescriptionModel())->where([])->Once();

        View::Start("home", [
            "NavTitle" => "云梦",
            "MenuList" => $menulist,
            "versiondescriptionData" => $versiondescription,
        ], [
            "title" => "[云梦]Home"
        ]);
    }
}