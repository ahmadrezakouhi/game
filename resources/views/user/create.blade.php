@extends('layouts.admin.master')
@section('title','افزودن کاربر')
@section('content')
    @include('layouts.admin.navbar')
    <div class="container mb-5" style="margin-top:90px">
        @if(Session::has('message'))
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
            <div id="toast" class="toast hide border border-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000"
            style="width: 250px">
                <div class="toast-header text-success">

                    <strong class="ml-auto persian ">توجه</strong>


                </div>
                <div class="toast-body persian text-right  text-success">
                    {{Session::get('message')}}

                </div>
            </div>
        </div>

                    @endif
        <div class="card clearfix shadow-lg  mx-auto" style="max-width: 500px;">
            <div class="card-header ">
                <h4 class="persian float-right ">افزودن کاربر</h4>

            </div>
            <div class="card-body">
                <form action="{{route('users.store')}}" method="POST">
                    @csrf


                <div class="form-group">
                    <label for="name" class="persian float-right">نام</label>
                    <input type="text" name="name" id="name" class="form-control text-right persian" required>
                </div>


                <div class="form-group">
                    <label for="last_name" class="persian float-right">نام خانوادگی </label>
                    <input type="text" name="last_name" id="last_name" class="form-control text-right persian" required >
                </div>


                <div class="form-group">
                    <label for="email" class="persian float-right">ایمیل</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>



                <div class="form-group">
                    <label for="password" class="persian float-right">پسورد</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>


                <div class="form-group">
                    <label for="time" class="persian float-right">زمان اجرای بازی</label>
                    <input type="text" name="time" id="time" class="form-control" required>
                </div>


                <div class="form-group clearfix">
                    <div class="persian text-right">
                        جنسیت
                    </div>
                    <div class="custom-control custom-radio custom-control-inline float-right mt-2 ">
                        <input type="radio" class="custom-control-input" id="female" name="gender" value="female" >
                        <label class="custom-control-label persian" for="female">مونث</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline float-right mt-2">
                        <input type="radio" class="custom-control-input" id="male" name="gender" value="male" checked>
                        <label class="custom-control-label persian" for="male">مذکر</label>
                    </div>
                </div>

                <hr>

                <div class="custom-control custom-checkbox clearfix" >
                    <div class="float-right">
                        <input type="checkbox" class="custom-control-input " id="can_play" name="can_play"
                               style="">
                        <label class="custom-control-label persian " for="can_play"  >انجام بازی</label>
                    </div>

                </div>

                <div class="custom-control custom-checkbox clearfix mt-3"  >
                    <div class="float-right">
                        <input type="checkbox" class="custom-control-input " id="can_answer" name="can_answer"
                               style="">
                        <label class="custom-control-label persian " for="can_answer"  >پاسخ به سوالات</label>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary persian btn-block font-weight-bold mt-3">ثبت</button>
                </form>
            </div>
        </div>


    </div>


    <script>
        $(document).ready(function () {
                $('.toast').toast('show');

            }
        )
    </script>

@endsection
