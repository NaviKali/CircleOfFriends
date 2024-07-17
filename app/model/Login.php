<?php
/**
 * 模型层模拟
 */
namespace app\model;

class Login extends \tank\MD\MD
{
    /**Key绑定 */
    public static $Key = "login_id";
    /**Guid绑定 */
    public static $Guid = ["login_guid", "login_account"];
    /**显示字段 */
    public static $field = [
        'login_guid' => self::SHOW,
        'login_account' => self::SHOW,
        'login_password' => self::SHOW,
        'login_create_datetime' => self::SHOW,
    ];
    /**写入字段 */
    public static $writefield = [
        'login_account' => "账号",
        'login_password' => "密码"
    ];
    /**开启软删除 */
    public static $OpenSoftDelete = true;
    /**软删除字段 */
    public static $SoftDeleteField = "login_delete_time";
    /**开启其余字段写入 */
    public static $OpenOtherWriteField = true;
    /**其余字段写入 */
    public static $OtherWriteField = [
        'create' => "login_create_time",
        'update' => "login_update_time",
    ];
    /**开启业务姓名字段写入 */
    public static $UserNameWriteField = true;
    /* 默认业务姓名字段 */
    public const DEFAULTUSERNAME = 'User';
    /**默认业务姓名字段值 */
    public const DEFAULTUSERNAMEVALUE = "admin";
    /**
     * 添加前
     */
    public static function onBeforeCreate()
    {
    }
    /**
     * 添加后
     */
    public static function onAfterCreate()
    {
    }
    /**
     * 修改前
     */
    public static function onBeforeUpdate()
    {
    }
    /**
     * 修改后
     */
    public static function onAfterUpdate()
    {

    }
    /**
     * 删除前
     */
    public static function onBeforeDelete()
    {

    }
    /**
     * 删除后
     */
    public static function onAfterDelete()
    {

    }
    /**
     * 查询前
     */

    public static function onBeforeSelect()
    {

    }
    /**
     * 查询后
     */
    public static function onAfterSelect()
    {

    }

}