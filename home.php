<?php
require 'config.php';
require 'inc/session.php';
require 'inc/home_core.php';
if($_session->isLogged() == false)
	header('Location: index.php');

$_page = 1;

$role = $_session->get_user_role();
if($role != 1 && $role != 2)
	header('Location: items.php');

if(isset($_POST['act']) && $_POST['act'] == 'reqinfo') {
	$interval = $_POST['int'];
	
	$res = array(
		$_home->get_new_items($interval),
		$_home->get_checked_in($interval),
		$_home->get_checked_out($interval),
	);
	
	$_check_in_price = $_home->get_checked_in_price($interval);
	$_check_out_price = $_home->get_checked_out_price($interval);
	
	$res[] = '$'.$_check_in_price;
	$res[] = '$'.$_check_out_price;
	
	$res = implode('|', $res);
	
	echo $res;
	die();
}
?>
<!DOCTYPE HTML>
<html>
<?php require 'inc/head.php'; ?>
<body>
	<div id="main-wrapper">
		<?php require 'inc/header.php'; ?>
		
		<div class="wrapper-pad">
			<h2>Inicio</h2>
			<ul id="selectors">
				<li class="selected" value="today">HOY</li>
				<li value="this_week">ESTA SEMANA</li>
				<li value="this_month">ESTE MES</li>
				<li value="this_year">ESTE AÑO</li>
				<li value="all_time">TODOS</li>
			</ul>
			
			<div id="fdetails">


<!-- filtros -->
			<h2>Filtros</h2>
				<div class="element">
					<span><?php echo $_home->get_new_items1('today'); ?></span><br />
					NUEVOS<br />
					INSUMOS
				</div>
				<div class="element">
					<span><?php echo $_home->get_checked_in1('today'); ?></span><br />
					INGRESOS<br />
					(CANT. TOTAL)
				</div>
				<div class="element">
					<span><?php echo $_home->get_checked_out1('today'); ?></span><br />
					DESCUENTOS<br />
					(CANT TOTAL)
				</div>
				<div class="element">
				</div>
			</div>

<!-- CATEGORIAS AGREGADAS-->
		<div class="clear" style="margin-bottom:10px;height:1px;"></div>
		<div class="border" style="margin-bottom:10px;"></div>
						<div id="fdetails">

			<h2>Insumos</h2>
				<div class="element">
					<span><?php echo $_home->get_new_items('today'); ?></span><br />
					NUEVOS<br />
					INSUMOS
				</div>
				<div class="element">
					<span><?php echo $_home->get_checked_in('today'); ?></span><br />
					INGRESOS<br />
					(CANT. TOTAL)
				</div>
				<div class="element">
					<span><?php echo $_home->get_checked_out('today'); ?></span><br />
					DESCUENTOS<br />
					(CANT TOTAL)
				</div>

			</div>


<!-- repuestos -->
		<div class="clear" style="margin-bottom:10px;height:1px;"></div>
		<div class="border" style="margin-bottom:10px;"></div>
						<div id="fdetails">

			<h2>Filtros</h2>
				<div class="element">
					<span><?php echo $_home->get_new_items('today'); ?></span><br />
					NUEVOS<br />
					INSUMOS
				</div>
				<div class="element">
					<span><?php echo $_home->get_checked_in('today'); ?></span><br />
					INGRESOS<br />
					(CANT. TOTAL)
				</div>
				<div class="element">
					<span><?php echo $_home->get_checked_out('today'); ?></span><br />
					DESCUENTOS<br />
					(CANT TOTAL)
				</div>
			</div>
		
		<div class="clear" style="margin-bottom:40px;height:1px;"></div>
		<div class="border" style="margin-bottom:30px;"></div>

<!-- ESTADISTICAS DE SALIDAS POR CATEGORIAS -->


<!-- DESDE AQUI EMPIEZAN LAS ESTADISTICAS>

ESTADISTICAS GENERALES		
		<div class="wrapper-pad">
			<h3>Insumos para Mantención</h3>
			<div id="f2details">
				<div class="element">
					<span><?php echo $_home->repuestos(); ?></span><br />
					P. repuestos <br />
					Registrados
				</div>
				<div class="element">
					<span><?php echo $_home->general_warehouse_items(); ?></span><br />
					Total<br />
					P. repuestos
				</div>
			</div>
		</div>
		<div class="clear" style="margin-bottom:40px;height:1px;"></div>
		<div class="border" style="margin-bottom:30px;"></div>


ESTADISTICAS DE FILTROS
		<div class="wrapper-pad">
			<h3>FILTROS</h3>
			<div id="f2details">
				<div class="element">
					<span><?php echo $_home->filtros(); ?></span><br />
					Filtros <br />
					Registrados
				</div>
				<div class="element">
					<span><?php echo $_home->general_warehouse_items(); ?></span><br />
					Filtros<br />
					en total
				</div>
			</div>
		</div>
		<div class="clear" style="height:50px;"></div>
	</div>
-->
</body>
</html>