@extends("layouts.main")
@section('title','بخش رتبه بندی')
@section('content')

    <div class="w3-content w3-center  w3-justify" style="margin-top: 200px">

        <div id="description" class="w3-justify bold w3-large w3-center" dir="rtl" style="line-height: 50px">

        </div>

        <div class="" style=" margin-top: 100px">
            <div class="w3-xlarge persian">
                در بین شما، چه کسی در رتبه بندی ها، بیشترین امتیاز را کسب کرد؟
            </div>
            <p class="w3-margin-top persian">
                حرف انگلیسی مرتبط با شرکت کننده را در کادر زیر بنویسید
            </p>
            <form action="">
                <div class="w3-content w3-margin-top" style="max-width: 200px">

                    <input type="text" type="text" class="form-control " maxlength="1" style="text-transform: uppercase">

                </div>
            </form>
        </div>

        {{-- <button class="w3-button w3-round w3-light-gray w3-border w3-border-gray persian w3-margin-top">بعدی</button> --}}

    </div>


    @include('layouts.progress_bar')

    <script>
        var time = 20;
        var best_score;
        var best_score_time;
        var new_best_score;
        var new_best_score_time;
        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var startTime = new Date().getTime();
            move(time)


            setTimeout(function() {
                if(best_score){
                    sendBestScoreData();
                }else{
                    window.location.replace("{{route('logout')}}");
                }

            }, time * 1000)




            function sendBestScoreData() {
                if (best_score_time) {
                    best_score_time -= startTime;
                } else {
                    best_score_time = "";
                }

                if (new_best_score_time) {
                    new_best_score_time -= startTime;
                } else {
                    new_best_score_time = "";
                }


                $.ajax({
                    url: " {{ route('score') }} ",
                    type: "POST",
                    data: {
                        "best_score": best_score.toUpperCase(),
                        "best_score_time": best_score_time,
                        "new_best_score": new_best_score.toUpperCase(),
                        "new_best_score_time": new_best_score_time

                    },
                    success: function(response) {
                        window.location.replace("{{route('game2.guide')}}");
                    }
                })
            }




            $('input').keyup(function() {
                if ($(this).val()) {

                    if (best_score) {
                        if (new_best_score) {
                            best_score = new_best_score;
                        }
                        new_best_score = $(this).val();
                    } else {
                        best_score = $(this).val();
                    }

                    if (best_score_time) {
                        if (new_best_score_time) {
                            best_score_time = new_best_score_time;
                            new_best_score_time = new Date().getTime();
                        } else {
                            new_best_score_time = new Date().getTime();
                        }

                    } else {
                        best_score_time = new Date().getTime();
                    }


                }
                // console.log('best_score : ' + best_score + " time : " + (best_score_time -
                //     startTime));
                // console.log('new_best_score : ' + new_best_score + " time : " + (new_best_score_time -
                //     startTime));
            })



        })
    </script>
@endsection
