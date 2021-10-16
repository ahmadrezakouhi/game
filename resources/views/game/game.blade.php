@extends("layouts.main")
@section('title', 'بازی اول')
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
                                    <input type="text" class="form-control" maxlength="1" id="first_person"
                                        style="text-transform: uppercase" >
                                </div>
                            </div>
                            <div class="w3-row-padding w3-clear w3-margin-top">
                                <div class="w3-col l6 w3-right">
                                    <label for="" class=" w3-large persian" dir="rtl">چه کسی نفر آخر
                                        شد؟ </label>


                                </div>
                                <div class="w3-col l6">
                                    <input type="text" class="form-control " maxlength="1" id="last_person"
                                        style="text-transform: uppercase" >
                                </div>
                            </div>

                            <div class="w3-padding">
                                <button
                                    class="w3-button w3-round w3-light-gray w3-border w3-margin-top persian">ثبت</button>
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

            <div class="w3-row" id="rangeOuter">
                <div class="w3-col l1 " >
                    <div class="  w3-right-align w3-xlarge"
                        style="margin-top:0px; font-weight: bold;position: relative;top:-10px" id="min">150</div>
                </div>
                <div class="w3-col l10 ">
                    <input type="range" class="slider " id="myRange" >
                </div>
                <div class="w3-col l1 ">
                    <div class=" w3-left-align w3-xlarge"
                        style="margin-top:0px;font-weight: bold;position: relative;top:-10px" id="max">150</div>
                </div>

            </div>
            <div class="font-weight-bold w3-xlarge" id="valueOfMyRange"></div>

        </div>
        <button class="w3-button w3-border w3-round w3-light-gray persian w3-hide" id="record"
            style="margin-top: 80px">ثبت</button>

    </div>

    <div id="second_counter" class="w3-content w3-center w3-jumbo w3-hide" style="margin-top: 300px">3</div>




    @include('layouts.progress_bar')

    <script>
        var answers = [];
        var questions = [{
                question: "اگر بی نهایت خودکار با طول معمول در دسترس باشد، تخمین بزنید حدودا چند خودکار برای طی کردن طول یک واگن قطار مسافربری لازم است؟",
                answer: 182,
                min: 0,
                max: 1000
            },
            {
                question: "اگر تعداد لغاتی که یک کودک 4 ساله میداند را در قالب استاندارد و یک طرفه روی ورق A4 بنویسیم، تخمین میزنید حدودا  به چند ورق نیاز داشته باشیم؟",
                answer: 6,
                min: 0,
                max: 1000
            },
            {
                question: "مساحت جنگل های آمازون را حدودا چند برابر جنگل های هیرکانی در ایران تخمین میزنید؟",
                answer: 100,
                min: 0,
                max: 1000
            },
            {
                question: "برای آنکه طول مرز بین ایران و عراق را پیاده طی کنید، تخمین میزنید حدودا چند ساعت باید پیاده روی کنید؟",
                answer: 321,
                min: 0,
                max: 1000
            },
            {
                question: "اگر بخواهیم اعداد یک تا یک میلیون را بشماریم و در هر روز 16 ساعت را به این کار اختصاص دهیم، تخمین بزنید این شمارش حدوداً چند روز طول خواهد کشید؟",
                answer: 89,
                min: 0,
                max: 1000
            },
            {
                question: "تخمین بزنید حدودا چند ثانیه پس از مصرف الکل، سلول های مغزی نسبت به حضور این ماده واکنش نشان میدهند؟",
                answer: 360,
                min: 0,
                max: 1000

            },
            {
                question: "در طی سه سال در شهر تهران، تعداد حدودی جرم در حوزه ی جرایم جنایی را چند فقره تخمین میزنید؟ ",
                answer: 900,
                min: 0,
                max: 1000
            },
            {
                question: "مقدار کلسترول در کاسه ای که با 20 قاشق چای خوری کره پر میشود را حدودا چند میلی گرم تخمین میزنید؟",
                answer: 200,
                min: 0,
                max: 1000
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

        var startTimeQuestion;
        var endTimeQuestion;
        var canSend = true;
        var changedRange = false;

        var startTimeRank;
        var first_person;
        var first_person_time;
        var new_first_person;
        var new_first_person_time;
        var last_person;
        var last_person_time;
        var new_last_person;
        var new_last_person_time;

        function initialRankVariables() {
            first_person = "";
            first_person_time = "";
            new_first_person = "";
            new_first_person_time = "";
            last_person = "";
            last_person_time = "";
            new_last_person = "";
            new_last_person_time = "";

        }

        initialRankVariables();

        $(document).ready(function() {
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



            createQuestion();


            var r = 0;
            var idRepeat = setInterval(function() {
                if (r > 8) {

                    // }else {
                    clearInterval(idRepeat);
                }
                if (!changedRange) {
                    window.location.replace("{{ route('logout') }}");
                }
                choose_section();

            }, 33000)

            function choose_section() {

                if (rec) {
                    $('#second_counter').addClass("w3-hide");
                    record();
                    rec = false;

                    hideSectionOne();



                } else {

                    next();
                    rec = true;
                    canSend = true;
                    changedRange = false;
                    sendRankData();

                }
            }



            function hideSectionOne() {

                $('#mybar').css('width', "100%");
                width = 100;
                clearInterval(id);
                $("#result").removeClass("w3-hide");
                $("#question_section").addClass("w3-hide")

                $("#next").addClass("w3-hide");
                $('#title').text("رتبه بندی سوال " + session[i - 1]);
                $('#title').addClass("w3-animate-right");

                $('#valueOfMyRange').empty();
                setPersonOrder();
                animatePersons();

            }


            function next() {
                createQuestion();
                $('#record').addClass('w3-hide');
            }


            $("#record").click(function() {
                record();
            });


            function record() {
                if (canSend) {




                    $.ajax({
                        url: "{{ route('answer') }}",
                        type: "POST",
                        data: {
                            "result": $("#myRange").val(),
                            "time": endTimeQuestion - startTimeQuestion,

                        }
                    })

                    canSend = false;
                    $('#record').addClass('w3-hide')
                    $("#myRange").prop('disabled', true);
                    $("#rangeOuter").addClass('w3-opacity-max');

                }



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
                    function() {
                        $('#p2').parent().animate(
                            animation,
                            time,
                            function() {
                                $('#p3').parent().animate(
                                    animation,
                                    time,
                                    function() {
                                        $('#p4').parent().animate(
                                            animation,
                                            time,
                                            function() {
                                                $('#p5').parent().animate(
                                                    animation,
                                                    time,
                                                    function() {
                                                        $('#p6').parent().animate(
                                                            animation,
                                                            time,
                                                            function() {
                                                                $('#p7').parent().animate(
                                                                    animation,
                                                                    time,
                                                                    function() {
                                                                        $('#p8')
                                                                            .parent()
                                                                            .animate(
                                                                                animation,
                                                                                time,

                                                                                function() {
                                                                                    move(
                                                                                        20
                                                                                    );
                                                                                    $('form')
                                                                                        .removeClass(
                                                                                            "w3-hide "
                                                                                        );
                                                                                    $('form')
                                                                                        .addClass(
                                                                                            "w3-animate-opacity "
                                                                                        );
                                                                                    startTimeRank
                                                                                        =
                                                                                        new Date()
                                                                                        .getTime();

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
                $("#myRange").prop('disabled', false);
                $('#rangeOuter').removeClass('w3-opacity-max');
                setTimeout(function() {
                    startTimeQuestion = new Date().getTime();
                }, 3000)
                if (i == 8) {
                    window.location.replace("{{ route('result') }}")
                }

                $("#result").addClass("w3-hide");
                $('#progressBar').addClass("w3-hide");
                $('#second_counter').removeClass("w3-hide");
                $('#second_counter').text("3");
                var second_counter = 2;
                var second_counter_id = setInterval(function() {
                    if (second_counter == 1) {
                        clearInterval(second_counter_id);
                    }
                    $('#second_counter').text(second_counter);
                    second_counter--;
                }, 1000);
                setTimeout(function() {
                    $('#second_counter').addClass("w3-hide");
                    $('#progressBar').removeClass('w3-hide');
                    clearInterval(id);
                    $('#mybar').css('width', "100%");
                    width = 100;

                    move(30);

                    $('#titleOfQuestion').text(" سوال " + (i + 1));
                    $("#question").text(questions[i].question);
                    $("#myRange").attr({
                        "max": questions[i].max,
                        "min": questions[i].min,

                    });
                    $("#myRange").val((questions[i].min + 500));


                    $("#min").text(questions[i].min);
                    $("#max").text(questions[i].max);
                    $("#question_section").removeClass("w3-hide");
                    $("form").addClass("w3-hide");
                    i++;
                }, 3000)

            }


            function setPersonOrder() {

                for (var x = 0; x < 8; x++) {
                    var id = "#p" + (table[x][i - 1]);
                    $(id).text(persons[x]);
                    var id2 = "#pp" + (table[x][i - 1]);
                    $(id2).addClass("w3-hide");

                    if (x == 3) {
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



            $('#first_person').keyup(function() {
                if ($(this).val()) {

                    if (first_person) {
                        if (new_first_person) {
                            first_person = new_first_person;
                        }
                        new_first_person = $(this).val();
                    } else {
                        first_person = $(this).val();
                    }

                    if (first_person_time) {
                        if (new_first_person_time) {
                            first_person_time = new_first_person_time
                        } else {
                            new_first_person_time = new Date().getTime();
                        }

                    } else {
                        first_person_time = new Date().getTime();
                    }


                }
                // console.log('first_preson : ' + first_person + " time : " + (first_person_time -
                //     startTimeRank));
                // console.log('new_first_preson : ' + new_first_person + " time : " + (new_first_person_time -
                //     startTimeRank));
            })


            $('#last_person').keyup(function() {
                if ($(this).val()) {

                    if (last_person) {
                        if (new_last_person) {
                            last_person = new_last_person;
                        }
                        new_last_person = $(this).val();
                    } else {
                        last_person = $(this).val();
                    }

                    if (last_person_time) {
                        if (new_last_person_time) {
                            last_person_time = new_last_person_time
                        } else {
                            new_last_person_time = new Date().getTime();
                        }

                    } else {
                        last_person_time = new Date().getTime();
                    }


                }
                // console.log('last_person : ' + last_person + " time : " + (last_person_time -
                //     startTimeRank));
                // console.log('new_last_person : ' + new_last_person + " time : " + (new_last_person_time -
                //     startTimeRank));
            })

            $('form').submit(function(e) {
            e.preventDefault();

            $(this).addClass('w3-hide');
        })


        })




        function sendRankData() {
          if ($('#first_person').val() && $('#last_person').val()) {

            if (first_person_time) {
                first_person_time -= startTimeRank;
            } else {
                first_person_time = "";
            }

            if (new_first_person_time) {
                new_first_person_time -= startTimeRank;
            } else {
                new_first_person_time = "";
            }

            if (last_person_time) {
                last_person_time -= startTimeRank;
            } else {
                last_person_time = "";
            }

            if (new_last_person_time) {
                new_last_person_time -= startTimeRank;
            } else {
                new_last_person_time = "";
            }

            $.ajax({
                url: "{{ route('rank') }}",
                type: "POST",
                data: {
                    "first_person": first_person.toUpperCase(),
                    "first_person_time": first_person_time,
                    "new_first_person": new_first_person.toUpperCase(),
                    "new_first_person_time": new_first_person_time,
                    "first_person_correct": $('#p1').text(),
                    "last_person": last_person.toUpperCase(),
                    "last_person_time": last_person_time,
                    "new_last_person": new_last_person.toUpperCase(),
                    "new_last_person_time": new_last_person_time,
                    "last_person_correct": $('#p8').text()

                },
                success: function(res) {
                    // console.log(res)
                }
            })
            $("#first_person").val("");
            $("#last_person").val("");
            $('form').addClass("w3-hide");
            initialRankVariables();

          }else{
            window.location.replace("{{ route('logout') }}");
          }
        }


        $(document).on('input', '#myRange', function() {
            $('#valueOfMyRange').text($(this).val());
            if (canSend) {
                $('#record').removeClass("w3-hide");
            }
            endTimeQuestion = new Date().getTime();
            changedRange = true;

        });
    </script>

@endsection
