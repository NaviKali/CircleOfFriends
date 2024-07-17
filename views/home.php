[Start]
@link{#css#bootstrap.min.css}link@
@link{#css#index.css}link@
@link{#css#home.css}link@

<div class="Home-Block">
    <!-- 左边导航栏 -->
    <div class="Top-Nav">
        <p class="Nav-Title">$-TK["NavTitle"]-$</p>
        <ul class="nav nav-pills flex-column">
            @foreach($TK["MenuList"] as $k => $v){
            if($v->children == []){
            echo ' <li class="nav-item">
                <img src="#img#'.$v->menu_icon.'" alt="">
                <a class="nav-link" href=".'.$v->menu_to.'">'.$v->menu_name.'</a>
            </li>';
            }else
            {
            $con = '';
            foreach($v->children as $children_k => $children_v)
            {
            $con.='<li>
                <img src="#img#'.$children_v->menu_icon.'" alt="">
                <a class="dropdown-item" href=".'.$children_v->menu_to.'">'.$children_v->menu_name.'</a>
            </li>';
            }
            echo '
            <li class="nav-item dropdown">
                <img src="#img#'.$v->menu_icon.'" alt="">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">'.$v->menu_name.'</a>
                <ul class="dropdown-menu">
                    '.$con.'
                </ul>
            </li>';
            }
            }foreach@
        </ul>
    </div>
    <!-- 信息区块展示 -->
    <div class="Information-Block">
        <!-- 顶部小功能按钮组合 -->
        <div class="Top-Small-Button">
            <div class="Top-Small-Button-Block">
                <div class="Top-Small-Button-Item" data-bs-toggle="offcanvas" data-bs-target="#friendslist"
                    aria-controls="offcanvasRight">
                    <img src="#img#HomeImage/好友.png" alt="">
                </div>
                <div class="Top-Small-Button-Item" data-bs-toggle="offcanvas" data-bs-target="#noticeslist"
                    aria-controls="offcanvasRight">
                    <img src="#img#HomeImage/通知.png" alt="">
                </div>
                <div class="Top-Small-Button-Item">
                    <img id="user_avatar" src="#img#" alt="">
                </div>
            </div>
        </div>
    </div>
</div>







<!-- 通知列表 -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="noticeslist" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5>通知列表</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        ...
    </div>
</div>


<!-- 好友列表 -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="friendslist" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5>好友列表</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        ...
    </div>
</div>













<!-- 简介说明 -->
<div class="modal fade" id="Introduction-description">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    版本介绍说明[发布时间:20$-TK["versiondescriptionData"]["versiondescription_create_time"]-$]</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                $-TK["versiondescriptionData"]["versiondescription_data"]-$
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>









<!-- 菜单控制面板 -->
<div class="Menu-Control-Panel" id="Menu-Control-Panel">
    <!-- 背景 -->
    <div class="Panel-BackgroundColor">
    </div>
    <!-- 菜单列表 -->
    <div class="Menu-Control-List">
        $(
        //*统计宽度
        $width = 100/count($TK["MenuList"]);
        foreach($TK["MenuList"] as $k => $v){
        echo '
        <div class="Menu-Control-Item" style="width: '.$width.'vw;" width="'.$width.'">
            <div class="Menu-Control-Item-P">
                <p class="Menu-Control-Item-P-data" to=".'.$v->menu_to.'">'.$v->menu_name.'</p>
                <img class="Menu-Control-Item-P-img" src="#img#'.$v->menu_icon.'" alt="">
            </div>
        </div>
        ';
        }
        )$
    </div>
</div>


<!-- 用户信息填写弹窗 -->
<div class="modal fade" id="WriteUserInformation">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">用户信息填写</h4>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="user_name" name="user_name">
                    <label for="user_name">用户姓名</label>
                </div>
                <label for="user_sex" style="color: #6E7174;">用户性别</label>
                <select class="form-select" id="user_sex">
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" id="user_phone" name="user_phone" min="11" max="11">
                    <label for="user_phone">用户手机号</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" id="user_information" name="user_information">
                    <label for="user_information">用户信息</label>
                </div>
                <button style="float: right;" type="submit" class="btn btn-success"
                    onclick="write_user_information_submit()">提交</button>
            </div>
        </div>
    </div>
</div>

@script{#js#bootstrap.bundle.min.js}script@
@script{#js#index.js}script@
@script{#js#request.js}script@
@script{#js#home.js}script@
[/Start]