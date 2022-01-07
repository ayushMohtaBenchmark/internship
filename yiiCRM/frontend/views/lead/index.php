<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use app\models\Plan;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>🔥🔥 Yii CRUD 🔥🔥</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>


<div class="container">
    <div class="page-header-extended">
      <h2 class="page-title"> <strong>Lead Table 😎 </strong></h2>
    </div>
    <div class="starter-template">
        <div class="info-table-header-block">
            <a href="index.php?r=lead/create" class="btn btn-primary add-new-button">Add Lead <i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>

      <?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					'lead_id',
                    [
                        'attribute' => 'person_id',
                        'value' => 'person.name'
                    ],
                    [
                        'label' => 'Email',
                        'value' => 'person.email'
                    ],
					'created_at',
					[
						'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}'
					],
                    [
                        'label'=>'Convert to Opportunity','format' => 'raw',
                        'value' => function($data) {
                            $url = "opportunity/create";
                            return Html::a('Convert to Opportunity', [$url, 'id' => $data->lead_id], ['class' => 'btn btn-success']); 
                        }
                    ],
                ],]); 
                
        ?>
      
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <script src="http://localhost:8012/yii/yiiNewsFeedCRUD/frontend/web/js/bootstrap.min.js"></script>
</body>

</html>