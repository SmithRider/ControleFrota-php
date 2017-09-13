<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('clientes')?>">Home</a></li>
	  <li><a href="<?=base_url('servicos')?>">Serviços</a></li>
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
	<?=form_open('servicos/salvar', array('role' => 'form'));?>
	  <div class="form-group <?php echo form_error('data') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Data</label>
	    <input type="date" class="form-control" id="data" name="data" placeholder="00/00/0000" value="<?php echo set_value('data'); ?>" />
	  </div>
  <div class="form-group">
	    <label for="id_veiculo">Veiculo</label>
	    	<select class="form-control" name="id_veiculo">
	    		<option value="0">Sem Veiculo</option>
	    		<?php foreach($veiculos as $veiculo):?>
	    			<option value="<?=$veiculo->id?>"><?=$veiculo->modelo?></option>
	    		<?php endforeach; ?>
	    	</select>
	  </div>
	  <div class="form-group <?php echo form_error('Descricao') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Descrição</label>
	    <input type="text" class="form-control" id="desc1" name="desc1" placeholder="Descrição" value="<?php echo set_value('desc1'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('Detalhes') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Detalhes</label>
	    <input type="text" class="form-control" id="desc2" name="desc2" placeholder="Detalhes" value="<?php echo set_value('desc2'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('local') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Local</label>
	    <input type="text" class="form-control" id="local" name="local" placeholder="Local" value="<?php echo set_value('local'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('departamento') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Departamento</label>
	    <input type="text" class="form-control" id="departamento" name="departamento" placeholder="" value="<?php echo set_value('departamento'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('valor') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Valor</label>
	    <input type="text" class="form-control" id="valor" name="valor" placeholder="00,00" value="<?php echo set_value('valor'); ?>" />
	  </div>
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("servicos/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>