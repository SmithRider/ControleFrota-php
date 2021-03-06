<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Abastecimentos</li>
	</ol>
</div>

<div class='row'>
	<?=form_open('abastecimentos/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">
      <input type="text" class="form-control" id="data_ini" name="data_ini" placeholder="Data Inicial">
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="q" name="q" placeholder="Ve&iacute;culo">
    </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
	  <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('abastecimentos/criar')?>'">Adicionar</button>
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
          <th>Combust&iacute;vel</th>
          <th class="text-right">Quantidade</th>
          <th class="text-right">Preco Unitario</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($abastecimentos as $abastecimento): ?>
        <tr>
          <td><?php echo $abastecimento->id; ?></td>
          <td>
          	<?php echo $abastecimento->data ;?>
          </td>
          <td>
              <?php echo $abastecimento->Veiculo()->marca; ?>
              <?php echo $abastecimento->Veiculo()->modelo; ?>
              (<?php echo $abastecimento->Veiculo()->ano; ?>)
              <?php echo $abastecimento->Veiculo()->placa; ?>
          </td>
          <td class="text-right">
              <?php echo $abastecimento->combustivel; ?>
          </td>
          <td class="text-right">
            <?php echo $abastecimento->quantidade; ?>&nbsp;
            <?php echo $abastecimento->unidade; ?>
          </td>
          <td class="text-right">
            R$ <?php echo number_format($abastecimento->preco_unitario, 2, ".", "."); ?>
          </td>
          <td class="text-right">
            R$ <?php echo number_format($abastecimento->total, 2, ",", "."); ?>
          </td>

          <td>
            <a href="<?php echo base_url("abastecimentos/excluir") . "/" . $abastecimento->id;?>" title="Excluir" class="btn btn-default button-delete">Apagar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>