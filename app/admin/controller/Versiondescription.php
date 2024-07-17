<?php

namespace app\admin\controller;

use tank\BaseController;
use app\common\interface\Versiondescription as VersiondescriptionInterface;
use tank\Request\Request;
use function tank\VerificationInclude;
use function tank\BathVerParams;
use app\model\Versiondescription as VersiondescriptionModel;

/**
 * 版本说明类
 * @author liulei
 * @date 2024-07-16
 * @implements VersiondescriptionInterface
 * @extends BaseController
 */
class Versiondescription extends BaseController implements VersiondescriptionInterface
{
    /**
     * 创建版本说明
     * @access public
     * @author liulei
     * @api Versiondescription\CreateVersiondescription
     * @param Request $request look down
     * @see @param app\verification\Versiondescription.php
     * @date 2024-07-16
     * @return mixed
     */
    public function CreateVersiondescription(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude("Versiondescription")["create"]);
        (new VersiondescriptionModel)->Modelcreate($this->app->getAppParams(true));
        return $this->throwSuccess(VERSIONDESCRIPTIONMODEL_CREATE_SUCCESS);
    }
    /**
     * 获取版本说明
     * @access public
     * @author liulei
     * @api Versiondescription\getVersiondescription
     * @param Request $request hasn't param
     * @date 2024-07-16
     * @return mixed
     */
    public function getVersiondescription(Request $request): mixed
    {
        $find = (new VersiondescriptionModel())->Once();
        return $this->throwSuccess(VERSIONDESCRIPTIONMODEL_SELECT_SUCCESS,$find);
    }
}