window.onload=	function () {
    var u1 =document.getElementById("logAndReg");//获取登录注册组件id
    var u2 =document.getElementById("userMsg");//获取用户信息组件id

    spans = getCookie("telnumber");//获取span的数据
    //alert(spans);
    if (spans !='')//判断当前span数据是否为空
    {
        u1.style.display="none";//数据不为空则隐藏登录注册组件
    }else{
        u2.style.display="none";//数据为空则隐藏用户信息组件
    }

    var space1=document.getElementById("spaceToSignin");
    var space2=document.getElementById("spaceToTea");
    var space3=document.getElementById("spaceToStu");

    var accountType1=document.getElementById("curAccountTea");
    var accountType2=document.getElementById("curAccountStu");
    if(spans=="") {
        space2.style.display = "none";
        space3.style.display = "none";
    }
    else{
        if(getCookie("TorS")=="0"){
            document.getElementById("curAccountTea").innerHTML=getCookie("telnumber");
            accountType2.style.display="none";
            space1.style.display = "none";
            space3.style.display = "none";
        }
        else{
            document.getElementById("curAccountStu").innerHTML=getCookie("telnumber");
            accountType1.style.display="none";
            space1.style.display = "none";
            space2.style.display = "none";
        }
    }

    //添加课程图片
    var bigImg = document.createElement("img"); //创建一个img元素
    var curCourse=getCookie('curCourse');
    bigImg.src = "images/"+curCourse+".jpg"; //给img元素的src属性赋值
    bigImg.className="img-responsive";
    var myp = document.getElementById('curCourse'); //获得dom对象
    myp.href="images/"+curCourse+".jpg";
    myp.appendChild(bigImg);//为dom添加子元素img
}