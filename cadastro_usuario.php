<?php
include('menu.php');
?>

<style>
h1 { text-align: center; padding-top: 30px; }
.cadastro_usuario { background-color: #FFFFF0; padding-top: 15px; padding-bottom: 15px; -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px; }
.btn-cadastra { margin-top: 15px; }
</style>

<div class="conteudo">
	<h1>Cadastro de Usuário</h1>
	<div class="cadastro_usuario col-md-8 offset-md-2">
		<form method="post" action="functions/cadastrar_usuario.php" data-toggle="validator">
			<div class="form-group">
		    	<label for="nome">Nome</label>
		    	<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" data-error="Por favor, insira um nome" require>
		    	<div class="help-block"></div>		  
			</div>
			<div class="form-group">
		    	<label for="email">Email</label>
		    	<input type="email" class="form-control" id="email" name="email" placeholder="Email"  data-error="Por favor, informe um e-mail correto." required>
		    	<div class="help-block with-errors"></div>		
			</div>
			<div class="form-group">
		    	<label for="senha">Senha</label>
		    	<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" data-minlength="6" required>
		    	<span class="help-block">Mínimo de 6 digitos</span>		
			</div>
			<div class="form-group">
		    	<label for="confirme_senha">Confirme a senha</label>
		    	<input type="password" class="form-control" id="confirme_senha" name="confirme_senha" placeholder="Confirme a senha" data-match="#senha" data-match-error="Atenção! As senhas não estão iguais." required>
		    	<div class="help-block with-errors"></div>	
			</div>  
		  
		  <button type="submit" class="btn-cadastra btn btn-dark">Cadastrar</button>
		</form>
	</div>
</div>

<?php
include('footer.php');
?>