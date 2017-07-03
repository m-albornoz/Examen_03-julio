<?php include('header.php');?>

<section id="page">

<div class="container">
<div class="row">
  <div class="col-lg-12 text-center">
    <h2 class="page-heading">Acreditaciones</h2>
  </div>
  <div class="col-lg-10 col-lg-offset-1">

    <?php
    $csv = array_map('str_getcsv', file('datos/acreditacion.csv'));
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);
    ?>



    <table id="tablesorter" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
    		<thead>
    			<tr>
    				<th>Carrera</th>
    				<th>Institución</th>
            <th>Acreditación de la carrera</th>
    				<th>Periodo Acreditacion</th>
    				<th>Documento Acreditador</th>

    			</tr>
    		</thead>
    		<tbody>

    			<?php for($a = 0; $a < $total = count($csv); $a++){?>

    			<tr>
    				<td><?php echo($csv[$a]["carrera"])?></td>
    				<td><?php echo($csv[$a]["institucion"])?></td>
            <td><?php echo($csv[$a]["acreditacion_carrera"])?></td>
    				<td><?php echo($csv[$a]["periodo_acreditacion_carrera"])?></td>
            <td><?php
if ($csv[$a]["Documento_Acreditador"] == "Acuerdo") { ?>
    <a href="<?php echo($csv[$a]["Enlace"] )?>"target="_blank"><?php echo($csv[$a]["Documento_Acreditador"])?></a>
    <?php
}
if ($csv[$a]["Documento_Acreditador"] == "No Acreditada") {
    echo ($csv[$a]["Documento_Acreditador"]);
}
?></td>


    			</tr>

    			<?php };?>

    		</tbody>
    	</table>
      <div class="col-lg-12"><strong>FUENTE:<strong> www.mifuturo.cl. Para saber más sobre el proyecto, puedes ingresar a <a href="http://enedi.cl">enedi.cl</div>  </div>
<button id="export" data-export="export" class="btn btn-primary">Exportar aquí</button>
  </div>
</div>
</div>

</section>

<?php include('footer.php');?>
