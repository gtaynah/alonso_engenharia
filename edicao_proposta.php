<?php
include('menu.php');
include('functions/listar_clientes.php');
include('functions/buscar_proposta.php');
?>

<style>
h1 { text-align: center; padding-top: 30px; }
.edicao_proposta { background-color: #FFFFF0; padding-top: 15px; padding-bottom: 15px; -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
.btn-edita { margin-top: 15px; }
</style>

<div class="conteudo">
	<h1>Edição de Proposta</h1>
	<div class="edicao_proposta col-md-8 offset-md-2">
		<form enctype="multipart/form-data" method="post" action="functions/editar_proposta.php">
			<div class="form-group">
		    	<label for="cliente">Cliente</label>
			    <select class="form-control" id="cliente" name="cliente">
			    	<?php
			    	foreach ($clientes as $cliente => $value) {
		  			?>
			      	<option value="<?php echo $value['codigo'] ?>" 
			      			<?php if($value['codigo']==$proposta['cliente']) echo "selected" ?> >
			      			<?php echo $value['nome'] ?>
			      	</option>
			      	<?php } ?>
			    </select>		  
			</div>
			<div class="form-group">
		    	<label for="endereco_obra">Endereço da Obra</label>
		    	<input type="text" class="form-control" id="endereco_obra" name="endereco_obra" value="<?php echo $proposta['endereco_obra'] ?>">		  
			</div>
			<div class="form-row">
				<div class="col">
					<label for="valor_total">Valor Total</label>
		    		<input type="text" class="form-control" id="valor_total" name="valor_total" value="<?php echo $proposta['valor_total'] ?>">
				</div>
				<div class="col">
					<label for="sinal">Sinal</label>
		    		<input type="text" class="form-control" id="sinal" name="sinal" value="<?php echo $proposta['sinal'] ?>">
				</div>	
			</div>	
			<div class="form-row">
				<div class="col">
					<label for="qtde_parcelas">Qtde de Parcelas</label>
		    		<input type="text" class="form-control" id="qtde_parcelas" name="qtde_parcelas" value="<?php echo $proposta['qtd_parcelas'] ?>">
				</div>
				<div class="col">
					<label for="valor_parcelas">Valor das Parcelas</label>
		    		<input type="text" class="form-control" id="valor_parcelas" name="valor_parcelas" value="<?php echo $proposta['valor_parcelas'] ?>">
				</div>	
			</div>	 
			<div class="form-row">
				<div class="col">
					<label for="dt_inicio_pag">Data de Início do Pagamento</label>
		    		<input type="date" class="form-control" id="dt_inicio_pag" name="dt_inicio_pag" value="<?php echo $proposta['dt_inicio_pag'] ?>">
				</div>
				<div class="col">
					<label for="dt_parcelas">Data das Parcelas</label>
		    		<input type="text" class="form-control" id="dt_parcelas" name="dt_parcelas" value="<?php echo $proposta['dt_parcelas'] ?>">
				</div>	
			</div>
			<div class="form-group">
				<label for="status">Status</label>
		    	<select class="form-control" id="status" name="status">
		      		<option value="1" <?php if($proposta['status']==1) echo "selected" ?> >Aberta</option>
		      		<option value="0" <?php if($proposta['status']==2) echo "selected" ?> >Fechada</option>
		    	</select>
			</div>
			<div class="form-group custom-file" >
				<label class="custom-file-label" for="anexo">
				</label>
		    	<input type="file" class="custom-file-input" id="anexo" name="anexo">
		    	<a href="assets/uploads/<?php echo $proposta['anexo'] ?>" download>Visualizar Arquivo</a>
			</div>	
			<input type="hidden" id="codigo" name="codigo" value="<?php echo $proposta['codigo'] ?>">
			<input type="hidden" id="anexo_atual" name="anexo_atual" value="<?php echo $proposta['anexo'] ?>">	  
		  
		  <button type="submit" class="btn-edita btn btn-dark">Editar</button>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>