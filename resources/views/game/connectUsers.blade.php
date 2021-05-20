@extends('layouts.main')
@section('title','افراد آنلاین')
@section('content')

    <div class="w3-content w3-center  w3-margin-top " style="">

        <div class="w3-display-container w3-padding-large  "
             style="width:500px;height: 500px;margin:auto;margin-top: 10px">


            @include("layouts.onlineUser")
        </div>




    </div>

    <script>

        $(document).ready(function () {
            var ids = ["first","second","third"];


            $('#text').html("<p class='persian' dir='rtl'>تا آنلاین شدن بقیه افراد صبر کنید ...</p>" );


            for(var i = 0; i<ids.length;i++){
                $(("#"+ids[i])).parent().hide();
            }




            setTimeout(showSecond, 3000);
            setTimeout(showThird, 10000);
            setTimeout(showFirst, 13000);


            function showFirst() {
                $('#first').parent().show();
                $('#text').html("<p class='persian'>همه اعضا آنلاین شدند</p>" +
                    "<a class='w3-button w3-round  w3-light-gray persian' href='/game1/guide' style='text-decoration: none'>بعدی</a>");
            }

            function showThird() {
                $('#third').parent().show();
            }

            function showSecond() {
                $('#second').parent().show();
            }

            //20 seconds
            {{--setInterval(function(){--}}
            {{--    window.location.replace("{{route('logout')}}");--}}
            {{--},22000)--}}



        })
    </script>

@endsection
