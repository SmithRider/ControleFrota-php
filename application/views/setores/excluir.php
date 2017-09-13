
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('cliente')?>">Cliente</a></li>
	  <li class="active">Exclus&atilde;o de Setor</li>
	</ol>
</div>
<div class='row'>
	<h2>Deseja excluir este Setor?</h2>
	<hr />
	<div class="form-group">
	    <label for="nome">ID:</label>
	    <span><?=$setor->id?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Nome:</label>
	    <span><?=$setor->nome?></span>
	  </div>


  	<a href="<?=base_url("setores/apagar/" . $setor->id);?>" type="submit" class="btn btn-danger button-delete">Excluir</a>
    <a href="<?=base_url("setores/index")?>" type="button" class="btn btn-primary button-listar">Voltar para Lista</a>

</div>