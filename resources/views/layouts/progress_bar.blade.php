


        <div id="progressBar" class="w3-border w3-margin w3-round-xxlarge " style="position: absolute; bottom: 0;right:0;left: 0">
            <div id="mybar" class=" w3-round-xxlarge" style="height:24px;width:100%;background-color: #77abbf"></div>
        </div>


    <script>
        var id ;
        var width = 100;





        function move(times) {
            clearInterval(id);
            $('#mybar').css("width", "100%");
            width=100;
            var elem = document.getElementById("mybar");

            id = setInterval(frame, 1000);

            function frame() {
                if (width <= 0) {
                    $('#mybar').css('width', '0');
                    clearInterval(id);
                } else {
                    width -= 100 / times;
                    elem.style.width = width + '%';
                    timer = width;
                    // console.log(timer)
                }
            }
        }
    </script>


