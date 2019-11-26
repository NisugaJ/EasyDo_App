<link rel="stylesheet" href="../web/css/index.css">
<link rel="stylesheet" href="../web/owl/owl.carousel.min.css">
<link rel="stylesheet" href="../web/owl/owl.theme.default.min.css">
<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Button;
use yii\bootstrap4\Carousel;
use yii\helpers\Url;

$this->registerJsFile(
  '@web/js/index.js',
  ['depends' => [\yii\web\JqueryAsset::className()]]
);
/* @var $this yii\web\View */

$this->title = Yii::$app->name ;
?>
<div class="site-index">
<div class="jumbotron">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1" ></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
              <div class="carousel-caption text-left active">
                <h1>Your Notes</h1>
                <h3>At One Place</h3>
                <p><a class="btn btn-lg btn-primary" href=<?= Url::to(["site/register"])?> role="button">Get Registered Today😍</a></p>
            </div>
          </div>
          <div class="carousel-item ">
              <div class="carousel-caption">
                <h1>Manage your time with custom reminders</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.0/examples/carousel/#" role="button">Learn more</a></p>
              </div>
          </div>
          <div class="carousel-item">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.0/examples/carousel/#" role="button">Browse gallery</a></p>
              </div>
          </div>
        </div>

      </div>

        <h1 ><b><b>Welcome to <?=Yii::$app->name ?></b></b></h1>
        <?php
        $button_register =   Html::a(
                        'Get Registered',
                        Url::to(["site/register"], true),
                        ['class' => 'btn btn-lg btn-primary' ],
                    );

        Yii::$app->user->isGuest ?  print( $button_register )
        : NULL?>
        <br>
        <br>

        <?php    Yii::$app->user->isGuest ? NULL 
                    : print(Html::a(
                      'Hi '.Yii::$app->user->identity->username.',<br>'.'Anything to be noted?  🖊 ',
                      Url::to(["note/create"], true),
                      ['class' => 'btn btn-lg btn-primary' ],
                    ));
        ?>

        <div id="react-test"></div>
    </div>
    <div class="body-content ">
    
</div>
    <!-- Load our React component. -->
    <script >
        ReactDOM.render( React.createElement('div',null, <?php echo json_encode(Yii::$app->name) ?> ), document.getElementById('react-test') );
    </script>


    <script src="../web/js/index.js" crossorigin></script>  