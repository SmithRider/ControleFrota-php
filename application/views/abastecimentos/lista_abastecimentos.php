<div class='row hidden-print'>
	<ol class="breadcrumb">
	  <li>Home</li>
	  <li class="active">Lista de Abastecimentos</li>
	</ol>
</div>

<div class='row'>
  <?=form_open('abastecimentos/imprimir_abastecimentos', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
    <div class="form-group">
      <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="Digite para Busca" name="q">
    </div>
    <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
    <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('abastecimentos/criar')?>'">Adicionar Abastecimento</button>
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
	          <th>Combustivel</th>
	           <th>Quantidade</th>
	           <th>Unidade</th>
	          <th>Preco Unitario</th>
	          <th>Total</th>

	          <th></th>
        </tr>
      </thead>
     <tbody>
	       	<?php foreach($abastecimento as $abastecimento): ?>
	         <tr>
	           <td><?php echo $abastecimento->id; ?></td>
	           <td>
	           	<?php echo $abastecimento->data ;?>
	          	 </td>
	              <td>
	              <?php echo $abastecimento->Veiculo()->modelo; ?>
	          	 </td>
	          	 <td class="text-right">
	               <?php echo $abastecimento->combustivel; ?>
	          	 </td>
	          	 <td class="text-right">
	             <?php echo $abastecimento->quantidade; ?>&nbsp;
	          	 </td>
	          	 <td>
	 		              <?php echo $abastecimento->unidade; ?>&nbsp;
	           	</td>
	           	<td>
				 R$ <?php echo number_format($abastecimento->preco_unitario, 2, ",", "."); ?>	           	</td>
	  			<td class="text-right">
	             R$ <?php echo number_format($abastecimento->total, 2, ",", "."); ?>
          	</td>

        <?php endforeach; ?>
        <tr>
          <td colspan="5"></td>
          <td class="text-right">
            <label>Total de Abastecimentos :</label> <?=sizeof($abastecimento);?>
          </td>
        </tr>
      </tbody>
    </table>
 </div>