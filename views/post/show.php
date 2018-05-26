<?php
//$this->title = 'Одна статья';
?>

<?php $this->beginBlock('block1'); ?>
    <h1>Заголовок страницы</h1>
<?php $this->endBlock(); ?>

<h1>Show Action</h1>

<?php //debug($cats) ?>
<?php //echo count($cats->products) ?>
<?php //debug($cats) ?>

<?php foreach($cats as $cat){
    echo '<ul>';
        echo '<li>' . $cat->title . '</li>';
        foreach($cat->products as $product){
            echo '<ul>';
                echo '<li>' . $product->title . '</li>';
            echo '</ul>';
        }
    echo '</ul>';
}  ?>

<button class="btn btn-success" id="btn">Click me...</button>

<?php //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']) ?>
<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD) ?>

<?php //$this->registerCss('.container{background: #ccc;}') ?>

<?php

$js = <<<JS
    $('#btn').on('click', function(){
        $.ajax({
            url: 'index.php?r=post/index',
            data: {test: '123'},
            type: 'POST',
            success: function(res){
                console.log(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });
JS;

$this->registerJs($js);

?>