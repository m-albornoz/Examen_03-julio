<?php include('header.php');?>

<section id="page">

<div class="container">
<div class="row">
  <div class="col-lg-12 text-center">
    <h2 class="page-heading">Aranceles</h2>
  </div>
  <div class="col-lg-10 col-lg-offset-1">

    <?php
    $csv = array_map('str_getcsv', file('datos/arancel.csv'));
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);
    ?>
                        <table id="tablesorter" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
                      		<thead>
                      			<tr>
                      				<th>Carrera</th>
                      				<th>Escuela</th>
                      				<th>Arancel</th>
                      				<th>Arancel formal</th>
                      				<th>Arancel real</th>
                      			</tr>
                      		</thead>
                      		<tbody>

                      			<?php for($a = 0; $a < $total = count($csv); $a++){?>

                      			<tr>
                      				<td><?php echo($csv[$a]["carrera"])?></td>
                      				<td><?php echo($csv[$a]["escuela"])?></td>
                      				<td><?php echo($csv[$a]["arancel"])?></td>
                      				<td><?php echo($csv[$a]["arancel_real"])?></td>
                      				<td><?php echo($csv[$a]["arancel_formal"]);?></td>
                              </tr>

                      			<?php };?>

                      		</tbody>
                      	</table>
                        <div class="col-lg-12"><strong>FUENTE:<strong> Elaboración propia / www.mifuturo.cl. Para saber más sobre el proyecto, puedes ingresar a <a href="http://enedi.cl">enedi.cl</div>  </div>
<button id="export" data-export="export" class="btn btn-primary">Exportar aquí</button>

  </div>
</div>
</div>

</section>

<?php include('footer.php');?>
