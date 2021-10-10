@extends("layouts.main")
@section('content')

    <div class="w3-content w3-center  w3-justify" style="margin-top: 200px">

        <div id="description" class="w3-justify bold w3-large w3-center" dir="rtl" style="line-height: 50px">

        </div>

        <div class="" style=" margin-top: 100px">
            <div class="w3-xlarge persian">
                درمورد سوالات اطلاعات عمومی، چه کسی تخمین های منطقی تری داشت؟

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

        <button class="w3-button w3-round w3-light-gray w3-border w3-border-gray persian w3-margin-top w3-hide">بعدی</button>

    </div>



    <script>
        var best_estimate;
        var best_estimate_time;
        var new_best_estimate;
        var new_best_estimate_time;
        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var startTime = new Date().getTime();







            $('button').click(function() {

              if($('input').val()){
                  if(best_estimate_time){
                      best_estimate_time -= startTime;
                  }else{
                      best_estimate_time = "";
                  }

                  if(new_best_estimate_time){
                      new_best_estimate_time -= startTime;

                  }else {
                      new_best_estimate_time ="";
                  }
                  if (best_estimate) {
                    $.ajax({
                        url: " {{ route('estimate') }} ",
                        type: "POST",
                        data: {
                            "best_estimate": best_estimate,
                            "best_estimate_time": best_estimate_time,
                            "new_best_estimate": new_best_estimate,
                            "new_best_estimate_time": new_best_estimate_time
                        },
                        success: function(response) {
                            // window.location.replace("{{ route('end') }}");
                            console.log(response)
                        }
                    })

                }
              }




            })


            $('input').keyup(function() {
                if ($(this).val()) {
                    $('button').removeClass('w3-hide');
                    if (best_estimate) {
                        if (new_best_estimate) {
                            best_estimate = new_best_estimate;
                        }
                        new_best_estimate = $(this).val();
                    } else {
                        best_estimate = $(this).val();
                    }

                    if (best_estimate_time) {
                        if (new_best_estimate_time) {
                            best_estimate_time = new_best_estimate_time;
                            new_best_estimate_time = new Date().getTime();
                        } else {
                            new_best_estimate_time = new Date().getTime();
                        }

                    } else {
                        best_estimate_time = new Date().getTime();
                    }


                } else {
                    $('button').addClass('w3-hide');
                }
                console.log('best_estimate : ' + best_estimate + " time : " + (best_estimate_time -
                    startTime));
                console.log('new_best_estimate : ' + new_best_estimate + " time : " + (new_best_estimate_time -
                    startTime));
            })



        })
    </script>
@endsection
