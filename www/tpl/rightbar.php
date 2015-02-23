<div class="rightbar">	
<div class="resetsearch"><a href="/"><img src="img/reset.png"></a></div> 
medium

<div id="field">
    <!--img src="img/ser.png" id="ball" class=ball-->
</div>
  
</div>
 <script>
/*
  var field = document.getElementById('field');
  var ball = document.getElementById('ball');


  field.onclick = function(event) {
    
    // координаты поля относительно окна
    var fieldCoords = this.getBoundingClientRect();

    // координаты левого-верхнего внутреннего угла поля
    var fieldInnerCoords = {
      top: fieldCoords.top + field.clientTop,
      left: fieldCoords.left + field.clientLeft
    };

    // разместить по клику,
    // но сдвинув относительно поля (т.к. position:relative) 
    // и сдвинув на половину ширины/высоты
    // (!) используются координаты относительно окна clientX/Y, как и в fieldCoords
    var ballCoords = {  
      top: event.clientY - fieldInnerCoords.top - ball.clientHeight / 2,
      left: event.clientX - fieldInnerCoords.left - ball.clientWidth / 2
    };

    // вылезает за верхнюю границу - разместить по ней
    if(ballCoords.top < 0) ballCoords.top = 0;

    // вылезает за левую границу - разместить по ней
    if(ballCoords.left < 0) ballCoords.left = 0;


    // вылезает за правую границу - разместить по ней
    if(ballCoords.left + ball.clientWidth > field.clientWidth) {
      ballCoords.left = field.clientWidth - ball.clientWidth;
    }

    // вылезает за нижнюю границу - разместить по ней
    if(ballCoords.top + ball.clientHeight > field.clientHeight) {
      ballCoords.top = field.clientHeight - ball.clientHeight;
    }

    ball.style.left = ballCoords.left + 'px';
    ball.style.top = ballCoords.top + 'px';
  }

*/
  </script>