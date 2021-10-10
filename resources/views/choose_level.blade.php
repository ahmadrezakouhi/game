@extends('layouts.main')
@section('title', 'انتخاب مرحله')
@section('content')
    @include('layouts.user.navbar')
    <div class="container " style="margin-top: 100px">

        <div class="w3-panel w3-pale-yellow w3-border w3-border-yellow w3-round w3-round w3-padding persian w3-right-align" dir="rtl">

            <h3 class="persian w3-text-orange">در صورت فعال نبودن بخش بازی به ادمین اطلاع دهید.</h3>
        </div>

        <div class="row">
            <div class="col-md-6">


                <div class="card shadow-sm">
                    <a href="https://forms.gle/i9aEJTqHEc56EFjF8" style="text-decoration: none">
                        <div class="card-body w3-hover-shadow py-5 ">
                            <h2 class="persian text-center text-secondary">پاسخ به پرسش ها</h2>


                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <a href="{{ route('select_letter') }}" style="text-decoration: none" @if (Auth::user()->can_play == 0)
                        onclick="return false"
                        @endif
                        >

                        <div
                            class="card-body bg-secondary w3-hover-shadow py-5

                        @if (Auth::user()->can_play == 0)
                        w3-opacity-max
                        @endif
                        ">
                            <h2 class="persian text-center text-white">بازی</h2>

                        </div>
                    </a>
                </div>
            </div>
        </div>


@if(session()->has('error'))
        <div class="w3-panel w3-red w3-card w3-round w3-padding persian w3-right-align" dir="rtl">
            <h3 class="persian">اخطار!</h3>
            <p class="">{{ session('error')}}</p>
        </div>
@endif


    </div>



    <div class="container" id="magnet-native-ad">
    </div>



    <script>
        magnet_content_list = [
            {
                "adUnitId": "bcf08870786908d9a166bc8125720811",
                "elementId": "magnet-native-ad"
            }
        ];
        var magnetScript = document.createElement('script');
         magnetScript.type = 'text/javascript';
         magnetScript.async = true;
          magnetScript.src =(location.protocol == 'http:'?'http':'https').concat('://static.magnetadservices.com/shared/mg.js');
           document.body.appendChild(magnetScript);
        </script>



@endsection
