@extends("layouts.main")
@section('content')

    <div class="w3-content w3-center persian w3-justify" style="margin-top: 200px">

        <div id="description" class="w3-justify bold w3-large w3-center" dir="rtl">

        </div>

<div id="answer" class="" style="margin-top: 100px">
    <form action="">

        <input type="text" class="w3-xxxlarge" id="demo" name="example_name" value="" />


    </form>
</div>

        <button class="w3-button w3-round w3-light-gray w3-border w3-border-gray persian w3-margin-top">بعدی</button>

    </div>

    <script>
        $(document).ready(function(){
            var descriptions = [
                "نفر اول در رتبه بندی نهایی سوالات اطلاعات عمومی  را تا چه اندازه از نظر دانش عمومی برتر از خود احساس کردید؟"
                ,
                "نفر اول در رتبه بندی نهایی در سوالات اطلاعات عمومی  را تا چه اندازه رقیب خود احساس کردید؟"
                ,
                "از مشارکت  شما شرکت کنندگان عزیز صمیمانه متشکریم تا 1 ساعت آینده، ایمیلی جهت راهنمایی دریافت هدیه با توجه به عملکرد شما در بازی و برای قدردانی در ترویج کارعلمی، برای شما ارسال خواهد شد. در صورتی که ایمیلی به دستتان نرسید، با مجری طرح در ارتباط باشید"
            ];
            var i =0
            selectDescription();
            $('button').click(function(){
if(i>=2){
    $('#answer').addClass("w3-hide");
}
    selectDescription()
if(i>=3) {
    $("#result").addClass("w3-hide");
    $(this).addClass("w3-hide");
}
            })

            function selectDescription(){
                $("#description").text(descriptions[i]);
                i++;
            }




            $("#demo").ionRangeSlider({
                skin:"big",
                min: 0,
                max: 10,
                from: 0,
                step: 1,            // default 1 (set step)
                  grid: true,         // default false (enable grid)
                grid_num: 10,        // default 4 (set number of grid cells)
                grid_snap: false
            });




        })




    </script>
@endsection
