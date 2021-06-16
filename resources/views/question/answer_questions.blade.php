@extends('layouts.main')
@section('content')
<div class="container persian text-center border mt-5 rounded p-5 shadow-sm">
    <h3 class="persian"> به نظر شما کدام یک درست است ؟
    </h3>
    <form>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
          <label class="custom-control-label" for="customRadio">Custom radio</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
            <label class="custom-control-label" for="customRadio">Custom radio</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
            <label class="custom-control-label" for="customRadio">Custom radio</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
            <label class="custom-control-label" for="customRadio">Custom radio</label>
          </div>
      </form> 


</div>
@endsection


