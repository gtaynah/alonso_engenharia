<?php
include('menu.php');
include('functions/buscar_usuario.php');
//var_dump($usuario);
?>

<style>
h1 { text-align: center; padding-top: 30px; }
.edicao_usuario { background-color: #FFFFF0; padding-top: 15px; padding-bottom: 15px; -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
.btn-edita { margin-top: 15px; }
</style>

<div class="conteudo">
	<h1>Edição de Usuário</h1>
	<div class="edicao_usuario col-md-8 offset-md-2">
		<form method="post" action="functions/editar_usuario.php" data-toggle="validator">
			<div class="form-group">
		    	<label for="nome">Nome</label>
		    	<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nome'] ?>" data-error="Por favor, insira um nome" require>
		    	<div class="help-block"></div>		  
			</div>
			<div class="form-group">
		    	<label for="email">Email</label>
		    	<input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email'] ?>"  data-error="Por favor, informe um e-mail correto." required>
		    	<div class="help-block with-errors"></div>		
			</div>
			<div class="form-group">
		    	<label for="senha">Senha</label>
		    	<input type="password" class="form-control" id="senha" name="senha" value="<?php echo $usuario['senha'] ?>" data-minlength="6" required>
		    	<span class="help-block">Mínimo de 6 digitos</span>		
			</div>
			<div class="form-group">
		    	<label for="confirme_senha">Confirme a senha</label>
		    	<input type="password" class="form-control" id="confirme_senha" name="confirme_senha" value="<?php echo $usuario['senha'] ?>" data-match="#senha" data-match-error="Atenção! As senhas não estão iguais." required>
		    	<div class="help-block with-errors"></div>	
			</div>  
		  <input type="hidden" id="codigo" name="codigo" value="<?php echo $usuario['codigo'] ?>">
		  <input type="hidden" id="senha_atual" name="senha_atual" value="<?php echo $usuario['senha'] ?>">
		  <button type="submit" class="btn-edita btn btn-dark">Editar</button>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>