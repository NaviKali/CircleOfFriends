<?php

namespace app\common\interface;
use tank\Request\Request;

interface Menu{
    public function CreateMenu(Request $request);
    public function SelectMenu(Request $request);
}