/**
 * 请求接口
 * @param {string} url 
 * @param {string} type 
 * @param {Object} params 
 * @param {Array} field
 * @returns 
 */
function RequestUrl(url, type, params, field) {
    var data = [];
    var regex_data = /[A-Za-z0-9]/;
    for (let i = 0; i < field.length; i++) {
        if (params[field[i]].match(regex_data)) {
            data.push(btoa(params[field[i]]));
        } else {
            data.push(params[field[i]]);
        }
    };
    var end = mergeIntoObject(field, data)
    return fetch(url, {
        method: type,
        body: JSON.stringify(end),
        headers: {
            "Content-Type": "application/json"
        },
    }).then((res) => {
        return res.json();
    })
}
/**
 * 验证是否请求成功
 * @param {Object} res 
 * @returns 
 */
function isRequestSuccess(res) {
    return res.code == 200 ? true : false;
}
/**
 * 快速构建路径
 * @param {string} url
 */
function buildUrl(url) {
    return globalUrl + url;
}

/**
 * 合并两个数组
 * @param {Array} keys 
 * @param {Array} values 
 * @returns 
 */
function mergeIntoObject(keys, values) {
    if (keys.length !== values.length) {
        throw new Error('两个数组应该一样长!');
    }

    return keys.reduce((obj, key, index) => {
        obj[key] = values[index];
        return obj;
    }, {});
}
/**
 * 跳转携带Guid
 */
function ToGetGuid() {
    return "LOGINGUID=" + localStorage.getItem("LOGIN_GUID")
}