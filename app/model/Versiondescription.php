<?php
/**
 * 模型层模拟
 */
namespace app\model;
use tank\Tool\Tool;

class Versiondescription extends \tank\MD\MD
{

        /**Key绑定 */
        public static $Key = "versiondescription_id";
        /**Guid绑定 */
        public static $Guid = ["versiondescription_guid", "versiondescription_data"];
        /**显示字段 */
        public static $field = [
                'versiondescription_guid' => self::SHOW,
                'versiondescription_data' => self::SHOW,
                'versiondescription_create_time' => self::SHOW,
        ];
        /**写入字段 */
        public static $writefield = [
                'versiondescription_data' => "版本说明"
        ];
        /**开启软删除 */
        public static $OpenSoftDelete = true;
        /**软删除字段 */
        public static $SoftDeleteField = 'versiondescription_delete_time';
        /**开启其余字段写入 */
        public static $OpenOtherWriteField = true;
        /**其余字段写入 */
        public static $OtherWriteField = [
                'create' => "versiondescription_create_time",
                'update' => "versiondescription_update_time",
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
                if((new Versiondescription())->select(true) != 0)
                        Tool::abort("版本说明已经定义过了!");
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