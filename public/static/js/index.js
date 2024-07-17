/**
 * 全局请求路径前缀
 */
const globalUrl = "http://localhost:8080/public/app/admin.php/";
/**
 * 模糊动画
 */
function fuzzyAnimate() {
    var length = "15px";
    document.body.style.filter = `blur(${length})`;
    setTimeout(() => {
        document.body.style.transition = "all 0.5s";
        var length = "0px";
        document.body.style.filter = `blur(${length})`;
    }, 200);
}


/**
 * 提示框
 * @param {string} type
 * @param {string} data
 */
function MakeAlert(type, data) {
    var alert = document.createElement("div");
    alert.className = `alert alert-${type}`;
    var p = document.createElement("span");
    p.innerHTML = data
    alert.appendChild(p)
    alert.style.position = "absolute"
    alert.style.left = "-500px"
    alert.style.top = "40px"
    alert.style.zIndex = "1000"
    alert.style.transition = "all 1s"
    document.body.appendChild(alert);
    setTimeout(() => {
        alert.style.left = "15px"
        setTimeout(() => {
            alert.style.left = "-1000px"
        }, 4000);
    }, 300);
}

/**
 * 点击模态框
 * @param {string} id
 */
function MakeModalClick(id) {
    var button = document.createElement("button");
    button.style.display = "none";
    button.setAttribute("data-bs-toggle","modal")
    button.setAttribute("data-bs-target",`#${id}`)
    document.body.appendChild(button);
    button.click();
}