let myinfo = "";
document.body.onload = function () {
    MakeModalClick('Introduction-description')
    myinfo = VerIsWriteUserInformation()
    fuzzyAnimate()
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
}
document.body.onkeydown = function (even) {
    if (even.key == "m") {
        MenuControlPanelOperate()

    }
}
document.body.onkeyup = function (even) {
    if (even.key == "m") {
        setTimeout(() => {
            document.getElementById("Menu-Control-Panel").style.opacity = "0"
            setTimeout(() => {
                document.getElementById("Menu-Control-Panel").style.display = "none"
            }, 250);
        }, 50)
    }
}

/**
 * 验证是否填写用户信息
 */
function VerIsWriteUserInformation() {
    var field = ["login_guid"];
    RequestUrl(buildUrl("User/getMyInfo"), "POST", {
        login_guid: localStorage.getItem("LOGIN_GUID"),
    }, field).then((res) => {
        if (res.code == 200) {
            document.getElementById("user_avatar").src = document.getElementById("user_avatar").src +res.data.user_avatar
            return res.data
        } else {
            MakeModalClick("WriteUserInformation");
        }
    });
}

/**
 * 填写用户信息
 */
function write_user_information_submit() {
    if (document.getElementById("user_phone").value.length != 11) {
        console.error("用户手机号长度不符合!");
        alert("用户手机号长度不符合!");
    } else {
        var field = ["user_name", "user_sex", "user_phone", "user_information", "login_guid"];
        RequestUrl(buildUrl("User/CreateUser"), "POST", {
            user_name: document.getElementById("user_name").value,
            user_sex: document.getElementById("user_sex").value,
            user_phone: document.getElementById("user_phone").value,
            user_information: document.getElementById("user_information").value,
            login_guid: localStorage.getItem("LOGIN_GUID"),
        }, field).then((res) => {
            if (res.code == 200) {
                location.reload()
            }
        })
    }
}
/**
 * 菜单控制面板操作
 */
function MenuControlPanelOperate() {
    document.getElementById("Menu-Control-Panel").style.display = "block"
    setTimeout(() => {
        document.getElementById("Menu-Control-Panel").style.opacity = "1"
    }, 50)

    let Items = document.getElementsByClassName("Menu-Control-Item");
    let Ps = document.getElementsByClassName("Menu-Control-Item-P")
    let pdata = document.getElementsByClassName("Menu-Control-Item-P-data");
    let pimg = document.getElementsByClassName("Menu-Control-Item-P-img");

    for (let i = 0; i < Items.length; i++) {
        Items[i].onmouseover = function () {
            for (let a = 0; a < Items.length; a++) {
                Items[a].style.width = parseInt(Items[i].getAttribute("width")) + "vw"
                Items[a].style.backgroundColor = "black"
                pdata[i].style.display = "none"
                pimg[i].style.display = "block"
            }
            Items[i].style.width = parseInt(Items[i].getAttribute("width")) + 20 + "vw"
            Items[i].style.backgroundColor = "white"
            pdata[i].style.display = "block"
            pimg[i].style.display = "none"

        }
        Items[i].onmouseout = function () {
            Items[i].style.backgroundColor = "black"
            pdata[i].style.display = "none"
            pimg[i].style.display = "block"
            Items[i].style.width = parseInt(Items[i].getAttribute("width")) + "vw"
        }
        Items[i].onclick = function () {
            location.href = pdata[i].getAttribute("to")
        }
    }
}
