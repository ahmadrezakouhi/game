<ul class="w3-ul ">
  @for($i=1;$i<9;$i++)
        <li class=" w3-row  " style=";height:60px">
            <div class="w3-col l3  "><div  class="
        " style="margin-top: 7px"> <div id="pn{{$i}}" class="w3-badge w3-white w3-border w3-large w3-right"  style="">{{$i}}</div>
                    <span id="pp{{$i}}" class='persian w3-hide w3-right  w3-right-align ' style='position: relative;top:3px;' >شما</span></div>


            </div>
            <div id="p{{$i}}" class="w3-col l9 w3-gray w3-padding w3-round-xxlarge  w3-center
"></div>

        </li>
    @endfor

</ul>
