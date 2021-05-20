<ul class="w3-ul ">
  @for($i=1;$i<9;$i++)
        <li class=" w3-row  " style=";height:60px">
            <div class="w3-col l2  "> <span id="pn{{$i}}" class="w3-badge w3-left w3-white
        w3-border  w3-right  w3-large " style="margin-top:8px ">{{$i}}</span>
                <span id="pp{{$i}}" class='persian w3-hide' style='position: relative;top:-27px;right: 10px'>شما</span>
                <span id="pps{{$i}}" class="" style="
@if($i==4)
                    position:relative;right: 0px;top:-32px
                @else
                    position:relative;right: -21px;bottom:-15px
                @endif
"></span>
            </div>
            <div id="p{{$i}}" class="w3-col l10 w3-gray w3-padding w3-round-xxlarge  w3-center
"></div>

        </li>
    @endfor

</ul>
