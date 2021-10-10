@extends("layouts.main")
@section('title','سوالات ارزیابی')
@section('content')

    <div class="w3-content w3-center persian w3-justify" style="margin-top: 200px">

        <div id="description" class="w3-justify bold w3-large w3-center" dir="rtl" style="line-height: 50px">

        </div>

        <div id="answer" class="" style=" margin-top: 100px">
            <form action="">

                <input type="text" class="w3-xxxlarge" id="demo"  value="" />


            </form>
        </div>

        <button class="w3-button w3-round w3-light-gray w3-border w3-border-gray persian w3-margin-top">بعدی</button>

    </div>

    <script>

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });




            var startTime = new Date().getTime();

            var descriptions = [
                "نفر اول در رتبه بندی نهایی سوالات اطلاعات عمومی  را تا چه اندازه از نظر دانش عمومی برتر از خود احساس کردید؟",
                "نفر اول در رتبه بندی نهایی در سوالات اطلاعات عمومی  را تا چه اندازه رقیب خود احساس کردید؟",
                "از مشارکت  شما شرکت کنندگان عزیز صمیمانه متشکریم . <br>  پاسخ های شما بررسی خواهد شد و  با توجه به عملکرد شما در بازی و برای قدردانی در ترویج کارعلمی، با شما تماس خواهیم گرفت."
            ];
            var i = 0
            selectDescription();
            // $('button').click(function() {



            //     if (i >= 2) {
            //         $('#answer').addClass("w3-hide");



            //     }
            //     selectDescription()
            //     if (i >= 3) {
            //         $("#result").addClass("w3-hide");
            //         $(this).addClass("w3-hide");
            //     }



            //     $.ajax({
            //         url: " {{ route('questions') }} ",
            //         type: "POST",
            //         data: {
            //             "result": $('input').val(),
            //             "time": (new Date().getTime()-startTime),
            //             "category": (i+2)
            //         }
            //     })




            // })

            function selectDescription() {
                $("#description").html(descriptions[i]);
                i++;
            }




    var $d5 = $("#demo");
    var $d5_buttons = $("button");
    $d5.ionRangeSlider({
             skin: "big",
                min: 0,
                max: 10,
                from: 0,
                step: 1,
                grid: true,
                grid_num: 10,
                grid_snap: false
    });

    var d5_instance = $d5.data("ionRangeSlider");
    $d5_buttons.on("click", function () {




                if (i >= 2) {
                    $('#answer').addClass("w3-hide");



                }
                selectDescription()
                if (i >= 3) {
                    $("#result").addClass("w3-hide");
                    $(this).addClass("w3-hide");
                }



                $.ajax({
                    url: " {{ route('questions') }} ",
                    type: "POST",
                    data: {
                        "result": $('input').val(),
                        "time": (new Date().getTime()-startTime),
                        "category": (i+2)
                    }
                })



                var from = 0;


        d5_instance.update({

            from: from,

        });


    });










        })
    </script>
@endsection
