@extends("layouts.main")
@section('title','بازی دوم')
@section('content')





    <div id="result" class="">
        <div class="w3-row w3-margin-top ">

            <div class="w3-col  l9">
                <div id="title" class="w3-right  persian w3-xlarge bold w3-border"
                     style=""></div>
                <div class="w3-row-padding w3-margin-top">
                    <div class="w3-col l6 ">


                        @include('layouts.onlineUser')
                    </div>



                    <div class="w3-col l6 mx-auto w3-center w3-content " style="">

                        <div id="label" class=" px-5 w3-text-right persian w3-large w3-margin-top" dir="rtl"
                             style=" line-height: 35px;">
                            مبلغ
                            اهدایی


                        </div>
                        <form action="" style="" class="mt-2  px-5">
                            <div class=" w3-row px-5">

                                <div class="w3-col l6 w3-right">
                                    <div class="w3-row">
                                        <div class="w3-col l3 w3-right w3-xlarge" style="position: relative;top:10px">
                                            000
                                        </div>
                                        <div class="w3-col l3  w3-right">
                                            <input type="text" class="w3-input w3-border w3-round w3-xlarge" min="0"
                                                   max="50" required
                                            >

                                        </div>
                                        <div class="w3-col l6 persian w3-right-align font-weight-bold w3-large"
                                             style="position: relative;right:5px;top:10px">
                                            تومان
                                        </div>

                                    </div>
                                </div>

                                <div class="w3-col  w3-right l3">
                                    <button type="submit"
                                            class="w3-button w3-right persian w3-round w3-light-gray w3-border "
                                            style="position: relative;top:5px">ثبت
                                    </button>
                                </div>

                            </div>


                        </form>

                        <div class="w3-padding-large" style="" id="showRandom">

                            <div class="persian w3-justify w3-large " dir="rtl">
                                منتظر باشید تا قبل از مشخص کردن مبلغ اعلامی مورد نظر خود، به صورت تصادفی مبلغ اعلامی یکی
                                از اعضاء را در دست قبل مشاهده کنید
                            </div>
                            <button class="w3-button w3-round w3-light-gray w3-border persian " id="randomPoint">
                                موافقم
                            </button>
                        </div>


                    </div>
                </div>
            </div>
            <div class="w3-col l3">


                <h6 id="title" class="w3-right-align w3-margin-right persian">رتبه بندی نهایی</h6>
                @include("layouts.orderList")
            </div>
        </div>


        @include('layouts.progress_bar')
    </div>




    <script>


        var constPersons = ["P", "N", "B", "A"];
        var varPersons = ["H", "M", "O", "G"];
        var i = 1;

        var category = 2;
        var countSession = 0;
        var session = ["اول", "دوم", "سوم", "چهارم", "پنجم", "ششم", "هفتم", "هشتم", "نهم", "دهم"];
        var conditions = [
            [1, 50],
            [7, 0],
            [3, 25],
            [4, 0],
            [1, 50],
            [2, 10],
            [5, 50],
            [6, 35],
            [8, 50]
        ];
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var option = {content: "50000", placement: "left", html: true};

            $("#pp4").removeClass("w3-hide ");
            var width = 100;

            mainProgram();
            setInterval(function(){
                next();
            },40000)
            var user = Cookies.get('user_letter');
            removeVarPerson();
            varPersons.push(user);
            var persons = varPersons.concat(constPersons);


            setPersons();
            $('form').submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: "answers/store_answer_question_game1"
                    ,
                    type: "POST"
                    ,
                    data: {
                        "result": $('input').val()
                        ,
                        "time": parseInt((100 - timer) / (100 / 15))
                        ,
                        "category": category
                    }
                })

                var value = $('input').val();
                option.content = value;
                var remind = 50000 - value;
                if (i % 2 != 0) {
                    coinAnimation();


                    $("#money").text(remind);
                } else {
                    option.placement = "top";
                    option.content = value.toString();
                    $("#user").popover(option);
                    console.log(option)
                    $("#user").popover("show");
                    if (countSession == 5) {
                        conditions[4][1] = value;
                    }
                }
                $('form').addClass('w3-hide');
                $('#label').addClass('w3-hide');


            })

            var timeID;
            option.content = "nothing";


            $("#randomPoint").click(function () {
                width=100;
                $('#mybar').css('width','100%');
                clearInterval(id);
                for(var n = 1 ; n <=8 ; n++){
                    $(('#pn'+n)).popover('dispose')
                }
                $('#pp4').popover('dispose');
                $('#showRandom').addClass("w3-hide");
                timeID = setInterval(randomPoint, 50);
                setTimeout(function () {
                    var o = {
                        content:"<span class='font-weight-bold w3-medium' >"+ conditions[countSession - 1][1]+",000</span>",
                        placement: "left",
                        html:true
                    };
                    var id;
                    if(conditions[countSession - 1][0]==4){
                        id = "#pp" + conditions[countSession - 1][0];
                    }else {
                        id = "#pn" + conditions[countSession - 1][0];
                    }
                    $(id).popover(o);
                    $(id).popover("show");
                    $('form').removeClass("w3-hide");
                    $('#label').removeClass('w3-hide');

                    $('#showRandom').addClass("w3-hide");
                    width = 100;
                    move(40);

                }, 7000)

            });
            var t = 0;

            function randomPoint() {

                t++;

                var random = Math.floor((Math.random() * 8) + 1);
                var id = "#pn" + random;
                var space = "";
                for (var i = 0; i < 10; i++) {
                    space += "&nbsp;"
                }


                $(id).popover({
                    content: space,
                    placement: "left",
                    html: true
                });

                $(id).popover("show");

                setTimeout(function () {
                    $(id).popover('dispose');

                }, 1000)

                if (t >= 100) {
                    clearInterval(timeID);
                    t = 0;


                }
            }



function next() {
    console.log(countSession)
    if (countSession >= 1 && countSession < 10) {
        $("#pps" + conditions[countSession - 1][0]).popover("dispose");
    }
    clearInterval(id);

    $('form').removeClass('w3-hide');
    $('#label').removeClass('w3-hide');

    mainProgram();
}

            function mainProgram() {
                move(40);
                $('input').val("");
                // $("#next").addClass("w3-hide");
                if (i <= 20) {
                    console.log(i)
                    if (i % 2 != 0) {

                        if (i > 1) {
                            $('form').addClass("w3-hide");
                            $('#label').addClass('w3-hide');

                            $('#showRandom').removeClass("w3-hide");

                        } else {
                            $('#showRandom').addClass("w3-hide");

                        }
                        $("#label").html("مبلغی که به صورت رندوم فقط قرار است به دیگران  نمایش داده <br> می شود را در زیر بنویسید (مبلغ اعلامی) ");
                        $("#bag,hr ,#money ,#background_money,#description").addClass("w3-hide");
                        $('#title').text("دست " + session[countSession]);
                        category = 2;


                    } else {
                        width = 100;
                        move(40);
                        $("#label").html("مبلغی که با دیگران به اشتراک می گذارید ولی <br> به آنها نمایش داده نمی شود  را در زیر بنویسید (مبلغ اهدایی)");
                        $('#showRandom').addClass("w3-hide");
                        $("#bag, hr , #money ,#background_money,#description").removeClass("w3-hide");
                        $("#money").text(50000);
                        $("#user").popover("dispose");
                        category = 3;


                        countSession++;
                    }
                } else {
                    $("#next").addClass("w3-hide");
                    $("#nextPath").removeClass("w3-hide");
                }


                i++;
            }

            function selectOfPersonMoney() {
                option.content = "<span class='w3-red'>" + conditions[countSession][1] + "</span>";
                $("#pn1").popover({
                    content: content
                });
                $("#pn1").popover("show");
            }





            function removeVarPerson() {
                var index;
                for (var i = 0; i <= varPersons.length; i++) {
                    if (varPersons[i] === user) {
                        index = i;
                    }
                }
                varPersons.splice(index, 1);
            }


            function setPersons() {
                for (var x = 1; x <= persons.length; x++) {
                    var id = "#p" + x;
                    $(id).text(persons[x - 1]);
                    if (x == 4) {

                    }
                }
            }


            function coinAnimation() {

                $('#coin').removeClass("w3-hide");
                $('#coin').animate({
                    top: "33px"


                }, 1000, function () {

                })
                $('#coin').animate({
                    opacity: "0"


                }, 200, function () {
                    $('#coin').css({opacity: "1", top: "150px"})
                    $('#coin').addClass("w3-hide");
                })
            }


        })
    </script>

@endsection


