
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

    var Want;
    $(document).ready(function () {
        $.ajax({
            url : "readMysql/readCourse.php",     //后台请求的数据的PHP文件  (自己修改 想读哪个就把谁改掉 不要删除../）
            //php文件最后应为echo json——encode（）
            dataType : "text",//数据格式
            type : "post",//请求⽅式
            async : false,//是否异步请求

            success : function(data) {  //如果请求成功，返回数据data
                //alert(data);
                Want = data;  //将php中读到的data 写入 Want里
                //$("#test").html(Want); //在html页⾯id=test的标签⾥显⽰Want 的内容   ，如不输出可以删去
            },
        })
    })
    if(Want!='null') {
        Want = Want.substr(1, Want.length - 2);
        //添加已选课程
        course = Want.split(',');
        var myp = document.getElementById('portfoliolist');
        for (i = 0; i < course.length; ++i) {
            var first = document.createElement("div");
            first.className = "portfolio course mix_all  wow bounceIn";
            first.style = "display: inline-block; opacity: 1;";
            var second = document.createElement("div");
            second.className = "portfolio-wrapper grid_box";
            var A = document.createElement("a");
            A.href = "stuCourse.html";

            A.onclick = Function("setCookie('curCourse'," + course[i] + ")");
            var Img = document.createElement("img");
            Img.src = "images/" + course[i] + ".jpg";
            Img.className = "img-responsive";
            var Span = document.createElement("span");
            Span.className = "zoom-icon";

            A.appendChild(Img);
            A.appendChild(Span);
            second.appendChild(A);
            first.appendChild(second);

            myp.appendChild(first);
        }
    }
}