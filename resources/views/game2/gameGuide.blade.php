@extends("layouts.main")
@section('content')
    <div class="w3-content w3-center w3-justify persian " style="margin-top: 200px">

        <div id="guide1" class="w3-xlarge guide" dir="rtl" style="line-height: 50px">
            شما وارد مرحله ی دوم از این آزمایش شدید
            <br>
            در صندوق شما و هر کدام از اعضاء، مبلغ 50 هزار تومان پول قرار داده شده
            <br>
            یک صندوق خالی نیز برای کل افراد شرکت کننده در نظر گرفته شده

        </div>
        <div id="guide2" class="w3-xlarge  w3-hide guide" dir="rtl" style="line-height: 50px">
            در طی 10 دست بازی، شما و سایر شرکت کنندگان می بایست
            <br>
            با توجه به موجودی صندوق خود، مبلغی دلخواه را به صندوق کل
            <br>
            که متعلق به تمام افراد شرکت کننده است، اهدا کنید
            <br>
            این مبلغ میتواند عددی بین 0 تا 50000 تومان باشد
        </div>
        <div id="guide3" class="w3-xlarge w3-hide guide" dir="rtl" style="line-height: 50px">
            اما پیش از اهدای هر مبلغی از صندوق خود
            <br>
            ابتدا مبلغ مورد نظر خود را به سایرین اعلام میکنید
            <br>
            مبلغ اعلامی میتواند با مبلغی که آن را واقعا به صندوق کل اهدا میکنید،
            <br>
            متفاوت باشد
        </div>
        <div id="guide4" class="w3-xlarge w3-hide guide" dir="rtl" style="line-height: 50px">
            از دست دوم به بعد ، مبلغ اعلامی یکی از اعضاء در دست قبل،
            <br>
            به صورت تصادفی برای سایرین نمایش داده میشود
            <br>
            اما مبلغ اهدایی شما و سایر افراد به صورت محرمانه باقی میماند و
            <br>
            کسی از مقدار آن با خبر نخواهد شد
        </div>
        <div id="guide5" class="w3-xlarge w3-hide guide" dir="rtl" style="line-height: 50px">
            با این حال، مقدار کل مبالغ اهدایی از سوی شرکت کنندگان در هر دست
            <br>
            3 برابر شده و میانگین آن بین 8 نفر شرکت کننده تقسیم میشود
            <br>
            در پایان،
            <br>
            نسبتی از مبالغ بدست آمده در نتیجه عملکردتان در تمامی دست ها به
            <br>
            شما تعلق می گیرد
        </div>
        <div id="guide6" class="w3-xlarge w3-hide guide" dir="rtl" style="line-height: 50px">
            برای نوشتن و ثبت مبالغ اعلامی و اهدایی خود در این مرحله
            <br>
            تنها 25 ثانیه
            <br>
            فرصت دارید

        </div>


        @include('layouts.progress_bar')
    </div>




    <script>

        $(document).ready(function () {
            var i = 2;


            function next(time) {
                if(i==7){
                    window.location.replace('/game2');
                    return;
                }

                $(".guide").addClass("w3-hide");
                $(("#guide" + i)).removeClass("w3-hide");
                width = 100;
                move(time);
                i++;
            }

            move(20);


          var id = setInterval(function(){
              next(20);
          },20000);
        })


    </script>
@endsection
