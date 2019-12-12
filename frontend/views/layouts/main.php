<?php
   /* @var $this \yii\web\View */
   /* @var $content string */
   // use app\widgets\Alert;
   //  use yii\widgets\Alert;
   //  use Yii;
    use yii\helpers\Html;
    use yii\bootstrap4\Nav;
    use yii\bootstrap4\NavBar;
    use yii\widgets\Breadcrumbs;
    use frontend\assets\AppAsset;
    use yii\helpers\Url;
    use yii\web\JqueryAsset;

    //Please use this for Alerting in the site
    use common\widgets\Alert;    
   
    AppAsset::register($this);

   ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
   <head>
      <meta charset="<?= Yii::$app->charset ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php $this->registerCsrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <?php $this->head() ?> 
      <?php $this->head() ?>
      <?php $this->head() ?>
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
      <!-- Jquery -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
      <!-- <script src="../web/js_libs/jquery-3.4.1.min.js" ></script> -->

      <!-- Load React. -->
      <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
      <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
      <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   </head>
   <body >
      <?php $this->beginBody() ?>
      <div class="wrap" >
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top bottom-shadow">
            <a class="navbar-brand" style="color:#ff6600; font-weight:bold" href="<?= Yii::$app->homeUrl?>"><?=Yii::$app->name; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="<?= Yii::$app->homeUrl?>">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <?=Html::a('Notes', ['/note/index'], ['class'=>'nav-link']) ?>
                  </li>                  
                  <li class="nav-item">
                     <?=Html::a('Noteground', ['/note/index'], ['class'=>'nav-link']) ?>
                  </li>
                  <li class="nav-item"> 
                     <?=Html::a('Categories', ['/category/index'], ['class'=>'nav-link']) ?>
                  </li>
                  <li class="nav-item">
                     <?=Html::a('Contact', ['/site/contact'], ['class'=>'nav-link']) ?>
                  </li>
                  <li class="nav-item">
                     <?=Html::a('About', ['/site/about'], ['class'=>'nav-link']) ?>
                  </li>
               </ul>
               <div class="form-inline my-2 my-lg-0">
                  <?php
                     if( !Yii::$app->user->isGuest )
                     { echo(
                         Html::beginForm(['/site/logout'], 'post')
                         .Html::submitButton(
                             'Logout (' . Yii::$app->user->identity->username . ')
                             '.
                             '<img class="userIcon" src="../web/images/userIcon-white.png" height="15" width="20" />',
                             ['class' => 'btn btn-success logout']
                         )
                         .Html::endForm()
                         );
                     
                     }else{
                     echo Html::a('Login', ['/site/login'], ['class'=>'btn btn-primary']) ?>
                  <?php } ?> 
               </div>
            </div>
         </nav>
         <div class="navbar-content-margin-fix"></div>
         <div class="container-fluid" style="width:95%;">
            <?= Breadcrumbs::widget([
               'class'=>"breadcrumb",
               'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
               ]) ?>
                <?php
                  // if( Yii::$app->session->hasFlash('success'))
                     // echo Html::a(Yii::$app->session->getFlash('success'), ['/site/index'], ['class'=>'btn btn-secondary disabled']);
                    ?> 
                    <!-- <a class="nav-link" href="<?#= Yii::$app->homeUrl?>">Home <span class="sr-only">(current)</span></a> -->
                   <?php  
                     // echo '<div class="alert alert-success" role="alert">' . Yii::$app->session->getFlash('success') . "</div>\n";
                        // echo Html::a('asdsdawd', [''], ['class'=>'alert alert-secondary ', 'style'=> 'text-align:centre', 'disabled' => 'disabled']);
                   Alert::widget()
                ?>
            <?= $content ?>
         </div>
      </div>
      <footer class="footer">
         <div class="footer-container">
            <p class="">&copy; <?= Yii::$app->name." ".date('Y') ?></p>
         </div>
      </footer>

      <?php $this->endBody() ?>
   </body>
</html>
<?php $this->endPage() ?>