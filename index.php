<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$('document').ready(function(){
				$.getJSON('lista.json',function(data){
					console.log(data);
				});

				var info = ('lista.json');
				$.ajax({
				    url: info,
				    success: function(data) {
				      $datos = $('#resultado');
				      $tabla = $('<table><tr><td>nombre</td><td>puntos</td><td>total</td></tr></table>');
				      $tabla.attr("border", "2");
				      
				      for (var i = 0; i < data.equipos.length; i++) {
				        var $tr = $('<tr></tr>');
				        $tr.append('<td>' + data.equipos[i].nombre + '</td>');
				        $tr.append('<td>' + data.equipos[i].puntos.join('<br>') + '</td>');
				        $tr.append('<td>' + data.equipos[i].total  + '</td>');
				        $tr.attr("valign", "top");
				        $tabla.append($tr);
				      }
				      $datos.append($tabla);
				    }
				  });

		    });		
	</script>
</head>
<body>
	<?php
	$url = file_get_contents('lista.json');
	$array = json_decode($url);
	
	foreach ($array as $key => $value) {
        	/*echo "<pre>";
        	print_r($value);
        	echo "</pre>";*/
	        	$punto = implode($value[0]->puntos,"<br>");
	        	$punto1 = implode($value[1]->puntos, "<br>" );
	        	$punto2 = implode($value[2]->puntos, "<br>");
        	?>
        	<table border="2">
        		<tr>
        			<td>nombre</td>
        			<td>puntos</td>
        			<td>total</td>
        		</tr>
        		<tr>
        			<td valign="top"><?php print_r($value[0]->nombre); ?></td>
        			<td><?php print_r($punto); ?></td>
        			<td valign="top"><?php print_r($value[0]->total); ?></td>
        		</tr>
        		<tr>
        			<td valign="top"><?php print_r($value[1]->nombre); ?></td>
        			<td><?php print_r($punto1); ?></td>
        			<td valign="top"><?php print_r($value[1]->total); ?></td>
        		</tr>
        		<tr>
        			<td valign="top"><?php print_r($value[2]->nombre); ?></td>
        			<td><?php print_r($punto2); ?></td>
        			<td valign="top"><?php print_r($value[2]->total); ?></td>
        		</tr>
        	</table>
        	<?php  
        	echo "<br>"	;
        }
	?>


<div id="resultado"></div>
</body>
</html>