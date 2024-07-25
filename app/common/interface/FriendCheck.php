<?php

namespace app\common\interface;
use tank\Request\Request;

interface FriendCheck
{
    public function CreateFriendCheck(Request $request);
}