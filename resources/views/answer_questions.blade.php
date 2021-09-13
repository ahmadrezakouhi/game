@extends('layouts.question-layout')
@section('content')

    <div class="text-center ">

        <div class="rounded-circle bg-secondary text-center text-white d-flex justify-content-center" style="display: inline-block;
        width: 70px;
        height: 70px;
        margin: 6px;
        font-size : 25px
        ">

            <div class="align-self-center "><b>{{ $questions->total() - ($questions->currentPage() * $questions->perPage()) + $questions->perPage() }}</b></div>

        </div>
    </div>



    <form method="POST" action="{{ route('answer-questions') }}">
        @csrf

        <input type="hidden" name="nextPageUrl" value="{{ $questions->nextPageUrl() }}">
        <input type="hidden" name="hasMorePages" value="{{ $questions->hasMorePages() }}">

        @foreach ($questions as $question)



            <div class="container persian border my-4 text-right rounded p-3 shadow-sm ">
                <h4 class="persian"> {{ $question->question }}
                    </h3>





                    @foreach ($question->category->category_answers as $answer)



                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="answer"
                                value="{{ $answer->id }}">
                            <label class="form-check-label" for="answer">
                                {{ $answer->name }}
                            </label>
                        </div>

                    @endforeach



            </div>







        @endforeach






        <div class="my-3 text-center ">
            <button  id="send" type="submit" class="btn btn-danger persian">{{ $questions->hasMorePages() ? 'بعدی' : 'ارسال' }}</button>

        </div>
    </form>







    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        //    $('form').submit(function (e) {
        //        e.preventDefault();
        //        $.ajax({
        //            type: "POST",
        //            url: "{{ route('answer-questions') }}",
        //            data: $(this).serialize(),
        //            success:function(r){
        //                console.log(r)
        //            }

        //        });

        //        $('#send').addClass('invisible');
        //        $('#next').removeClass('invisible');

        //    });





        })
    </script>



@endsection
