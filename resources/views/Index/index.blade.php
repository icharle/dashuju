<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
    <title>数据</title>
    <link rel="stylesheet" href="{{ asset('public/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/jquery.fullPage.css') }}">
    <script type="text/javascript" src="{{ asset('public/js/jquery-1.8.3.min.js') }}"></script>
</head>

<body>
<div id="pageContain" class="page-wrap">
    <div class="page current" id="page1_message">

        <p class="f1 animated fadeIn">Hi,</p>
        <p class="f2 animated fadeIn">{{ $zong['stuname'] }}</p>    <!--人名数据 -->
        <p class="f3 animated fadeIn">你已经在校</p>
        <p class="f4 animated fadeIn" id="ontime">1203<span>天</span></p> <!--在校天数数据 -->
        <p class="f5 animated fadeIn" id="time">您在学校的时间还剩<span id="lefttime">0</span>天，请珍惜</p><!--剩余天数数据 -->
        <div class="content1">
            <img src="{{ asset('public/img/1.png') }}" alt="" width="540" height="960">
            <div id="next" class="animated fadeIn"></div>
        </div>
    </div>

    <div class="page">
        <div id="page2_message">
            <div class="page2_flex">
                <p class="f6_1 animated fadeInLeft">您共参加了</p>
                <p class="f7_1 animated fadeInLeft">{{ $zong['kemushu'] }}</p>   		<!-- 考试总场次数据 -->
                <p class="f8_1 animated fadeInLeft">场考试</p>
            </div>
            <div class="page2_flex">
                <p class="f6_2 animated fadeInRight">曾经挂过</p>
                <p class="f7_2 animated fadeInRight">{{ $zong['gkemushu'] }}</p>			<!-- 挂科数据 -->
                <p class="f8_2 animated fadeInRight">科</p>
            </div>
            <div class="page2_flex">
                <p class="f6_3 animated fadeInLeft">得过的高分</p>
                <p class="f7_3 animated fadeInLeft">{{ $zong['fenshubig'] }}</p>			<!-- 最高分数据 -->
                <p class="f8_3 animated fadeInLeft">分</p>
            </div>
            <div class="page2_flex">
                <p class="f6_4 animated fadeInRight">年级最高排名</p>
                <p class="f7_4 animated fadeInRight">{{ $zong['njbigpaim'] }}</p>			<!-- 最高排名数据 -->
                <p class="f8_4 animated fadeInRight">名</p>
            </div>
        </div>
        <div class="content2">
            <img src="{{ asset('public/img/2.png') }}" alt="" width="540" height="860">
            <div id="next"></div>
        </div>
    </div>

    <div class="page">
        <div id="page4_message">
            <div class="page4_flex">
                <p class="f11 animated fadeInLeft">得过最高分的科目是</p>
                <p class="f12 animated fadeInLeft">{{ $zong['fenshubigc'] }}</p>
            </div>
        </div>
        <div id="page4_message_1">
            <div class="page4_flex_1">
                <p class="f13 animated fadeInLeft">获得的绩点</p>
                <p class="f14 animated fadeInLeft">{{ $zong['pjpoints'] }}</p>   		<!-- 考试总场次数据 -->

            </div>
            <div class="page4_flex_1">
                <p class="f13 animated fadeInRight">获得的学分</p>
                <p class="f14 animated fadeInRight">{{ $zong['credits'] }}</p>			<!-- 挂科数据 -->
            </div>
        </div>
        <div class="content4">
            <img src="{{ asset('public/img/4.png') }}" alt="" width="540" height="960">
        </div>
    </div>

    <div class="page">
        <div class="page3_flex">
            <p class="f9">您在校期间平均成绩为</p>
            <p class="f10">{{ $zong['zaixpj'] }}<span>分</span></p>
            <p class="f9">超越了全年级人数的</p>
            <p class="f10">{{ $zong['chaoyrs'] }}<span>%</span></p>
            <div id='canvasDiv'></div>
        </div>

        <div class="content3">
            <img src="{{ asset('public/img/3.png') }}" alt="" width="540" height="960">
        </div>
    </div>




    <div class="page section">
        <div class="slide">
            <div class="page5_flex">
                <img src="{{ asset('public/img/5.jpg') }}" alt="" id="p1">
                <p class="m0 a">大一上学期</p>			<!-- 大一上 平均 -->
                <p class="m0_1 a">平均分</p>
                <p class="m0_2 grade1">{{ $zong['yispjf'] }}</p>
                <div class="count">
                    <div class="mark m1">
                        <p class="a">最低分</p>
                        <p class="m1_1">{{ $zong['yislow'] }}</p>			<!-- 大一上 最低 -->
                    </div>
                    <div class="mark m2">
                        <p class="a">最高分</p>
                        <p class="m2_1">{{ $zong['yishight'] }}</p>			<!-- 大一上 最高 -->
                    </div>
                    <div class="mark m3">
                        <p class="a">班排名</p>
                        <p class="m3_1">{{ $zong['yisbjpm'] }}</p>			<!-- 大一上 班排名 -->
                    </div>
                </div>
            </div>
        </div>

        <div class="slide">
            <div class="page5_flex">
                <img src="{{ asset('public/img/5.jpg') }}" alt="" id="p2">
                <p class="m0 a">大一下学期</p>			<!-- 大一下 平均 -->
                <p class="m0_1 a">平均分</p>
                <p class="m0_2 grade2">{{ $zong['yixpjf'] }}</p>
                <div class="count">
                    <div class="mark m1">
                        <p class="a">最低分</p>
                        <p class="m1_1">{{ $zong['yixlow'] }}</p>			<!-- 大一下 最低 -->
                    </div>
                    <div class="mark m2">
                        <p class="a">最高分</p>
                        <p class="m2_1">{{ $zong['yixhight'] }}</p>			<!-- 大一下 最高 -->
                    </div>
                    <div class="mark m3">
                        <p class="a">班排名</p>
                        <p class="m3_1">{{ $zong['yixbjpm'] }}</p>			<!-- 大一下 班排名 -->
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="page5_flex">
                <img src="{{ asset('public/img/5.jpg') }}" alt="" id="p3">
                <p class="m0 a">大二上学期</p>			<!-- 大二上 平均 -->
                <p class="m0_1 a">平均分</p>
                <p class="m0_2 grade3">{{ $zong['erspjf'] }}</p>
                <div class="count">
                    <div class="mark m1">
                        <p class="a">最低分</p>
                        <p class="m1_1">{{ $zong['erslow'] }}</p>			<!-- 大二上 最低 -->
                    </div>
                    <div class="mark m2">
                        <p class="a">最高分</p>
                        <p class="m2_1">{{ $zong['ershight'] }}</p>			<!-- 大二上 最高 -->
                    </div>
                    <div class="mark m3">
                        <p class="a">班排名</p>
                        <p class="m3_1">{{ $zong['ersbjpm'] }}</p>			<!-- 大二上 班排名 -->
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="page5_flex">
                <img src="{{ asset('public/img/5.jpg') }}" alt="" id="p4">
                <p class="m0 a">大二下学期</p>			<!-- 大二下 平均 -->
                <p class="m0_1 a">平均分</p>
                <p class="m0_2 grade4">{{ $zong['erxpjf'] }}</p>
                <div class="count">
                    <div class="mark m1">
                        <p class="a">最低分</p>
                        <p class="m1_1">{{ $zong['erxlow'] }}</p>			<!-- 大二下 最低 -->
                    </div>
                    <div class="mark m2">
                        <p class="a">最高分</p>
                        <p class="m2_1">{{ $zong['erxhight'] }}</p>			<!-- 大二下 最高 -->
                    </div>
                    <div class="mark m3">
                        <p class="a">班排名</p>
                        <p class="m3_1">{{ $zong['erxbjpm'] }}</p>			<!-- 大二下 班排名 -->
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="page5_flex">
                <img src="{{ asset('public/img/5.jpg') }}" alt="" id="p5">
                <p class="m0 a">大三上学期</p>			<!-- 大三上 平均 -->
                <p class="m0_1 a">平均分</p>
                <p class="m0_2 grade5">{{ $zong['sanspjf'] }}</p>
                <div class="count">
                    <div class="mark m1">
                        <p class="a">最低分</p>
                        <p class="m1_1">{{ $zong['sanslow'] }}</p>			<!-- 大三上 最低 -->
                    </div>
                    <div class="mark m2">
                        <p class="a">最高分</p>
                        <p class="m2_1">{{ $zong['sanshight'] }}</p>			<!-- 大三上 最高 -->
                    </div>
                    <div class="mark m3">
                        <p class="a">班排名</p>
                        <p class="m3_1">{{ $zong['sansbjpm'] }}</p>			<!-- 大三下、上 班排名 -->
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="page5_flex">
                <img src="{{ asset('public/img/5.jpg') }}" alt="" id="p6">
                <p class="m0 a">大三下学期</p>			<!-- 大三下 平均 -->
                <p class="m0_1 a">平均分</p>
                <p class="m0_2 grade6">{{ $zong['sanxpjf'] }}</p>
                <div class="count">
                    <div class="mark m1">
                        <p class="a">最低分</p>
                        <p class="m1_1">{{ $zong['sanxlow'] }}</p>			<!-- 大三下 最低 -->
                    </div>
                    <div class="mark m2">
                        <p class="a">最高分</p>
                        <p class="m2_1">{{ $zong['sanxhight'] }}</p>			<!-- 大三下 最高 -->
                    </div>
                    <div class="mark m3">
                        <p class="a">班排名</p>
                        <p class="m3_1">{{ $zong['sanxbjpm'] }}</p>			<!-- 大三下 班排名 -->
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <!-- <img src="img/6.png" alt="" style="width: 100%;height: 100%;"> -->
        </div>

        <div class="content5">
            <img src="{{ asset('public/img/5.png') }}" alt="" width="540" height="960">
        </div>
    </div>


    <div class="page">
        <div class="page7_message">

            <div class="page7_message">

                <img src="{{ asset('public/img/9.jpg') }}" alt="" style="width:100%;z-index:100;" class="img9">

                <div style="position: absolute;width:91%" class="f0">
                    <div class="page7">
                        <p class="page7_1">学生姓名：</p>
                        <p style="width: 100px">{{ $zong['stuname'] }}</p>
                    </div>
                    <div class="page7">
                        <p class="page7_1">学院：</p>
                        <p style="width: 100px">{{ $zong['faculty'] }}</p>
                    </div>
                    <div class="page7">
                        <p class="page7_1">学号：</p>
                        <p style="width: 100px">{{ $zong['stuid'] }}</p>
                    </div>
                </div>
                <img src="{{ asset('public/img/9-1.jpg') }}" alt="" style="width:100%;z-index:100;">

                <div class="page7_message_day">
                    <p style="margin-top: 40px;">您的饭卡消费天数</p>
                    <p style="font-size: 60px;">{{ $lib['daytime'] }}天</p>
                </div>

            </div>
        </div>

        <div class="content7">
            <img src="{{ asset('public/img/7.png') }}" alt="" width="540" height="960">
        </div>
    </div>




    <div class="page">
        <div class="page8_message">
            <p class="xf0">在校总消费</p>
            <p class="xf1"><span class="xf1-1">{{ $lib['count'] }}</span><span>元</span></p>
            <p class="xf2"><span>超越全校人数的</span><span class="xf2-1">{{ $lib['chaoyuebaif'] }}</span><span></span></p>

            <p class="xf3"><span>单日最高消费</span><span class="xf3-1">{{ $lib['hight'] }}</span><span>元</span></p>
            <p class="xf4"><span>单日最低消费</span><span class="xf4-1">{{ $lib['low'] }}</span><span>元</span></p>


            <img src="{{ asset('public/img/10.jpg') }}" alt="">
        </div>

        <div class="content8">
            <img src="{{ asset('public/img/8.png') }}" alt="" width="540" height="960">
        </div>
    </div>

    <div class="page">
        <div class="page9_message">

            <div class="page9_message_time">
                <div style="position: absolute;width:100%" class="t0">
                    <span>您进入过图书馆</span>
                    <span>超越全校人数的</span>
                    <span class="t1">{{ $lib['libtime'] }}次</span>
                    <span class="t2">{{ $lib['libchaoyuebaif'] }}</span>
                </div>
                <img src="{{ asset('public/img/11.jpg') }}" alt="" style="width:100%;z-index:100;">

                <div class="page7_message_day">
                    <p style="margin-top:20px;">获得称号</p>
                    <p style="font-size:40px;">[图书馆馆长]</p>
                </div>

            </div>
        </div>

        <div class="content8">
            <img src="{{ asset('public/img/8.png') }}" alt="" width="540" height="960">
        </div>
    </div>


    <div class="page">
        <img src="{{ asset('public/img/6.png') }}" alt="" style="width: 100%;z-index: 999;position: absolute;">
        <div class="content8">
            <img src="{{ asset('public/img/8.png') }}" alt="" width="540" height="960">
        </div>
    </div>


</div>


</body>
<script type="text/javascript" src="{{ asset('public/js/jquery.fullPage.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/fullPage.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/pageResponse.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/ichart.1.2.min.js') }}"></script>
<script type="text/javascript">
    window.onload = window.onresize = function(){
        pageResponse({
            selectors : '.content1,.content2,.content3,.content4,.content5,.content7,.content8',
            mode : 'cover',     // auto || contain || cover ，默认模式为auto
            width : '540',
            height : '960'
        })
    }
    // window.onload=function(){


    // }
    window.setInterval(function(){ShowCountDown(2017,6,19,'lefttime');}, 200);
    window.setInterval(function(){ShowCountUp(2013,9,20,'ontime');}, 200);

    var data = [
        {name : '50-60',value : "{{ $zong['fivesix'] }}" ,color:'#1f9cf5'},
        {name : '60-75',value : "{{ $zong['sixseven'] }}",color:'#c850f0'},
        {name : '75-90',value : "{{ $zong['sevennine'] }}",color:'#f1d151'},
        {name : '90-100',value : "{{ $zong['ninehunder'] }}",color:'#0fc3f0'},
    ];
    var runPage = new FullPage({
        id : 'pageContain',
        slideTime : 200,
        effect : {
            transform : {
                translate : 'Y',
                scale : [1, 1],
                rotate : [0, 0]
            },
            opacity : [0, 1]
        },
        mode : 'wheel,touch',
        easing : 'ease'

    });
    $(function(){
        $('#pageContain').fullpage({

        });
    });

    $(function(){
        var chart = new iChart.Column2D({
            render : 'canvasDiv',
            data: data,
            width : 600,
            height : 310,
            shadow:true,
            padding:0,
            // fit:true,
            column_width:80,
            border:{
                enable:false,
            },
            animation : true,
            animation_duration:800,
            label:{
                color:'#1f9cf5',
                font:'微软雅黑',
                fontsize:15,
            },
            coordinate:{
                background_color : 0,
                grid_color:'#dcd6cb',
                axis : {
                    color : '#dcd6cb',
                    width : 0
                },
                scale:[{
                    label:{
                        color:'#dcd6cb',
                        fontsize:11,

                    },
                    position:'left',
                    scale_enable : false,
                    start_scale:0, 	//设置开始刻度
                    end_scale:1300,	//设置结束刻度
                    scale_space:400,	//设置刻度间距
                    listeners:{
                        parseText:function(t,x,y){
                            return {text:t}
                        }
                    }
                }]
            }
        });
        chart.draw();
    });
    $(function () {
        for (var i =1; i <= 6; i++) {
            var grade=$('.grade'+i).html();

            if(grade<60){
                $("#p"+i).attr('src','{{ asset('public/img/5.jpg') }}');
            }
            else if(grade>=60&&grade<80){
                $("#p"+i).attr('src','{{ asset('public/img/6.jpg') }}');
            }
            else if(grade>=80&&grade<90){
                $("#p"+i).attr('src','{{ asset('public/img/7.jpg') }}');
            }
            else if(grade>=90&&grade<100){
                $("#p"+i).attr('src','{{ asset('public/img/8.jpg') }}');
            }

        }

    })

    // function ShowCountDown(year,month,day,divname)
    // {
    // var now = new Date();
    // var endDate = new Date(year, month-1, day);
    // var leftTime=endDate.getTime()-now.getTime();
    // var leftsecond = parseInt(leftTime/1000);
    // var day1=Math.floor(leftsecond/(60*60*24));
    // var cc = document.getElementById(divname);
    // cc.innerHTML = day1;
    // }



    function ShowCountUp(year,month,day,divname)
    {
        var now = new Date();
        var endDate = new Date(year, month-1, day);
        var leftTime=now.getTime()-endDate.getTime();
        var leftsecond = parseInt(leftTime/1000);
        var day1=Math.floor(leftsecond/(60*60*24));
        var cc = document.getElementById(divname);
        cc.innerHTML = day1;
        var span = document.createElement("span");
        span.innerHTML = "天";
        document.getElementById("ontime").appendChild(span);
    }

    function ShowCountDown(year,month,day,divname)
    {
        var now = new Date();
        var endDate = new Date(year, month-1, day);
        var leftTime=endDate.getTime()-now.getTime();
        var leftsecond = parseInt(leftTime/1000);
        var day1=Math.floor(leftsecond/(60*60*24));
        var day2=Math.abs(day1);
        var cc = document.getElementById(divname);
        var dd = document.getElementById("time");
        if (day1<0) {
            dd.innerHTML="您已经毕业"+day2+"天";
        }
        else{
            cc.innerHTML = day2;
        }
    }






</script>
</html>



