<div class='row hidden-print'>
	<ol class="breadcrumb">
	  <li>Home</li>
	  <li class="active">Lista de Abastecimentos</li>
	</ol>
</div>

<div class='row'>
  <?=form_open('veiculos/imprimir_abastecimentos', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
    <div class="form-group">
      <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite o nome, marca, modelo ou ano" name="q">
    </div>
    <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
    <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('veiculos/criar')?>'">Adicionar Ve&iacute;culo</button>
  <?=form_close();?>
</div>

<div class="row">
  <h2>Lista de Abastecimentos</h2>
  <hr />
  <button type="button" class="btn btn-default button-action button-imprimir hidden-print" onclick="window.print();">Imprimir</button>
  <table class="table">
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
	       	<?php foreach($servico as $servico): ?>
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

        <?php endforeach; ?>
        <tr>
          <td colspan="5"></td>
          <td class="text-right">
            <label>Total de Ve&iacute;culos :</label> <?=sizeof($servico);?>
          </td>
        </tr>
      </tbody>
    </table>
 </div>