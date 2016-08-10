<ul class="nav nav-tabs">
  <li role="presentation"><a href="../">Home</a></li>
  <li role="presentation"><a href="InserirChamado">Inserir Chamado</a></li>
  <li role="presentation" class="active"><a href="#">Listar Chamado</a></li>
</ul>


<table class="table">
	<tr>
		<th>ID</th>
		<th>Cliente</th>
		<th>Pedido</th>
		<th>Titulo</th>
		<th>Observacao</th>
	</tr>
	<?php foreach ($chamados->result() as $row) { ?>
		<tr>
			<td><?php echo $row->id_chamado;?></td>
			<td><?php echo $row->cliente;?></td>
			<td><?php echo $row->pedido;?></td>
			<td><?php echo $row->titulo;?></td>
			<td><?php echo $row->observacao;?></td>
		</tr>
	    
	<?php } ?>
</table>

