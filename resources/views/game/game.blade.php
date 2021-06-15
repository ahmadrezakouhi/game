@extends("layouts.main")
@section('title','بازی اول')
@section('content')





    <div id="result" class="w3-hide">
        <div class="w3-row w3-margin-top ">
            <div class="w3-col  l9">
                <div class="w3-row-padding w3-margin-top">
                    <div class="w3-col l6">
                        @include('layouts.onlineUser')
                    </div>

                    <div class="w3-col l6">
                        <form action="" class="w3-hide" style="margin-top: 200px">
                            <div class="w3-row-padding w3-clear">
                                <div class="w3-col l6 w3-right">
                                    <label for="" class=" w3-large persian " dir="rtl">چه کسی نفر اول
                                        شد؟ </label>


                                </div>
                                <div class="w3-col l6">
                                    <input type="text" class="w3-input w3-border w3-round" maxlength="1"
                                           id="first_person" style="text-transform: uppercase">
                                </div>
                            </div>
                            <div class="w3-row-padding w3-clear w3-margin-top">
                                <div class="w3-col l6 w3-right">
                                    <label for="" class=" w3-large persian" dir="rtl">چه کسی نفر آخر
                                        شد؟ </label>


                                </div>
                                <div class="w3-col l6">
                                    <input type="text" class="w3-input w3-border w3-round " maxlength="1"
                                           id="last_person"
                                           style="text-transform: uppercase">
                                </div>
                            </div>

                            <div class="w3-padding">
                                <button class="w3-button w3-round w3-light-gray w3-border w3-margin-top persian" >ثبت</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="w3-col l3">
                <h3 id="title" class="w3-right-align w3-margin-right persian"></h3>
                @include("layouts.orderList")
            </div>
        </div>

    </div>
    <div class="w3-content w3-center w3-hide" id="question_section" style="margin-top: 100px">
        <div id="titleOfQuestion" class="persian w3-large bold"></div>
        <div class="w3-section w3-xlarge persian" id="question" style="">
        </div>
        <div class="slidecontainer " style="margin-top: 200px">

            <div class="w3-row">
                <div class="w3-col l1 ">
                    <div class="  w3-right-align w3-xlarge" style="margin-top:0px; font-weight: bold;position: relative;top:-10px" id="min">150</div>
                </div>
                <div class="w3-col l10">
                    <input type="range" class="slider" id="myRange">
                </div>
                <div class="w3-col l1 ">
                    <div class=" w3-left-align w3-xlarge" style="margin-top:0px;font-weight: bold;position: relative;top:-10px" id="max">150</div>
                </div>

            </div>
<div class="font-weight-bold w3-xlarge" id="valueOfMyRange"></div>

        </div>
        <button class="w3-button w3-border w3-round w3-light-gray persian w3-hide" id="record" style="margin-top: 80px">ثبت</button>

    </div>

<div id="second_counter" class="w3-content w3-center w3-jumbo w3-hide" style="margin-top: 300px">3</div>




    @include('layouts.progress_bar')

    <script>
        var answers = [];
        var questions = [
            {
                question: "تراکم جمعیت در تهران، در هر کیلومتر مربع، چند نفر است؟"
                , answer: 890
                , min: 0
                , max: 1000
            },
            {
                question: "ایران دارای چند کیلومتر مرز آبی با احتساب دریای خزر،خلیج فارس و دریای عمان  دارد؟"
                , answer: 2700
                , min: 2000
                , max: 3000
            },
            {
                question: "طول مرز میان دو کشور ایران و عراق چند کیلومتر است؟",
                answer: 1458
                , min: 1000
                , max: 2000
            },
            {
                question: "ارتفاع کل بارندگی ها در 6 ماه دوم سال 1399 چند میلیمتر بوده است؟",
                answer: 107
                , min: 0
                , max: 1000
            },
            {
                question: "در نیمه ی نخست سال 98 مجموعا چند فقره جرم در حوزه ی جرایم جنایی در تهران صورت گرفته؟"
                , answer: 153
                , min: 0
                , max: 1000
            },
            {
                question: "چند درصد از جنگل های هیرکانی در استان گیلان واقع شده است؟",
                answer: 26
                , min: 0
                , max: 1000

            },
            {
                question: "به طور متوسط وزن ابرهای کومولوس چند هزار کیلوگرم است؟",
                answer: 5000
                , min: 4000
                , max: 5000
            },
            {
                question: "عمیق ترین نقطه ی خلیج فارس چند متر است؟",
                answer: 93
                , min: 0
                , max: 1000
            }
        ]
        var id;
        var i = 0;
        var session = ['اول', 'دوم', 'سوم', 'چهارم', 'پنجم', 'ششم', 'هفتم', 'هشتم'];
       // var session2=['یک','دو','سه','چهار','پنج','شش','هفت','هشت']
        var table = [
            [1, 3, 1, 1, 1, 2, 1, 1],
            [2, 5, 2, 4, 3, 1, 4, 2],
            [5, 1, 3, 2, 6, 4, 3, 4],
            [3, 2, 4, 5, 5, 3, 5, 3],
            [4, 7, 5, 6, 4, 5, 2, 5],
            [7, 6, 8, 3, 2, 7, 6, 7],
            [6, 4, 6, 7, 7, 6, 8, 6],
            [8, 8, 7, 8, 8, 8, 7, 8],
        ];
        var constPersons = ["P", "N", "B", "A"];
        var varPersons = ["H", "M", "O", "G"];
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var rec = true;
            var user = Cookies.get('user_letter');
            removeVarPerson();
            varPersons.push(user);
            var persons = varPersons.concat(constPersons);
            console.log(varPersons);
            console.log(user);


              createQuestion();



            var r= 0;
           var idRepeat = setInterval(function () {
               if(r>8) {

               // }else {
                   clearInterval(idRepeat);
               }
               choose_section();
            },33000)
            function choose_section(){
               if(rec){
                   $('#second_counter').addClass("w3-hide");
                   record();
                   rec=false;
               }else{

                   next();
                   rec=true;
               }
            }
            function next(){
                createQuestion();
                $('#record').addClass('w3-hide');
            }


            // $("#record").click(function () {
            //  record();
            // });


            function record(){
                $('#mybar').css('width', "100%");
                width = 100;
                clearInterval(id);
                $("#result").removeClass("w3-hide");
                $("#question_section").addClass("w3-hide")

                $("#next").addClass("w3-hide");
                $('#title').text("رتبه بندی سوال " + session[i - 1]);
                $('#title').addClass("w3-animate-right");
                console.log((100 - timer) / (100 / 15))
                $.ajax({
                    url:"answers/store_answer_question_game1"
                    ,
                    type:"POST"
                    ,
                    data:{
                        "result":$("#myRange").val()
                        ,
                        "time":parseInt((100 - timer) / (100 / 15))
                        ,
                        "category":1
                    }
                })
                $('#valueOfMyRange').empty();
                setPersonOrder();
                animatePersons();

                
            }


            function animatePersons() {
                var animation = {
                    position: 'relative',
                    top: '0px',
                    opacity: '1'
                };
                $('#p1,#p2,#p3,#p4,#p5,#p6,#p7,#p8').parent().css({
                    "position": 'relative',
                    "top": '-3000px',
                    "opacity": '0'
                })
                var time = 1600;
                $('#p1').parent().animate(
                    animation,
                    time,
                    function () {
                        $('#p2').parent().animate(
                            animation,
                            time,
                            function () {
                                $('#p3').parent().animate(
                                    animation,
                                    time,
                                    function () {
                                        $('#p4').parent().animate(
                                            animation,
                                            time,
                                            function () {
                                                $('#p5').parent().animate(
                                                    animation,
                                                    time,
                                                    function () {
                                                        $('#p6').parent().animate(
                                                            animation,
                                                            time,
                                                            function () {
                                                                $('#p7').parent().animate(
                                                                    animation,
                                                                    time,
                                                                    function () {
                                                                        $('#p8').parent().animate(
                                                                            animation,
                                                                            time,

                                                                            function () {
                                                                                move(20);
                                                                                $('form').removeClass("w3-hide ");
                                                                                $('form').addClass("w3-animate-opacity ")
                                                                            }
                                                                        )
                                                                    }
                                                                )
                                                            }
                                                        )
                                                    }
                                                )

                                            }
                                        )
                                    }
                                )
                            }
                        )
                    }
                )
            }

            function createQuestion() {
                $("#result").addClass("w3-hide");
                $('#progressBar').addClass("w3-hide");
                $('#second_counter').removeClass("w3-hide");
                $('#second_counter').text("3");
                var second_counter = 2;
                var second_counter_id = setInterval(function(){
                    if(second_counter==1){
                        clearInterval(second_counter_id);
                    }
                    $('#second_counter').text(second_counter);
                    second_counter--;
                },1000);
                setTimeout(function(){
                    $('#second_counter').addClass("w3-hide");
                    $('#progressBar').removeClass('w3-hide');
                    clearInterval(id);
                    $('#mybar').css('width', "100%");
                    width = 100;

                    move(30);

                    $('#titleOfQuestion').text(" سوال " + (i+1));
                    $("#question").text(questions[i].question);
                    $("#myRange").attr({
                        "max": questions[i].max,
                        "min": questions[i].min,
                       
                    });
                    $("#myRange").val((questions[i].min+500));


                    $("#min").text(questions[i].min);
                    $("#max").text(questions[i].max);
                    $("#question_section").removeClass("w3-hide");
                    $("form").addClass("w3-hide");
                    i++;
                },3000)

            }


            function setPersonOrder() {

                for (var x = 0; x < 8; x++) {
                    var id = "#p" + (table[x][i - 1]);
                    $(id).text(persons[x]);
                    var id2 ="#pp"+(table[x][i-1]);
                    $(id2).addClass("w3-hide");

                    if(x==3){
                        $(id2).removeClass("w3-hide");
                    }

                }

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










        })

        $('form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url:"answers/store_rank"
                ,
                type:"POST"
                ,
                data :{
                    "first_person":$("#first_person").val()
                    ,
                    "last_person":$('#last_person').val()
                    ,
                    'time':parseInt((100 - timer) / (100 / 15))
                }
            })
            $("#first_person").val("");
            $("#last_person").val("");
            $('form').addClass("w3-hide");

        })


        $(document).on('input', '#myRange', function() {
            $('#valueOfMyRange').text( $(this).val() );
            $('#record').removeClass("w3-hide");
        });

    </script>

@endsection


