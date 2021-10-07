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

        <button class="w3-button w3-round w3-light-gray w3-border w3-border-gray persian w3-margin-top">بعدی</button>

    </div>



    <script>

        var estimate;
        var estimate_time;
        var new_estimate;
        var new_estimate_time;
        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var startTime = new Date().getTime();







            $('button').click(function() {
                $.ajax({
                    url: " {{ route('questions') }} ",
                    type: "POST",
                    data: {
                        "result": $('input').val(),
                        "time": (new Date().getTime() - startTime),
                        "category": 1
                    }
                })
            })


            $('input').keyup(function() {
                if ($(this).val()) {

                    if (estimate) {
                        if (new_estimate) {
                            estimate = new_estimate;
                        }
                        new_estimate = $(this).val();
                    } else {
                        estimate = $(this).val();
                    }

                    if (estimate_time) {
                        if (new_estimate_time) {
                            estimate_time = new_estimate_time;
                            new_estimate_time = new Date().getTime();
                        } else {
                             new_estimate_time = new Date().getTime();
                        }

                    } else {
                        estimate_time = new Date().getTime();
                    }


                }
                console.log('estimate : ' + estimate + " time : " + (estimate_time -
                    startTime));
                console.log('new_estimate : ' + new_estimate + " time : " + (new_estimate_time -
                    startTime));
            })



        })
    </script>
@endsection
