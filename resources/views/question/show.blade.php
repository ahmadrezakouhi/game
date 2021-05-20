@extends('layouts.admin.master')
@section('content')
    @include('layouts.admin.navbar')
    <div class="container-fluid" style="margin-top: 90px">
        <div class="row flex-row-reverse">
            @foreach($categories as $category)

            <div class="col-md-6 mb-4">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h3>
                            {{$category->name}}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">


                                <table class="table table-striped table-bordered text-center table-hover" dir="rtl" >
                                    <thead class="persian">

                                    <th>سوال</th>
                                    <th>پاسخ</th>
                                    </thead>
                                    <tbody>
                                    @foreach($question_answers as $question_answer)
                                        <?php $count = 2 ?>
                                        @if($question_answer->question->category_id == $category->id)

                                            <tr>

                                                <td class="persian"> {{$question_answer->question->question}}</td>
                                                <td class="persian">{{$question_answer->category_answer->name}}</td>
                                            </tr>

                                        @endif
                                        <?php $count++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>

            </div>

        @endforeach
        </div>
    </div>
@endsection
