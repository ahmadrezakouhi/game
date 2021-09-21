@extends('layouts.admin.master')
@section('title','تنظیمات بازی')
@section('content')
@include('layouts.admin.navbar')
<div class="container mb-5" style="margin-top:90px">
    @if(Session::has('settings'))
    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
        <div id="toast" class="toast hide border border-success bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000"
        style="width: 250px">
            <div class="toast-header text-success">

                <strong class="ml-auto persian ">توجه</strong>


            </div>
            <div class="toast-body persian text-right  text-white" dir="rtl">
                {{Session::get('settings')}}

            </div>
        </div>
    </div>

                @endif
    <div class="card clearfix shadow-lg  mx-auto" style="max-width: 500px;">
        <div class="card-header ">
            <h4 class="persian float-right ">تنظیمات بازی</h4>

        </div>
        <div class="card-body">
            <form action="{{route('settings.update')}}" method="POST">
                @csrf


            <div class="form-group">
                <label for="game1_time" class="persian float-right">زمان بازی اول</label>
                <input type="text" name="game1_time" id="game1_time" value="{{$setting->game1_time}}" class="form-control " required>
            </div>


            <div class="form-group">
                <label for="game2_time" class="persian float-right">زمان بازی دوم </label>
                <input type="text" name="game2_time" id="game2_time" value="{{$setting->game2_time}}" class="form-control " required >
            </div>






            <button type="submit" class="btn btn-primary persian btn-block font-weight-bold mt-3">تغییر</button>
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
