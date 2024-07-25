/**
 * 点击添加好友
 */
function AddFriend(guid)
{
    var field = ["friendcheck_send_name","friendcheck_receiv_name"];
    RequestUrl(buildUrl("FriendCheck/CreateFriendCheck"),"POST",{
        friendcheck_send_name:localStorage.getItem("LOGIN_GUID"),
        friendcheck_receiv_name:guid
    },field).then((res)=>{
        if(isRequestSuccess(res))
            {
                MakeAlert("success",res.msg);
            }else{
                MakeAlert("warning",res.msg);
            }
    });
}