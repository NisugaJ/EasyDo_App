<meta  content="width=device-width, initial-scale=1.0">
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

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class=""></li>
          <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item">
            <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left active">
                <h1>Your Notes</h1>
                <h3>At One Place</h3>
                <p><a class="btn btn-lg btn-primary" href=<?= Url::to(["site/register"])?> role="button">Get Registered Today😍</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item active">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>We manage your time with custom reminders</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.0/examples/carousel/#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.0/examples/carousel/#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <!-- <a class="carousel-control-prev"  href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> -->
      </div>

        <h1 style="font-size:60px;"><b><b>Welcome to <?=Yii::$app->name ?></b></b></h1>
        <?php
        $button =   Html::a(
                        'Get Registered',
                        '/EasyDoApp/frontend/web/index.php?r=site/register',
                        ['class' => 'btn btn-lg btn-primary' ],
                    );

        Yii::$app->user->isGuest ?  print( $button )
        : NULL?>
        <br>
        <br>
        <p><button onclick="window.location.href='/EasyDoApp/frontend/web/index.php?r=site/login'"
                   class="btn btn-lg btn-primary"><?php echo Yii::$app->user->isGuest ? 'Login' : 'Hi '.Yii::$app->user->identity->username. ',<br>'.'Anything to be noted?  🖊 '?></button></p>
     
        <?php
            Yii::$app->user->isGuest ? :  
            print( Html::a(
                'Take a Note',
                 Url::to(["note/create"], true),
                ['class' => 'btn btn-lg btn-success' ],
            ));
            echo('<br><br>');
            print( Html::a(
                'My Notes',
                Url::to(["note/index"], true),
                ['class' => 'btn btn-lg btn-success' ],
            ));
            echo('<br><br>');
            print( Html::a(
                'Add Category',
                Url::to(["category/create"], true),
                ['class' => 'btn btn-lg btn-success' ],
            ));
            echo('<br><br>');
            print( Html::a(
                'My Categories',
                Url::to(["category/index"], true),
                ['class' => 'btn btn-lg btn-success' ],
            ));

        ?>
              <div class="your-owl owl-theme" style="width: 120%; margin: 0 -10%;left: 0;  right:0;">
                <div>your content
                </div>
                <div>your content
                </div>
                <div>your content
                </div>
              </div>
        
        <div id="react-test"></div>
    </div>
    <div class="body-content ">
       
    </div>
</div>
    <!-- Load our React component. -->
    <script >
        ReactDOM.render( React.createElement('div',null, <?php echo json_encode(Yii::$app->name) ?> ), document.getElementById('react-test') );
    </script>





    <script src="../web/js/index.js" crossorigin></script>  