onload=function() {
//获取所有的图片
    var play = document.getElementById('play');
    var aList = document.getElementById('playlist').getElementsByTagName('a');  //获取所有的a
    var iconList = play.getElementsByTagName('li');		//获取所有的按钮

//定义循环变量
    var m = 1;
    var timer = setInterval(runControl, 1000);
//定义控制定时的函数
    function runControl() {
        if (m >= 5) {
            m = 0;
        }
        //调用 控制图标
        controlIcon(m);
        //调用 控制图片
        controlImg(m);
        m++;

    }


//定义 控制 控制图标 变化的函数
    function controlIcon(a) {
        //所有变灰
        for (var i = 0; i < iconList.length; i++) {
            iconList[i].className = "";
        }
        //当前变红
        iconList[a].className = "active";
    }

//定义 控制图片变化的 函数
    function controlImg(a) {
        //所有的隐藏
        for (var i = 0; i < aList.length; i++) {
            aList[i].className = "";
        }
        //当前的显示
        aList[a].className = "active";
    }


//鼠标滑动到轮播图上 ，定时停止
    play.onmouseover = function () {
        clearInterval(timer);			//停止定时
    }
//鼠标移走 定义重启
    play.onmouseout = function () {
        timer = setInterval(runControl, 1000);
    }

//给所有控制图标 li 绑定鼠标滑过事件
    for (var i = 0; i < iconList.length; i++) {
        (function (i) {
            iconList[i].onmouseover = function () {
                //当前图标变红
                controlIcon(i);
                //当前图片显示
                controlImg(i);
                //改变 m的值
                m = i + 1;
            }
        })(i)
    }
//获取所有的li
    var lis = document.getElementById('nav').getElementsByTagName('li');
//绑定 鼠标悬停事件  遍历
    for (var i = 0; i < lis.length; i++) {
        lis[i].onmouseover = function () {
            this.style.backgroundColor = "red";
            //显示子菜单
            var uls = this.getElementsByTagName('ul');
            if (uls.length > 0) {
                uls[0].style.display = "block";
            }
        }
        lis[i].onmouseout = function () {
            this.style.backgroundColor = "";
            //隐藏 子菜单
            var uls = this.getElementsByTagName('ul');
            if (uls.length > 0) {
                uls[0].style.display = "none";
            }
        }
    }
}
