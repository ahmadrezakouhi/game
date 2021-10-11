<div class="   w3-margin-top " style="">

    <div class="w3-display-container w3-padding-large  " style="width:500px;height: 500px;">

        <div class="w3-gray w3-circle
            w3-margin-top" style="width:400px;height: 400px;margin:auto;margin-top: 100px">

        </div>
        <div class="w3-display-topmiddle  w3-large ">
            <img src="/img/person.png" alt="" width="80px" style="position: absolute;top:-17px;right: -40px">
            <div  class="w3-text-white bold" style="position:relative ;z-index: 5;top:-16px;right:-7px">A</div>
        </div>
        <div id="o" class="w3-display-topright  "
             style="margin-top: 70px;margin-right: 70px">
            <img src="/img/person.png" alt="" width="80px" style="position: absolute;top:-10px;right:-37px">
            <div id="first" class="w3-text-white bold " style="position:relative ;z-index: 5;top:-7px;right:-3px">O</div>
        </div>
        <div class="w3-display-right  " style="margin-right: 20px">
            <img src="/img/person.png" alt="" width="80px" style="position: absolute;top:-15px;right: -30px">
            <div class="w3-text-white bold" style="position:relative ;z-index: 5;top:-11px;right:3px">B</div>
        </div>
        <div class="w3-display-bottomright  "
             style="margin-bottom: 95px;margin-right: 95px">
            <img src="/img/person.png" alt="" width="80px" style="position: absolute;top:-15px;right: -35px">
            <div class="w3-text-white bold" style="position:relative ;z-index: 5;top:-11px;right:-1px">N</div>
        </div>
        <div id="c" class="w3-display-bottomleft "
             style="margin-left: 95px;margin-bottom: 95px">
            <img src="/img/person.png" alt="" width="80px" style="position: absolute;top:-17px;right: -35px">
            <div id="second" class="w3-text-white bold" style="position:relative ;z-index: 5;top:-13px;right:-2px"></div>
        </div>
        <div class="w3-display-left  " style="margin-left: 20px">
            <img src="/img/person.png" alt="" width="80px" style="position: absolute;top:-15px;right: -40px">
            <div class="w3-text-white bold" style="position:relative ;z-index: 5;top:-11px;right:-6px">P</div>
        </div>
        <div  class="w3-display-topleft  "
             style="margin-top: 70px;margin-left: 70px">
            <img src="/img/person.png" alt="" width="80px" style="position: absolute;top:-15px;right: -35px">
            <div id="third" class="w3-text-white bold" style="position:relative ;z-index: 5;top:-11px;right:-1px">B</div>
        </div>
        <div  class="w3-display-bottommiddle  "
             style="margin-bottom: 15px">
            <img src="/img/person.png" alt="" width="80px" style="position: absolute;top:-33px;right: -35px;z-index: -1">
            <div  id="user" class="w3-text-white bold" style="position:relative ;z-index: 5;top:-29px;right:0px">p</div>
            <div class="persian bold" style="position:absolute;z-index: -2;top:15px;right: -6px;font-size: 1em">
                شما
            </div>
        </div>
        <div id="text" class="w3-display-middle" style="margin-top: -10px">
            <p class="persian w3-hide" id="description">صندوق کل
                (جمع مبالغ * ۳ )
            </p>

                <hr class="w3-black w3-hide " style="height: 1px;width:100%">

            <img id="coin" class="w3-hide" src="/img/coin.svg" alt="" width="40px" style="position:absolute ;right:60px;top:150px;z-index: -1">

            <div  id="money" class="w3-hide w3-center w3-padding-16 w3-round-large w3-large w3-text-white bold   w3-round  "style="
            position:absolute ;right:56px;top:153px;
            background-color: #31BA8B;z-index:10;border-style: hidden;width: 50px">50000</div>

            <img id="bag" class="w3-hide " src="/img/bag.png" alt="" height="150px" width="150px" style="
            position:absolute ;right:5px;top:100px;">

        </div>

    </div>

</div>


<script >
    $(document).ready(function(){

        var user = Cookies.get("user_letter");
        var letters = ["M","O","H","G"];
        letters = removePerson(letters ,user);
        // console.log(letters)
        $('#first').text(letters[0]);
        $('#second').text(letters[1]);
        $('#third').text(letters[2]);

        $("#user").text(user)






    })
</script>
