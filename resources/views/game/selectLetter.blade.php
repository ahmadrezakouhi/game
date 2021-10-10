@extends("layouts.main")

@section('title', '')
@section('content')
    <div class="w3-content w3-margin-top w3-center ">
        <h3 class="persian">خوش آمدید</h3>
        <h5 class="persian w3-padding-large" style="margin-top: 100px">لطفا از بین حروف انتخاب نشده , یک حرف را برای خود
            برگزینید؟</h5>
        <div class=" " style="margin-top: 100px;">
            <button class="w3-large bold w3-card-4 w3-button w3-black w3-padding-large w3-round  chooseable w3-margin-right"
                id="h">H</button>
            <button class="w3-large bold  w3-button w3-gray w3-padding-large w3-round w3-margin-right w3-opacity">P</button>
            <button class="w3-large bold w3-card-4 w3-button w3-black w3-padding-large w3-round chooseable w3-margin-right"
                id="m">M</button>
            <button class="w3-large bold w3-card-4 w3-button w3-black w3-padding-large w3-round chooseable w3-margin-right"
                id="o">O</button>
            <button class="w3-large bold  w3-button w3-gray w3-padding-large w3-round w3-margin-right w3-opacity">N</button>
            <button class="w3-large bold  w3-button w3-gray w3-padding-large w3-round w3-margin-right w3-opacity">B</button>
            <button class="w3-large bold w3-card-4 w3-button w3-black w3-padding-large w3-round chooseable w3-margin-right"
                id="g">G</button>
            <button
                class="w3-large bold  w3-button w3-gray w3-padding-large w3-round w3-margin-right w3-opacity ">A</button>
        </div>
        <div class="w3-margin-top w3-xxxlarge" id="word">

        </div>

        <form action="" class="w3-center w3-hide">

            <div class="" style=" margin:auto; max-width: 200px">
                <label for="" class="persian">لطفا حرف انتخاب شده را وارد نمایید</label>
                <input type="text" class="w3-input w3-border w3-round w3-hover-border-gray" maxlength="1"
                    style="text-transform: uppercase">
                <div id="danger" class="persian w3-text-red font-weight-bold w3-hide" dir="rtl"> حرف انتخاب شده با حرف نوشته
                    شده یکی نمی باشد !!!</div>
            </div>

        </form>

        <a href="/connectUsers" class="w3-button w3-border w3-padding-large w3-round w3-hide w3-section persian" id="next"
            style="text-decoration: none">بعدی</a>


        @include('layouts.progress_bar')
    </div>



    <script>
        $(document).ready(function() {

            var start = new Date().getTime();
            var end;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#h').click(function() {
                clickButtons(this)


            })
            $('#m').click(function() {
                clickButtons(this)
            })
            $('#o').click(function() {
                clickButtons(this)
            })
            $('#g').click(function() {
                clickButtons(this)
            })


            $('input').keydown(function(event) {


                if (String.fromCharCode(event.which) == $('#word').text()) {
                    $('#next').removeClass("w3-hide");
                    $('#danger').addClass("w3-hide");
                } else {
                    $("#next").addClass("w3-hide");
                    $('#danger').removeClass("w3-hide");
                }
            })



            function clickButtons(element) {
                 end = new Date().getTime();
                console.log(end - start);

                if (element.id == "h" || element.id == "g" ||
                    element.id == "o" || element.id == "m") {
                    $('input').val("");
                    $('.chooseable').addClass("w3-card-4")
                    $(element).removeClass("w3-card-4")
                    Cookies.set('user_letter', $(element).text());
                    $('#word').text($(element).text())
                    $("form").removeClass("w3-hide")
                    var user = "user=" + $(element).text();

                }



                $.ajax({
                    url: "/answers/store_letter",
                    type: "POST",
                    data: {
                        "letter": $(element).text(),
                        "letter_time":(end - start),
                        "resolution":window.screen.width+" * "+window.screen.height
                    },
                    success: function(data) {
                        console.log(data)
                    }
                })
            }


            {{-- setInterval(function(){ --}}
            {{-- window.location.replace("{{route('logout')}}"); --}}
            {{-- },60000) --}}
            move(60)


        })
    </script>

@endsection
