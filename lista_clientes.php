<?php
include('menu.php');
include('functions/listar_clientes.php');

?>

<style>
.icone { width: 30px; height: 30px; }
.icone_modal { margin-right: 15px; }
h1 { text-align: center; padding-top: 30px; }
table { background-color: #FFFFF0; }
#btn-confirm{ border: none; background-color: transparent; }
.cadastro p a { margin-right: 10px; text-decoration: none; color: #000; }
.cadastro img { margin-right: 10px; }
</style>

<div class="conteudo">
	<h1>Clientes</h1>
	<div class="col-md-8 offset-md-2 cadastro">
		<p><a href="cadastro_cliente.php"><img class="icone" src="assets/images/novo.png">Cadastrar novo cliente</a></p>
	</div>
	
	<div class="lista_clientes tabe-responsive col-md-8 offset-md-2">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Razão Social</th>
		      <th scope="col">Nome Fantasia</th>
		      <th scope="col">CNPJ</th>
		      <th scope="col">Telefone</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  	if(isset($clientes)){
		  	foreach ($clientes as $cliente => $value) {
		  	?>
		    <tr>
		      <td><?php echo $value['nome'] ?></td>
		      <td><?php echo $value['fantasia'] ?></td>
		      <td><?php echo $value['cnpj'] ?></td>
		      <td><?php echo $value['telefone'] ?></td>
		      <td><a href="edicao_cliente.php?cod=<?php echo $value['codigo'] ?>"><img class="icone" src="assets/images/editar.png"></a></td>
		      <td class="delete-item" for="<?php echo $value['codigo'] ?>">
					<img class="icone" src="assets/images/delete.png">
				</td>
		      <td><a href="lista_propostas_cliente.php?cod=<?php echo $value['codigo'] ?>"><img class="icone" src="assets/images/proposta.png"></a></td>
		    </tr>
		    <?php
			}
			}
			?>
		  </tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja excluir?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Excluir</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="alert" role="alert" id="result"></div>

<?php
include('footer.php');
?>

<script>
var idDelete = 0;

$("#modal-btn-si").on("click", function(){
	$("#mi-modal").modal('hide');
	deleteItem(idDelete);
	
});

$("#modal-btn-no").on("click", function(){
	$("#mi-modal").modal('hide');
});

$(".delete-item").click(function(){
	modalConfirm($(this).attr('for'));
});

function modalConfirm(id) {
	$("#mi-modal").modal('show');

	idDelete = id;
}


function deleteItem(id) {
	$.ajax({
		method: "POST",
		dataType : "html",
		url: "functions/excluir_cliente.php",
		data: { 'codigo': id },
		success: function (msg){
			setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);    
        }
	})
}
</script>