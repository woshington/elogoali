<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Cidade'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Estado'), ['controller' => 'Estado', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estado', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="cidade form large-10 medium-9 columns">
	<?= $this->Form->create($cidade); ?>
	<fieldset>
		<legend><?= __('Add Cidade') ?></legend>
		<?php
			echo $this->Form->input('nome');
			echo $this->Form->input('estado_id', ['options' => $estado]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
