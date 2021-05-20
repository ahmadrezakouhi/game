@extends('layouts.admin.master')
@section('title','جدول ها')
@section('content')
    @include('layouts.admin.navbar')
    <div class="container-fluid " style="margin-top:90px">

<div class="row flex-row-reverse">
   <div class="col-md-3">
       <div class="card shadow-lg bg-danger text-white">

           <div class="card-body text-center">
               <?php
             $constPersons = ["P", "N", "B", "A"];
        $varPersons = ["H", "M", "O", "G"];

               ?>
@if($user->letter)
@foreach($varPersons as $item)
    @if($item != $user->letter)
                           {{$item}}
                       @endif
                   @endforeach

                   <span class="font-weight-bold " style="font-size: 1.5em">{{$user->letter}}</span>

                   @foreach($constPersons as $item)

                           {{$item}}

                   @endforeach

    @endif
           </div>
       </div>
   </div>
</div>


        <div class=" card-deck flex-row-reverse">


            <div class="card clearfix shadow-lg">
                <div class="card-header">
                    <h5 class="persian float-right">جدول پاسخ به سوال ها در بازی اول</h5>

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered text-center table-striped "  dir="rtl">
                            <thead class="persian">
                            <th>ردیف</th>
                            <th>پاسخ</th>


                            <th>زمان پاسخ دهی</th>

                            </thead>

                            <tbody>

                            @foreach($answers_cat1 as $answer)
                                <tr>

                                    <td>{{$loop->iteration}}</td>
                                    <td >{{$answer->result}}</td>

                                    <td >{{$answer->time}}</td>
                                </tr>
                            @endforeach

                            </tbody>



                        </table>
                    </div>
                </div>
            </div>




            <div class="card clearfix shadow-lg">
                <div class="card-header">
                    <h5 class="persian float-right">جدول رتبه بندی بازی اول</h5>

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered text-center table-striped "  dir="rtl">
                            <thead class="persian">
                            <th>ردیف</th>
                            <th>نفر اول</th>
                            <th>نفر آخر</th>

                            <th>زمان پاسخ دهی </th>

                            </thead>

                            <tbody>

                            @foreach($ranks as $rank)
                                <tr>

                                    <td>{{$loop->iteration}}</td>
                                    <td >{{strtoupper($rank->first_person)}}</td>
                                    <td >{{strtoupper($rank->last_person)}}</td>
                                    <td >{{$rank->time}}</td>
                                </tr>
                            @endforeach



                            </tbody>



                        </table>
                    </div>
                </div>
            </div>



            </div>

        <div class="card-deck flex-row-reverse mt-5 mb-3">
    <div class="card clearfix shadow-lg ">
        <div class="card-header">
            <h5 class="persian float-right">جدول بازی دوم</h5>

        </div>
        <div class="card-body">
            <div class="table-responsive">





                <table class="table table-bordered text-center table-striped "  dir="rtl">
                    <thead class="persian">
                    <th>ردیف</th>

                    <th>مبلغ اعلامی</th>

                    <th>زمان </th>

                    </thead>

                    <tbody>

                    @foreach($answers_cat2 as $answer)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td >{{$answer->result}}</td>

                            <td >{{$answer->time}}</td>
                        </tr>
                    @endforeach

                    </tbody>



                </table>
            </div>
        </div>
    </div>
    <div class="card clearfix shadow-lg ">
        <div class="card-header">
            <h5 class="persian float-right">جدول بازی دوم</h5>

        </div>
        <div class="card-body">
            <div class="table-responsive">





                <table class="table table-bordered text-center table-striped "  dir="rtl">
                    <thead class="persian">
                    <th>ردیف</th>
                    <th>مبلغ اهدایی</th>


                    <th>زمان </th>

                    </thead>

                    <tbody>

                    @foreach($answers_cat3 as $answer)
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            <td >{{$answer->result}}</td>

                            <td >{{$answer->time}}</td>
                        </tr>
                    @endforeach

                    </tbody>



                </table>
            </div>
        </div>
    </div>

</div>

    </div>
@endsection
