@extends('layouts.admin.master')
@section('title','مدیریت سوال ها')
@section('content')
    @include('layouts.admin.navbar')
    <div class="container-fluid" style="margin-top:90px">
        <div class="row flex-row-reverse ">
            <div class="col-md-4 mb-5">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h5 class="persian text-right">ایجاد دسته بندی</h5>
                    </div>
                    <div class="card-body">

                        <form  action="{{route('categories.store')}}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label for="name" class="persian float-right">دسته بندی</label>
                                <input type="text" name="name" id="name" class="form-control  ">
                            </div>
                           <div class=" d-flex flex-row justify-content-end">
                               <button type="submit" class="btn btn-primary persian font-weight-bold">ایجاد</button>
                           </div>
                        </form>



                    </div>
                </div>

                <div class="card mt-4 shadow-lg">
                    <div class="card-header ">
                        <h5 class="persian text-right">ایجاد جواب برای دسته بندی</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{route('category_answers')}}" method="POST">
                            @csrf
                         <div class="form-group">
                             <div class="persian float-right">دسته بندی</div>
                             <select name="category_id" class="custom-select  " >

                                 @foreach($categories as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                            <div class="form-group">
                                <label for="name" class="persian float-right">جواب</label>
                                <input type="text" name="name" id="name" class="form-control persian text-right">
                            </div>
                            <div class=" d-flex flex-row justify-content-end">
                                <button type="submit" class="btn btn-primary persian font-weight-bold">ایجاد</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h5 class="persian text-right">ایجاد سوال</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{route('questions.store')}}" method="POST">
@csrf
                        <div class="row flex-row-reverse">
                            <div class="col-md-6">
                                <div class="persian float-right">دسته بندی</div>

                                <div class="form-group">

                                    <select name="category_id" class="custom-select  " >


                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="question" class="persian float-right"> سوال</label>
                                <input type="text" name="question" id="question" class="form-control persian text-right">
                            </div>
                            <div class=" d-flex flex-row justify-content-end">
                                <button type="submit" class="btn btn-primary persian font-weight-bold">ایجاد</button>
                            </div>
                        </form>

                    </div>
                </div>



                    <div id="accordion" >
                        <div class="card mt-4 shadow-lg">
                            <div class="card-header d-flex flex-row-reverse">
                                <a class="card-link persian font-weight-bold" data-toggle="collapse" href="#collapseOne">
                                    دسته بندی
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse " data-parent="#accordion">
                                <div class="card-body text-right">
                               @foreach($categories as $category)
                                        <div class=" badge badge-danger pl-3">
                                            {{$category->name}}
                                            <form class="d-inline" action="{{route('categories.destroy',[$category->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm text-white">&times</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-lg">
                            <div class="card-header d-flex flex-row-reverse">
                                <a class="collapsed card-link persian font-weight-bold" data-toggle="collapse" href="#collapseTwo">
                                    جواب های هر دسته
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body text-right">
                                    @foreach($categories as $category)
                                        <div class="mt-2 badge px-4 py-2 persian bg-danger text-center text-white font-weight-bold">
                                            {{$category->name}}
                                        </div>
                                        <div class="card ">
                                            <div class="card-body ">
                                        @foreach($category->category_answers as $answer)


                                        <div class=" badge badge-info pl-3 persian">
                                            {{$answer->name}}
                                            <form class="d-inline" action="{{route('category_answers.destroy',[$answer->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm text-white">&times</button>
                                            </form>
                                        </div>

                                            @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-lg mb-2">
                            <div class="card-header d-flex flex-row-reverse">
                                <a class="collapsed card-link persian font-weight-bold" data-toggle="collapse" href="#collapseThree">
                                    سوال های هر دسته
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-bordered text-center table-striped" dir="rtl">
                                            <thead class="persian">
                                            <th >سوال  </th>
                                            <th>دسته بندی</th>
                                            <th>اکشن ها</th>
                                            </thead>
                                            <tbody>
                                           @foreach($categories as $category)
                                               @foreach($category->questions as $question)
                                               <tr>
                                                   <td class="persian">{{$question->question}}</td>
                                                   <td class="persian">{{$question->category->name}}</td>

                                                   <td>

                                                       <form class="d-inline" action="{{route('questions.destroy',[$question->id])}}" method="POST">
                                                           @csrf
                                                           @method('DELETE')
                                                       <button class="btn btn-outline-danger">
                                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                               <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                           </svg>
                                                       </button>
                                                       </form>
                                                   </td>
                                               </tr>
                                               @endforeach

                                               @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

        </div>
    </div>
@endsection
