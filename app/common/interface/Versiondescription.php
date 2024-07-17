<?php

namespace app\common\interface;
use tank\Request\Request;

interface Versiondescription
{
    public function CreateVersiondescription(Request $request);
    public function getVersiondescription(Request $request);
}