@extends("layouts.main")
@section('title','رتبه بندی نهایی ')
@section('content')
    <div class="w3-content w3-center
" style="margin-top:25px;width:400px">

<div class="persian w3-xlarge w3-margin-bottom" dir="rtl">
    رتبه بندی نهایی بر اساس مجموع امتیازات
</div>


        @include("layouts.orderList")

{{--        <a href="/game2/guide" class="persian w3-button w3-round w3-light-gray w3-border w3-hide "--}}
{{--          id="next" style="position: relative;right:-25px">بعدی</a>--}}


        @include('layouts.progress_bar')




    </div>


    <script>
$(document).ready(function () {

    var user = Cookies.get('user_letter');
    var letters = removePerson(varPersons,user);
    letters.push(user);
    var persons = letters.concat(constPersons);
    for(var i =1 ; i<=8;i++){
        var id1 = "#p" + i;
        var id2 = "#pn" + i;
        $(id1).text(persons[i-1]);
        $(id1).removeClass("w3-gray");
        $(id1).addClass("w3-blue w3-card");
        $(id2).addClass("w3-card")
        if(i%2==0){
            $(id1).parent().addClass("w3-animate-right")
        }else {
            $(id1).parent().addClass("w3-animate-left")
        }

        if(i==4){
            $("#pp4").removeClass("w3-hide ");
            $("#pp4").css("top","10px");
        }
    }


move(15);
    // setTimeout(function(){
    //     $('#next').removeClass('w3-hide')
    // },5000)

    setInterval(function(){
        window.location.replace("{{route('game2.guide')}}");
    },15000)


    {{--setInterval(function(){--}}
    {{--    window.location.replace("{{route('logout')}}");--}}
    {{--},60000)--}}







})
    </script>
@endsection
