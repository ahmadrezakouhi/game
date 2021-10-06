@extends("layouts.main")
@section('content')

    <div class="w3-content w3-center persian w3-justify" style="margin-top: 200px">

        <div id="description" class="w3-justify bold w3-large w3-center" dir="rtl" style="line-height: 50px">

        </div>

<div  class="" style="margin-top: 100px">
    <div class="w3-xlarge">
        درمورد سوالات اطلاعات عمومی، چه کسی تخمین های منطقی تری داشت؟

    </div>
    <form action="">
        <div class="w3-content w3-margin-top" style="max-width: 200px">

                <input type="text" class="w3-input w3-border w3-round" name="" id="">

        </div>
    </form>
</div>

        <button class="w3-button w3-round w3-light-gray w3-border w3-border-gray persian w3-margin-top">بعدی</button>

    </div>


    @include('layouts.progress_bar')

    <script>
$(document).ready(function () {

    move(60)



})




    </script>
@endsection
