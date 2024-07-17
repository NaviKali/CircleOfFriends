<?php

namespace app\middleware;

use tank\Request\Request;
use tank\Func\Func;
use tank\Web\http;

class routerunreal
{
    /**
     * 路由虚幻
     * @access public
     * @static
     */
    public static function Handle()
    {
        $params = Request::param();
        if (empty($params["isStartUnreal"]) and !str_contains(Func::getUrl(),"public")) {
            header("Location:" . http::RouterUnreal());
        }
    }

}