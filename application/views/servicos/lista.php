<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Servicos</li>
	</ol>
</div>

<div class='row'>
	<?=form_open('servicos/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">
      <input type="text" class="form-control" id="data_ini" name="data_ini" placeholder="DataInicial">
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="q" name="q" placeholder="Ve&iacute;culo">
    </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
	  <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('servicos/criar')?>'">Adicionar Servico</button>
	<?=form_close();?>
</div>

<br />

<div class="row">
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Data</th>
          <th>Ve&iacute;culo</th>
          <th>Descricao</th>
           <th>Detalhes</th>
           <th>Local</th>
          <th>Departamento</th>
          <th>Total</th>

          <th></th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($servicos as $servico): ?>
        <tr>
          <td><?php echo $servico->id; ?></td>
          <td>
          	<?php echo $servico->data ;?>
         	 </td>
             <td>
             <?php echo $servico->Veiculo()->modelo; ?>
         	 </td>
         	 <td class="text-right">
              <?php echo $servico->desc1; ?>
         	 </td>
         	 <td class="text-right">
            <?php echo $servico->desc2; ?>&nbsp;
         	 </td>
         	 <td class="text-right">
		              <?php echo $servico->local; ?>&nbsp;
          	</td>
          	<td class="text-right">
		              <?php echo $servico->departamento; ?>&nbsp;
          	</td>
 			<td class="text-right">
            R$ <?php echo number_format($servico->valor, 2, ",", "."); ?>
          	</td>
                   <td>
            <a href="<?php echo base_url("servicos/excluir") . "/" . $servico->id;?>" title="Excluir" class="btn btn-default button-delete">Apagar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>