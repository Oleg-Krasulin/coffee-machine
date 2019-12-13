<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      body {
    overflow: hidden;
    }
      @import url('https://fonts.googleapis.com/css?family=Play|Roboto&display=swap&subset=cyrillic');
      * {  
        font-family: 'Play', sans-serif;
        font-size: 1rem;
      }
      .coffee-list {
        background-image: url("img/background.jpg"); /* бесшовный фон - зерна кофе */
      }
      .coffee-item {
        background-color: rgba(0,0,0,.7);
        margin: 15px 0; /* выравниваем в проекции верх-низ шириной 15px */
        border-radius: 50px 0 0 15px; /* закругляем границы начиная с лево-верх по часовой стрелке */
        cursor: pointer; /* при наведении курсор меняется на палец */
      }
      .coffee-item:hover {
        background-color: rgba(30,30,30, .7); /* при наведении курсора блоки становятся прозрачными */
      }
      .coffee-item img {   
        width: 100px;
        height: 100px;
        background-color: white; 
        border-radius:50% 10% 35% 15%;
      }
      .coffee-item span {
        color: white;
        font-size: 1.2rem;
        margin-left: 15px;
      }
      .coffee-oper {
        background-color: lightgrey; /* правую часть фон закрасили в серый */
        padding: 15px; /* вводим отступы от всех сторон */
      }
      #display {
        background-color: darkgreen; /* задний фон дисплея - темно-зеленый */
        width: 100%; /* ширина */
        height: 6rem; /* высота */
        border: 3px solid black; /* граница дисплея толщина 3px, линия сплошная, черная */
        color: white;
      }
      #balance input { 
        height: 6rem; /* выравениваем баланс */
      }
      #cup img {
        width: 100%; /* задаем размер картинки с кружкой */
        opacity: 0; /* задаем прозрачность кружки или в % или от 0 до 1*/
        cursor: pointer;/*при наведении курсор меняется на палец */ 
      }
      #atm img {
        width: 100%; /* задаем размер картинки с банкоматом */
      }
      #change {
        background-color: grey; /* задний фон разменника - темно-зеленый */
        height: 5rem; /* высота */
        border: 3px solid black; /* граница дисплея толщина 3px, линия сплошная, черная */
        box-shadow: inset 0 0 15px rgba(0,0,0,.7); /* тень внутри кнопки change */
      }
      #change_btn {
        height: 5rem; /* высота 5rem */
        box-shadow: 3px 3px 0px rgb(0,0,0);
      }
      #change_btn:active {
        box-shadow: none;
      }
      .money img {
        margin: 1rem 2rem; /* вводим отступы*/
        cursor: pointer; /* вводим палец на курсоре*/
      }
    </style>
  </head>
  <body> 
      <div class="container">
        <div class="row mt-5"> 
          <div class="col-6 coffee-list d-flex flex-column justify-content-center"> <!-- Выбор кофе (flex-контейнеры: d-flex -;flex-column - ;  )  -->
            <!--.coffe-item*4>img+span <!-- вводим и нажимае tab-->
            <div class="coffee-item" onclick="cookCoffee(45,this);"><img src="img/americano.png" alt=""><span>Американо - 45 руб.</span></div>
            <div class="coffee-item" onclick="cookCoffee(50,this);"><img src="img/cappuccino.png" alt=""><span>Капучино - 50 руб. </span></div>
            <div class="coffee-item" onclick="cookCoffee(73,this);"><img src="img/Latte4.png" alt=""><span>Латте - 73 руб.</span></div>
            <div class="coffee-item" onclick="cookCoffee(41,this);"><img src="img/espresso.png" alt=""><span>Еспрессо - 41 руб.</span></div>
          </div>
          <div class="col-6 coffee-oper"> <!-- Операционная часть -->
              <!--(.row*2>.col-6*2)+.row создаем 2 ряда с к2 колонками размером 6 и 1 ряд с размером 12 -->
              <div class="row">
                <div class="col-6">
                  <div id ="display" class="p-3"> <!-- сдвигаем любые предметы внутри на размер p-3 (padding) -->
                    <span id="display_text">Выберите кофе!</span>
                    <div class="progress mt-3 d-none"> <!-- выводим полоску варки кофе(взять в bootstrap), ввели интервал mt-3-->
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" 
                        role="progressbar"
                        aria-valuenow="75"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="width: 0%">
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-6" id = "balance">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Баланс">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">&nbsp&#x584&nbsp
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6" id = "cup"> <!-- это кружка --> 
                  <img src="img/americano.png" alt="">
                </div>
                <div class="col-6" id = "atm"> <!-- это приемник денег -->
                  <img src="img/bill_acc.png" alt="">
                </div>
              </div>
              <div class="row mt-3"> <!-- отступ сверху mt-3 -->
                <div class="col-8">
                  <div id="change"> <!-- это сдача -->
                  </div>
                </div>
                <div class="col-4"> <!-- кнопка Получить сдачу -->
                  <button id="change_btn" type="button"
                    class="btn btn-danger btn-lg btn-block rounded-circle">Получить сдачу</button>
                    <!-- rounded-circle - закругление кнопки -->
                </div>
              </div>
          </div>
        </div>
        <!--div.row>.col>img*3 // создаем div для купюр-->
        <div class="row">
          <div class="col money">
            <img src="img/50rub.jpg" alt="" cost="50">
            <img src="img/100rub.jpg" alt="" cost="100">
            <img src="img/500rub.jpg" alt="" cost="500">
          </div>
        </div>
      </div>
  <script src="script.js"></script>  
  </body>
</html>
