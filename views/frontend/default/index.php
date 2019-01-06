<?= $this->title = 'Modül çalışıyor.'; ?>
<?php use kouosl\theme\widgets\ButtonYonlendir; ?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Kou Osl Yii2 App</h1>

        <p class="lead">Örnek uygulamayı başarılı bir şekilde çalıştırdınız.</p>
        <p class="lead"><?php ButtonYonlendir::widget(['message' => 'Good morning']); ?> </p>
			
        <p><a class="btn btn-lg btn-success" href="#">Modüller ve konfürgasyon!</a></p>
    </div>

</div>
