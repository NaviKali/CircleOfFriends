<?php

namespace app\common\interface;

use tank\Request\Request;

interface Login
{
    public function CreateLogin(Request $request);
    public function AccountLogin(Request $request);

}