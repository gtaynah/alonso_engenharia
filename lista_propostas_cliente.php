<?php
//var_dump($_GET);
$codigo = $_GET['cod'];
include('menu.php');
include('functions/listar_propostas_cliente.php');

?>

<style>
.icone { width: 30px; height: 30px; }
.icone_modal { margin-right: 15px; }
h1 { text-align: center; padding-top: 30px; }
table { background-color: #FFFFF0; }
#btn-confirm{ border: none; background-color: transparent; }
.exportar { margin-left: 15px; }
.cadastro p a { margin-right: 10px; text-decoration: none; color: #000; }
.cadastro img { margin-right: 10px; }
</style>

<div class="conteudo">
	<h1>Propostas do Cliente</h1>
	
	<div class="table-responsive lista_propostas col-md-10 offset-md-1">
		<table class="table" id="tb_propostas">
		  <thead>
		    <tr>
		      <th scope="col">Cliente</th>
		      <th scope="col">Endereço</th>
		      <th scope="col">Valor Total R$</th>
		      <th scope="col">Qtde de Parcelas</th>
		      <th scope="col">Sinal R$</th>
		      <th scope="col">Início do Pagamento</th>
		      <th scope="col">Status</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  	if(isset($propostas)){
		  	foreach ($propostas as $proposta => $value) {
		  	?>
		    <tr>
		      <td><?php echo $value['cliente'] ?></td>
		      <td><?php echo $value['endereco_obra'] ?></td>
		      <td><?php echo $value['valor_total'] ?></td>
		      <td><?php echo $value['qtd_parcelas'] ?></td>
		      <td><?php echo $value['sinal'] ?></td>
		      <td><?php echo $value['dt_inicio_pag'] ?></td>
		      <td class="status" data-cod="<?php echo $value['codigo'] ?>" data-status="<?php echo $value['status'] ?>"><?php if ($value['status']==1)echo "Aberta"; else echo "Fechada"; ?></td>
		      <td><a href="edicao_proposta.php?cod=<?php echo $value['codigo'] ?>"><img class="icone" src="assets/images/editar.png"></a></td>
		      <td class="delete-item" for="<?php echo $value['codigo'] ?>">
					<img class="icone" src="assets/images/delete.png">
				</td>
		    </tr>
		    <?php
			}
			}
			?>
		  </tbody>
		</table>
	</div>
	<div class="exportar">
		<button type="button" class="btn btn-dark offset-md-1" id="btn_exportar">Exportar</button>
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
		url: "functions/excluir_proposta.php",
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

$('.status').click(function(){
	var cod = $(this).attr('data-cod');
	var status = $(this).attr('data-status');
	
	$.ajax({
		method: "POST",
		dataType : "html",
		url: "functions/alterar_status.php",
		data: { 'cod': cod, 'status': status },
		success: function (msg){
			setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);    
        }
	})
});

</script>