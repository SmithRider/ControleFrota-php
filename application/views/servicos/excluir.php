
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('abastecimentos')?>">Abastecimentos</a></li>
	  <li class="active">Exclus&atilde;o de Abastecimento</li>
	</ol>
</div>
<div class='row'>
	<h2>Deseja excluir este Abastecimento?</h2>
	<hr />
	  <div class="form-group">
	    <label for="nome">Data:</label>
	    <span><?=$abastecimento->data?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">CNPJ:</label>
	    <span><?=$abastecimento->combustivel?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Endere&ccedil;o:</label>
	    <span><?=$abastecimento->quantidade?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Cidade:</label>
	    <span><?=$abastecimento->unidade?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Estado:</label>
	    <span><?=$abastecimento->preco_unitario?></span>
	  </div>
	   <div class="form-group">
	    <label for="nome">CEP:</label>
	    <span><?=$abastecimento->total?></span>
	  </div>


  	<a href="<?=base_url("abastecimentos/apagar/" . $abastecimento->id);?>" type="submit" class="btn btn-danger button-delete">Excluir</a>
    <a href="<?=base_url("abastecimentos/index")?>" type="button" class="btn btn-primary button-listar">Voltar para Lista</a>

</div>