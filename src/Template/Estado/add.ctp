<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Estado'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Cidade'), ['controller' => 'Cidade', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Cidade'), ['controller' => 'Cidade', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="estado form large-10 medium-9 columns">
	<?= $this->Form->create($estado); ?>
	<fieldset>
		<legend><?= __('Add Estado') ?></legend>
		<?php
			echo $this->Form->input('nome');
			echo $this->Form->input('UF');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
