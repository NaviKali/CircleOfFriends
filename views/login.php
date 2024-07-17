[Start]
@link{#css#bootstrap.min.css}link@
@link{#css#index.css}link@
@link{#css#login.css}link@
$(
var("trademark","胡锦超职业技术学校@2024");
)$

<!-- 区块 -->
<div class="Login-Block">
    <!-- 登录背景载入 -->
    <img class="Login-BackGround" id="Login-BackGround" src="#img#LoginBackground/">
    <!-- 展示区块 -->
    <div class="Login-ShowBlock" id="Login-ShowBlock">
        <p class="title">云梦</p>
        <!-- 输入框区块 -->
        <div class="Login-Input-Block">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="account" placeholder="请输入用户名" name="account">
                <label for="account">用户名</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="password" class="form-control" id="password" placeholder="请输入密码" name="password">
                <label for="password">密码</label>
            </div>
            <button type="submit" class="btn btn-success" onclick="Login()">登录</button>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#registered">注册</button>
            <!-- 商标 -->
            <div class="trademark">
                <p data-bs-toggle="modal" data-bs-target="#website_description">网站说明</p>
                <p>$(get("trademark");)$</p>
            </div>
        </div>
    </div>
</div>
<!-- 网站说明 -->
<div class="modal fade" id="website_description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">网站说明</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ol type="1">
                    <li>此网站属于朋友圈的形式，用户可以发布自己的朋友圈进行操作，也可以观看别人的朋友圈。[发布朋友圈需要经过管理员审核]</li>
                    <li>禁止<em>黄赌毒</em> 行为出现。</li>
                    <li>禁止评论不良语气或造成他人心里影响的句语。</li>
                    <li>此网站某些功能需要付费，请励志谨慎!</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- 注册 -->
<div class="modal fade" id="registered">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">注册用户</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="registered_account" placeholder="请输入用户名" name="account">
                    <label for="account">用户名</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="registered_password" placeholder="请输入密码"
                        name="password">
                    <label for="password">密码</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="registered()">注册</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
@script{#js#bootstrap.bundle.min.js}script@
@script{#js#index.js}script@
@script{#js#request.js}script@
@script{#js#login.js}script@
[/Start]