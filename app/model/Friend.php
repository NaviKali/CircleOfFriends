<?php
/**
 * 模型层模拟
 */
namespace app\model;

class Friend extends \tank\MD\MD
{

    /**Key绑定 */
    public static $Key = "friend_id";
    /**Guid绑定 */
    public static $Guid = ["friend_guid", "friend_first_guid"];
    /**显示字段 */
    public static $field = [
        'friend_first_guid' => self::SHOW,
        'friend_second_guid' => self::SHOW,
    ];
    /**写入字段 */
    public static $writefield = [
        'friend_first_guid' => "好友绑定人(自己)",
        'friend_second_guid' => "好友绑定人(对方)",
    ];
    /**开启软删除 */
    public static $OpenSoftDelete = true;
    /**软删除字段 */
    public static $SoftDeleteField = "friend_delete_time";
    /**开启其余字段写入 */
    public static $OpenOtherWriteField = true;
    /**其余字段写入 */
    public static $OtherWriteField = [
        'create' => "friend_create_time",
        'update' => "friend_update_time",
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