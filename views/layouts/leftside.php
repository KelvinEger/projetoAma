<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
			</div>
			<div class="pull-left info">
				<p>Nome de Usuário</p>
				<!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Pesquisar...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<?=
		Menu::widget(
				  [
					  'options' => ['class' => 'sidebar-menu'],
					  'items' => [
						  ['label' => 'Menu', 'options' => ['class' => 'header']],
						  ['label' => 'Painel Principal', 'icon' => 'fa fa-chart-line',
							  'url' => ['/'], 'active' => $this->context->route == 'site/index'
						  ],
						  [
							  'label' => 'Cadastros',
							  'icon' => 'fa fa-plus',
							  'url' => '#',
							  'items' => [
								  [
									  'label' => 'Produtos',
									  'icon' => 'fa fa-archive',
									  'url' => '?r=produto/create',
									  'active' => $this->context->route == 'produto/create'
								  ],
								  [
									  'label' => 'Categorias',
									  'icon' => 'fa fa-list',
									  'url' => '?r=categoria/create',
									  'active' => $this->context->route == 'categoria/create'
								  ],
								  [
									  'label' => 'Entradas',
									  'icon' => 'fa fa-cart-plus',
									  'url' => '?r=entrada/create',
									  'active' => $this->context->route == 'entrada/create'
								  ],
								  [
									  'label' => 'Saídas',
									  'icon' => 'fa fa-cart-arrow-down',
									  'url' => '?r=saida/create',
									  'active' => $this->context->route == 'saida/create'
								  ]
							  ]
						  ],
						  [
							  'label' => 'Consultas',
							  'icon' => 'fa fa-search',
							  'url' => '#',
							  'items' => [
								  [
									  'label' => 'Produtos',
									  'icon' => 'fa fa-database',
									  'url' => '?r=produto/index',
									  'active' => $this->context->route == 'produto/index'
								  ],
								  [
									  'label' => 'Categorias',
									  'icon' => 'fa fa-database',
									  'url' => '?r=categoria/index',
									  'active' => $this->context->route == 'categoria/index'
								  ]
							  ]
						  ],
						  [
							  'label' => 'Relatórios',
							  'icon' => 'fa fa-print',
							  'url' => ['/user'],
							  'items' => [
								  [
									  'label' => 'Produtos',
									  'icon' => 'fa fa-print',
									  'url' => '?r=relatorio/produto',
									  'active' => $this->context->route == 'relatorio/produto'
								  ],
								  [
									  'label' => 'Categorias',
									  'icon' => 'fa fa-print',
									  'url' => '?r=relatorio/categoria',
									  'active' => $this->context->route == 'relatorio/categoria'
								  ],
								  [
									  'label' => 'Entradas',
									  'icon' => 'fa fa-print',
									  'url' => '?r=relatorio/produto',
									  'active' => $this->context->route == 'relatorio/produto'
								  ],
								  [
									  'label' => 'Saídas',
									  'icon' => 'fa fa-print',
									  'url' => '?r=relatorio/categoria',
									  'active' => $this->context->route == 'relatorio/categoria'
								  ]
							  ]
						  ],
//						  ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
//						  ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
					  ],
				  ]
		)
		?>

	</section>
	<!-- /.sidebar -->
</aside>
