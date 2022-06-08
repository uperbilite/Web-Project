<!-- cookie -->
function getCookie(cname){
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name)==0) { return c.substring(name.length,c.length); }
    }
    return "";
}
function logout(){
    document.cookie='telnumber=;expires=time()-60';
    document.cookie='TorS=;expires=time()-60';
}
function setCookie(cname,cvalue){
    document.cookie = cname+"="+cvalue+";";
}
function set(){
    var uid = document.getElementById("telnumber").value;
    var tors = document.getElementsByName("TorS");
    for(i=0;i<tors.length;++i){
        if(tors[i].checked){
            setCookie("TorS",tors[i].value);
        }
    }
    if (uid!="" && uid!=null){
        setCookie("telnumber",uid);
    }else{
        alert("请完整填写信息");
    }
    //alert(document.cookie);
}
<!-- cookie -->