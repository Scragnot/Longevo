<script type="text/javascript">
	$(document).ready(function() {
	    $('form').submit(function(event) {
	    	$('#alertaPedido').addClass('hidden');
		    $('#sucesso').addClass('hidden');


	        var formData = {
	            'cliente'           : $('#cliente').val(),
	            'email'             : $('#email').val(),
	            'pedido'            : $('#pedido').val(),
	            'titulo'            : $('#titulo').val(),
	            'observacao'        : $('#observacao').val()
	        };

	        $.ajax({
	            type        : 'POST',
	            url         : '<?php echo base_url('index.php/InserirChamado/inserir'); ?>',
	            data        : formData,
	            dataType    : 'json',
                encode      : true
	        })
	            .done(function(data) {
	            	console.log(data['erroPedido']);
				    if(data['erroPedido'] == 1){
				    	$('#alertaPedido').removeClass('hidden');
				    }
				    if(data['sucesso'] == 1){
					    $('#sucesso').removeClass('hidden');
					}
	            });

	        event.preventDefault();
	    });
	});
</script>

<ul class="nav nav-tabs">
  <li role="presentation"><a href="<?php echo base_url('index.php'); ?>">Home</a></li>
  <li role="presentation" class="active"><a href="#">Inserir Chamado</a></li>
  <li role="presentation"><a href="<?php echo base_url('index.php/ListarChamado'); ?>">Listar Chamado</a></li>
</ul>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Cliente</label>
    <input type="text" class="form-control" id="cliente">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Numero do Pedido</label>
    <input type="text" class="form-control" id="pedido">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" class="form-control" id="titulo">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Observacao</label>
    <textarea class="form-control" rows="3" id='observacao'></textarea>
  </div>
  <div class="form-group">
  	<button type="submit" class="btn btn-default">Enviar</button>
  </div>
  <div class="alert alert-danger hidden" id="alertaPedido" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Erro:</span>
	  Pedido nao encontrado.
  </div>
  <div class="alert alert-success hidden" id="sucesso" role="alert">
	  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
	  <span class="sr-only">Sucesso:</span>
	  Registro inserido com sucesso.
  </div>
</form>