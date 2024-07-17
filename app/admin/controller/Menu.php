<?php

namespace app\admin\controller;

use tank\BaseController;
use app\common\interface\Menu as MenuInterface;
use tank\Request\Request;
use function tank\VerificationInclude;
use function tank\BathVerParams;
use app\model\Menu as MenuModel;

/**
 * 菜单类
 * @author liulei
 * @date 2024-07-16
 * @implements MenuInterface
 * @extends BaseController
 */
class Menu extends BaseController implements MenuInterface
{
    /**
     * 创建菜单
     * @access public
     * @author liulei
     * @api Menu/CreateMenu
     * @param Request $request look down
     * @see @param app\verification\Menu.php
     * @date 2024-07-16
     * @return mixed
     */
    public function CreateMenu(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude("Menu")['create']);
        (new MenuModel())->Modelcreate($this->app->getAppParams(true));
        return $this->throwSuccess(MENUMODEL_CREATE_SUCCESS);
    }
    /**
     * 获取菜单树列表
     * @access public
     * @author liulei
     * @api Menu/SelectMenu
     * @param Request $request hasn't param
     * @date 2024-07-16
     * @return mixed
     */
    public function SelectMenu(Request $request): mixed
    {
        //*获取父级菜单
        $select = (new MenuModel())->where([
            "menu_father_guid" => ""
        ])->select();
        foreach ($select as $k => $v) {
            $v->children = (new MenuModel())->where([
                "menu_father_guid" => $v->menu_guid,
            ])->select();
        }
        return $this->throwSuccess(MENUMODEL_SELECT_SUCCESS, $select);
    }
}