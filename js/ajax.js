var Want;
$(document).ready(function () {
    $.ajax({
        url : "../editCourse.php",     //后台请求的数据的PHP文件  (自己修改 想读哪个就把谁改掉 不要删除../）
        //php文件最后应为echo json——encode（）
        dataType : "text",//数据格式
        type : "post",//请求⽅式
        async : false,//是否异步请求

        success : function(data) {  //如果请求成功，返回数据data
            Want = data;  //将php中读到的data 写入 Want里
            $("#test").html(Want); //在html页⾯id=test的标签⾥显⽰Want 的内容   ，如不输出可以删去
        },
    })
})