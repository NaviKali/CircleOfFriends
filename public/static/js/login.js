var Login_ShowBlock = document.getElementById("Login-ShowBlock")
var Login_BackGround = document.getElementById("Login-BackGround");


document.body.onload = function () {
    fuzzyAnimate()
    LoginShowBlockAnimate()
    RandomLoginBackGroundImageSelect()
}

/**
 * 随机背景图片选择
 */
function RandomLoginBackGroundImageSelect() {
    var src = Login_BackGround.src;
    var number = Math.floor(Math.random() * 5 + 1);
    src = src + `${number}.jpg`;
    Login_BackGround.src = src
}

/**
 * 展示区块动画
 */
function LoginShowBlockAnimate() {
    Login_ShowBlock.style.top = "1000px"
    setTimeout(() => {
        Login_ShowBlock.style.transition = "all 0.5s"
        Login_ShowBlock.style.top = "0px"
    }, 1500);
}

/**
 * 注册用户
 */
function registered() {
    const field = ["login_account", "login_password"];
    RequestUrl(buildUrl("Login/CreateLogin"), "POST", {
        login_account: document.getElementById("registered_account").value,
        login_password: document.getElementById("registered_password").value
    }, field)
}

/**
 * 登录账号
 */
function Login() {
    const field = ["login_account", "login_password"];
    RequestUrl(buildUrl("Login/AccountLogin"), "POST", {
        login_account: document.getElementById("account").value,
        login_password: document.getElementById("password").value
    }, field).then((res) => {
        if (res.code == 200) {
            MakeAlert("success", res.msg);
            console.log(res.data);
            localStorage.setItem("LOGIN_GUID", res.data.login_guid);
            setTimeout(() => {
                location.href = "./HomePage?" + ToGetGuid()
            }, 2000);
        }
    })
}