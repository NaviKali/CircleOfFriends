<?php
namespace app\common\interface;

use tank\Request\Request;

interface User
{
    public function CreateUser(Request $request);
    public function getMyInfo(Request $request);
}