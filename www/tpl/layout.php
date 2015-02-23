<!doctype html>
<html lang="<?=$setlang?>" class="<?=$help?>">
<head>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <meta charset="UTF-8" />
	
	<!-- пагинация -->
	<script async="" type="text/javascript" src="http://www.gstatic.com/pub-config/ca-pub-8635539539050660.js"></script>
	<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
	
	<script type="text/javascript">
 var Imtech = {};
Imtech.Pager = function() {




    this.paragraphsPerPage = 3;
    this.currentPage = 1;
    this.pagingControlsContainer = '#pagingControls';
    this.pagingContainerPath = '#content';
    // число страниц
    this.numPages = function() {
        var numPages = 0;
        //          ('div.z')                               5
        if (this.paragraphs != null && this.paragraphsPerPage != null) {
        // метод ceil - возвращает наименьшее целое
            numPages = Math.ceil(this.paragraphs.length / this.paragraphsPerPage);
        }

        return numPages;
    };
    
    
    
    
// page - текущая (открытая - номер) страница, то есть в ф-ю передаем номер текущий страницы, контент котор впоследствии выводим
    this.showPage = function(page) {
        this.currentPage = page;
        var html = '';
// slice - Данный метод не изменяет исходный массив, а просто возвращает его часть.
// то есть выводит тот контент, котор соответствует текущей странице
        this.paragraphs.slice((page-1) * this.paragraphsPerPage,
            ((page-1)*this.paragraphsPerPage) + this.paragraphsPerPage).each(function() {
            html += '<div>' + $(this).html() + '</div>';
        });
// вставляем контент
        $(this.pagingContainerPath).html(html);
//                          #pagingControls,  текущая страница(по умолч. 1), общее число страниц     
        renderControls(this.pagingControlsContainer, this.currentPage, this.numPages());
    }
    
    
    
    
// блок с навигацией
    var renderControls = function(container, currentPage, numPages) {
// разметка с навигацией
        var pagingControls = 'Страницы: <ul>';
        for (var i = 1; i <= numPages; i++) {
            if (i != currentPage) {
                pagingControls += '<li><a href="#" onclick="pager.showPage(' + i + '); return false;">' + i + '</a></li>';
            } else {
                pagingControls += '<li>' + i + '</li>';
            }
        }

        pagingControls += '</ul>';

        $(container).html(pagingControls);
    } 
}   

var pager = new Imtech.Pager();
$(document).ready(function() {
    // кол-во выводимых параграфов () или div )
    // на одной странице
    pager.paragraphsPerPage = 100; 
    // основной контейнер
    pager.pagingContainer = $('#content'); 
    // обозначаем требуемый блок ('div.z')
    pager.paragraphs = $('div.tabss', pager.pagingContainer); 
    pager.showPage(1);
});
</script>
	
	<!-- конец пагин-->
	<script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
    <script type="text/javascript">
      var bg_ini = function () {
        if($$c.get('bg_style')!=undefined) {
          if($$c.get('bg_style').indexOf('#')===0) {
            $$($$().body,'background',$$c.get('bg_style'));
          }
          else {
          	$$($$().body,'backgroundImage','url('+$$c.get('bg_style')+')');
          }
        }
        else {
          //фон по умолчанию
          $$($$().body,'background','#555555');
        }
      }
      //ф-ция по умолчанию назначения 
      var bg_set = function (value) {
        $$c.set('bg_style', value, 60*60*24*30);
        bg_ini();
      }
      //ф-ция по умолчанию
      var bg_rem = function () {
        $$c.erase('bg_style');
        bg_ini();
      }

      
      $$r(function () {
        bg_ini();
      });
	  
	  //тамймер переключения
  var i = 1;
  var timer = setInterval(function() {
	 /* if (i==1){bg_set('/img/1.jpg');} 
	  if (i==2){bg_set('/img/2.jpg');} 
	  if (i==3){bg_set('/img/3.jpg');} */
	  if (i==1){bg_set('#284BA6');}
	  if (i==2){bg_set('#99a628');}
	  if (i==3){bg_set('#1b9626');}
	 
	  i++; 
	  if (i==3) { i=1;} },
	  15000);
	  
//http://javascript.ru/blog/script_code/Smena-fonovogo-izobrazheniya-cveta-javascript-s-pomoshu-cookie-kliku
    </script>
	
	<script>
	//список
	var show;
	function hidetxt(type){
	param=document.getElementById(type);
	if(param.style.display == "none") {
	if(show) show.style.display = "none";
	param.style.display = "block";
	show = param;
	}else param.style.display = "none"
	}
	</script>
	
	<script type="text/javascript">
	//выпад спис поиск
var _click = function () {
        var b = 1;
        return function (c) {
            var a = document.getElementById("item" + b);
            c == b && (a.style.display = "none" == a.style.display ? "" : "none");
            c != b && (a.style.display = "none", a = document.getElementById("item" + c), a.style.display = "", b = c)
        }
    }();
window.onload = function() {
    _click(1)
 }
 
 //http://javascript.ru/forum/misc/25996-zakrytie-i-otkrytie-diva-po-kliku.html
</script>
    <title><?= $title ?></title>
</head>

<body>
	<header class="main">
			<div class="language">
				<?php foreach ($lang as $value): ?>
						<a class="<?=($setlang==$value['name'])?'active':''?>" href="#" onclick="setlang('<?=$value['name']?>');return false;"><?=$value['name']?></a>
				<?php endforeach; ?>
			</div>
			<div class="menu">
				<a href="/"><?=t('main');?></a>
				<a href="/news">Новости</a>
				<a href="/p/help">Помощь</a>
			</div>
			<?php 
			$login = $_SESSION["login"];
			$result = call("SELECT * FROM `users` WHERE `nic_name`='$login'");
			if(isset($_SESSION["login"]) && isset($_SESSION["keys"]) && $_SESSION["login"] == $result[0]["nic_name"] && $_SESSION["keys"] == $result[0]["keys"]) {
				echo "Добро пожаловать сэр <a href='/user/".$_SESSION["login"]."'>".$_SESSION["login"]."</a> <a href='/layout/exit' > выйти </a>";
			} else { echo '
			<div class="signup">
				<a class="enter" href="#authform">Вход</a>
				<a href="#signform">Регистрация</a>
			</div>
			'; } ?>
		
	</header>

<div class=bodyfonblock>
<div class=bodyfon onclick="bg_set('/img/1.jpg');"></div>
<div class=bodyfon onclick="bg_set('/img/2.jpg');"></div>
<div class=bodyfon onclick="bg_set('/img/3.jpg');"></div>
<div class=bodyfon onclick="bg_set('#284BA6');"></div>
<div class=bodyfon onclick="bg_set('#99a628');"></div>
<div class=bodyfon onclick="bg_set('#1b9626');"></div>
</div>
<!-- logo -->
<div id="logopole">
    <img src="img/logo.png" id="logo" class="logo">
</div>

 <script>

  var field = document.getElementById('logopole');
  var ball = document.getElementById('logo');


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


  </script>

<!-- logo -->

<!-- form -->

		<?php formAuth(); ?>
		<?php formSing(); ?>
			

<!-- content -->

<div class="content">
	<!--a class="searchbut" href="#searchform">Поиск</a-->
	<div class="searchbut-align">
		<a class="searchbut" onclick="_click(1); return false;" href="#" align=center>Search</a>
	</div>
	<div class=searchformblock style=" display:none" id="item1">
	<?php formSearch(); ?>


	</div>
	<div class=clearf> </div>

	<div class="content second">
	<div class="contecs">
	<div class="tab">
<?php 	
echo $admin;
echo $content;
?>
</div>
</div>
			<?php include('rightbar.php');?>
			<div class="clearf"> </div>
	</div>
</div>

	<footer>footer</footer>
</body>
</html>
