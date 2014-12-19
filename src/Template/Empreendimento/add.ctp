<script type="text/javascript">
	$(document).ready(function(){
		$('#telefone').inputmask('(99) 9999[9]-9999');
		$('#cep').inputmask('99999-999');
	});
</script>
<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Empreendimento'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Cidade'), ['controller' => 'Cidade', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Cidade'), ['controller' => 'Cidade', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Ramo'), ['controller' => 'Ramo', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Ramo'), ['controller' => 'Ramo', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Avaliacao'), ['controller' => 'Avaliacao', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Avaliacao'), ['controller' => 'Avaliacao', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="empreendimento form large-10 medium-9 columns">
	<?= $this->Form->create($empreendimento); ?>
	<fieldset>
		<legend><?= __('Add Empreendimento') ?></legend>
		<?php
			echo $this->Form->input('telefone', array('id'=>'telefone', 'maxlength'=>20));
			echo $this->Form->input('nome_fantasia');
			echo $this->Form->input('logradouro');
			echo $this->Form->input('numero');
			echo $this->Form->input('cep', array('id'=>'cep', 'type'=>'text'));
			echo $this->Form->input('cidade_id', ['options' => $cidade]);
			echo $this->Form->input('ramo_id', ['options' => $ramo]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
