<?php

namespace app\void;

use app\model\User;
use tank\BaseController;
use app\model\Menu as MenuModel;
use app\model\Versiondescription as VersiondescriptionModel;
use app\model\FriendCheck as FriendCheckModel;
use tank\Request\Request;
use app\model\User as UserModel;


class Home extends BaseController
{
    /**
     * 进入页面获取对应数据
     * @access public
     * @static
     * @return array
     */
    public static function JoinPageGetData(): array
    {
        //*获取登录Guid
        $login_guid = Request::param()["LOGINGUID"];

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

        //*获取好友添加申请列表
        $getAddFriendsList = (new FriendCheckModel())->where([
            '$or' =>
                [
                    ["friendcheck_send_name" => $login_guid],
                    ["friendcheck_receiv_name" => $login_guid],
                ]
        ])->select();
        array_filter($getAddFriendsList, function ($query) use ($login_guid) {

            //*判断发送对象
            if ($query->friendcheck_send_name == $login_guid)
                $query->MySend = true;
            else
                $query->MySend = false;
            //*区分发送申请对象
            if ($query->MySend == true)
                $query->user = (new UserModel())->where(["login_guid" => $query->friendcheck_receiv_name])->Once();
            else
                $query->user = (new UserModel())->where(["login_guid" => $query->friendcheck_send_name])->Once();
            $query->friendcheck_status = FriendCheckModel::$FriendCheckStatus[$query->friendcheck_status];
        });

        return [
            "NavTitle" => "云梦",
            "MenuList" => $menulist,
            "versiondescriptionData" => $versiondescription,
            "AddFriendsList" => $getAddFriendsList,
        ];
    }
}