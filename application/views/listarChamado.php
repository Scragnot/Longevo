<ul class="nav nav-tabs">
  <li role="presentation"><a href="<?php echo base_url('index.php'); ?>">Home</a></li>
  <li role="presentation"><a href="<?php echo base_url('index.php/InserirChamado'); ?>">Inserir Chamado</a></li>
  <li role="presentation" class="active"><a href="#">Listar Chamado</a></li>
</ul>

<br />

<form class="form-inline" method="post">
  <div class="form-group">
    <label for="exampleInputName2">Email</label>
    <input type="text" class="form-control" name="filtroEmail" value="<?php echo $filtroEmail;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">ID Pedido</label>
    <input type="text" class="form-control" name="filtroPedido" value="<?php echo $filtroPedido;?>">
  </div>
  <button type="submit" class="btn btn-default">Filtrar</button>
</form>

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

<nav aria-label="Page navigation">
  <ul class="pagination">
    <li <?php if($pagina == 1){ ?> class="disabled" <?php } ?>>
      <a <?php if($pagina != 1){ echo 'href="' . base_url('index.php/ListarChamado/index/' . ($pagina-1) . '"'); } ?> aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for ($i = 1; $i <= ceil($total/5) ; $i++) { ?>
      <?php if($pagina == $i){ ?>
        <li class="active"><a><?php echo $i; ?></a></li>
      <?php }else{ ?>
        <li><a href="<?php echo base_url('index.php/ListarChamado/index/' . ($i)); ?>"><?php echo $i; ?></a></li>
      <?php } ?>
    <?php } ?>
    <li <?php if($pagina == ceil($total/5)){ ?> class="disabled" <?php } ?>>
      <a <?php if($pagina != ceil($total/5)){ echo 'href="' . base_url('index.php/ListarChamado/index/' . ($pagina+1) . '"'); } ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
