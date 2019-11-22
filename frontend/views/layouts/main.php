<?php
   /* @var $this \yii\web\View */
   /* @var $content string */
   
    // use app\widgets\Alert;
    use yii\widgets\Alert;
    use yii\helpers\Html;
    use yii\bootstrap4\Nav;
    use yii\bootstrap4\NavBar;
    use yii\widgets\Breadcrumbs;
    use frontend\assets\AppAsset;
    use yii\helpers\Url;
    use yii\web\JqueryAsset;
    
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
      
      <!-- Jquery -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <!-- <script src="../web/js_libs/jquery-3.4.1.min.js" ></script> -->

      <!-- Load React. -->
      <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
      <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
      <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>


      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script src="../web/js/site.js" ></script>


   </head>
   <body >
      <?php $this->beginBody() ?>
      <div class="wrap" >
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl?>"><?=Yii::$app->name; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item ">
                     <a class="nav-link" href="<?= Yii::$app->homeUrl?>">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <?=Html::a('Notes', ['/note/index'], ['class'=>'nav-link']) ?>
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
         <div class="container">
            <?= Breadcrumbs::widget([
               'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
               ]) ?>
            <?#= Alert::widget() ?>
            <?= $content ?>
         </div>
      </div>
      <footer class="footer">
         <div class="footer-container">
            <p class="">&copy; <?= Yii::$app->name." ". date('Y') ?></p>
         </div>
      </footer>

      <?php $this->endBody() ?>
    <!---owl -->
    <script src="../web/owl/owl.carousel.min.js" crossorigin></script>

   </body>
</html>
<?php $this->endPage() ?>