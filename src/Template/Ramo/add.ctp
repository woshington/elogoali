<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Ramo'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="ramo form large-10 medium-9 columns">
	<?= $this->Form->create($ramo); ?>
	<fieldset>
		<legend><?= __('Add Ramo') ?></legend>
		<?php
			echo $this->Form->input('descricao');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
