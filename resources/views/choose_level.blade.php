@extends('layouts.main')
@section('title','انتخاب مرحله')
@section('content')
@include('layouts.user.navbar')
    <div class="container " style="margin-top: 200px">
        <div class="row">
            <div class="col-md-6">


                <div class="card shadow-sm">
                    <a href="{{route('login')}}" style="text-decoration: none">
                    <div class="card-body w3-hover-shadow py-5 ">
                        <h2  class="persian text-center text-secondary">پاسخ به پرسش ها</h2>


                    </div>
                </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <a href="{{route('select_letter')}}" style="text-decoration: none"
                    @if(Auth::user()->can_play==0)
                        onclick="return false"
                    @endif
                    >

                    <div class="card-body bg-secondary w3-hover-shadow py-5

@if(Auth::user()->can_play==0)
                        w3-opacity-max
                        @endif
">
                    <h2  class="persian text-center text-white">بازی</h2>

                    </div>
                    </a>
                </div>
            </div>
        </div>

    </div>



@endsection
