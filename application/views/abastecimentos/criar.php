
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('abastecimentos')?>">Abastecimentos</a></li>
	  <li class="active">Adicionar</li>
	</ol>
</div>

<?php if(validation_errors()) : ?>
<div class='row'>
	<div class="alert alert-danger">
		<?php echo validation_errors(); ?>
	</div>
</div>
<?php endif; ?>

<div class='row'>
	<?=form_open('abastecimentos/salvar', array('role' => 'form'));?>
	  <div class="form-group <?php echo form_error('data') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Data</label>
	    <input type="date" class="form-control" id="data" name="data" placeholder="00/00/0000" value="<?php echo set_value('data'); ?>" />
	  </div>
  <div class="form-group">
	    <label for="id_motorista">Veiculo</label>
	    	<select class="form-control" name="id_veiculo">
	    		<option value="0">Sem Veiculo</option>
	    		<?php foreach($veiculos as $veiculo):?>
	    			<option value="<?=$veiculo->id?>"><?=$veiculo->modelo?></option>
	    		<?php endforeach; ?>
	    	</select>
	  </div>
	  <div class="form-group <?php echo form_error('Combustível') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Combustível</label>
	    <input type="text" class="form-control" id="combustivel" name="combustivel" placeholder="Flex" value="<?php echo set_value('combustivel'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('quantidade') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Quantidade</label>
	    <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="00" value="<?php echo set_value('quantidade'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('unidade') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Unidade</label>
	    <input type="text" class="form-control" id="unidade" name="unidade" placeholder="Lts" value="<?php echo set_value('unidade'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('preco_unitario') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Preço Unitário</label>
	    <input type="text" class="form-control" id="preco_unitario" name="preco_unitario" placeholder="0,00" value="<?php echo set_value('preco_unitario'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('total') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Total</label>
	    <input type="text" class="form-control" id="total" name="total" placeholder="00,00" value="<?php echo set_value('total'); ?>" />
	  </div>
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("abastecimentos/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>