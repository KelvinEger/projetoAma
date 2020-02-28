<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Relatórios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="body-content">
	<fieldset>
		<legend>Categorias cadastradas</legend>
		<legend><h5>Filtros</h5></legend>
		<div class="card col-lg-12">
				<?php $form = ActiveForm::begin(); ?>
			<div class="col-lg-3">
				<?php

					echo Html::label('Filtro');
					echo Html::dropDownList('filtros', '', ['' => 'Selecione', 
																		 '1' => 'Contém', 
																		 '2' => 'Inicia com', 
																		 '3' => 'Termina com'], ['class' => 'form-control'])

				?>
			</div>
			<div class="col-lg-9">
				<?php

				echo Html::label('Descrição');
				echo Html::input('text', 'descricao', '', ['placeholder' => 'Descrição', 'class' => 'form-control', 'label' => 'nome']);

				?>
			</div>
		</div>
		<div class="row container">	
		<?php
			echo Html::submitButton('Download', ['class' => 'btn btn-primary']);
			$form = ActiveForm::end();	
		?>
		</div>

	</fieldset>
</div>