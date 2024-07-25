<?php
/**
 * 模型层模拟
 */
namespace app\model;

class FriendCheck extends \tank\MD\MD
{
        /**
         * 好友申请状态
         * @access public
         * @static
         * @var array
         */
        public static array $FriendCheckStatus = [
                "1" => "待同意",
                "2" => "成功同意",
                "3" => "拒绝同意",
        ];

        /**Key绑定 */
        public static $Key = "friendcheck_id";
        /**Guid绑定 */
        public static $Guid = ["friendcheck_guid", "friendcheck_send_name"];
        /**显示字段 */
        public static $field = [
                'friendcheck_send_name' => self::SHOW,
                'friendcheck_receiv_name' => self::SHOW,
                'friendcheck_status' => self::SHOW,
                'friendcheck_create_time' => self::SHOW,
        ];
        /**写入字段 */
        public static $writefield = [
                'friendcheck_send_name' => "好友申请发送用户",
                'friendcheck_receiv_name' => "好友申请接收用户",
                'friendcheck_status' => "好友申请状态",
        ];
        /**开启软删除 */
        public static $OpenSoftDelete = true;
        /**软删除字段 */
        public static $SoftDeleteField = "friendcheck_delete_time";
        /**开启其余字段写入 */
        public static $OpenOtherWriteField = true;
        /**其余字段写入 */
        public static $OtherWriteField = [
                'create' => "friendcheck_create_time",
                'update' => "friendcheck_update_time",
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