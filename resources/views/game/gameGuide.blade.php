@extends("layouts.main")
@section('title','راهنمای بازی اول')
@section('content')

    <div class="w3-content w3-center w3-justify persian " style="margin-top: 200px;">

        <div id="guide1" class="w3-xlarge guide" dir="rtl" style="line-height: 50px">
            در مرحله ی اول، همه ی افراد به صورت هم زمان
            <br>
            به 8 سوال اطلاعات عمومی
            <br>
             با جابه جا کردن  <span>
                <div class=" badge badge-pill w3-blue">&nbsp;</div>
            </span>
            بر روی اسلایدر


            <span class="mx-auto"><div class="w3-row" style="">
                <div class="w3-col l1 ">
                    <div class="  w3-right-align w3-xlarge" style="margin-top:0px; font-weight: bold;position: relative;top:-1px" id="min">0</div>
                </div>
                <div class="w3-col l10">
                    <input type="range" min="0" max="150" step="1" class="slider" id="myRange">
                </div>
                <div class="w3-col l1 ">
                    <div class=" w3-left-align w3-xlarge" style="margin-top:0px;font-weight: bold;position: relative;top:-1px" id="max">150</div>
                </div>

            </div>
            </span>
پاسخ را در 30 ثانیه تخمین خواهید زد.


        </div>
        <div id="guide2" class="w3-xlarge  w3-hide guide" dir="rtl" style="line-height: 50px">
            اگر در زمان مقرر پاسخ خود را ثبت نکنید
            <br>
            متاسفانه از دور آزمایش خارج خواهید شد
            <br>
            و
            <br>
            بازی شرکت کنندگان دیگر را نیز متوقف خواهید کرد
        </div>
        <div id="guide3" class="w3-xlarge w3-hide guide" dir="rtl">
            پس لطفا در رعایت تمامی زمان بندی ها در کل بازی کوشا باشید
        </div>

{{--        <button class="w3-button w3-border w3-padding-large w3-round  w3-section persian">بعدی</button>--}}
{{--        <a href="/game1" class="w3-button w3-border w3-padding-large w3-round  w3-section persian w3-hide" id="next" style="">شروع</a>--}}

        @include('layouts.progress_bar')
    </div>




    <script>

    $(document).ready(function () {
        var i = 2;
$('button').click(function () {
   next();
})
        function next(time){
            if(i==3) {
                $('a').removeClass("w3-hide");
                $(this).addClass("w3-hide");
            }
            $(".guide").addClass("w3-hide");
            $(("#guide" + i)).removeClass("w3-hide");
            $('#mybar').css({'width':'100%'})
            width=100;
            move(time)
            i++;
        }

move(20)

        setTimeout(function(){
            next(20);
        },20000);
        setTimeout(function(){
            next(10);
        },40000);
        // setTimeout(next,20000);
        // setTimeout(next,40000);
//all of them 20 secondes
        // last one 10 seconde

    {{--    setInterval(function(){--}}
    {{--        window.location.replace("{{route('logout')}}");--}}
    {{--    },15000)--}}

    })


    </script>


@endsection
