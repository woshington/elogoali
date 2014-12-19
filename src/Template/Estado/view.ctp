<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Estado'), ['action' => 'edit', $estado->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Estado'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Estado'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Estado'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Cidade'), ['controller' => 'Cidade', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Cidade'), ['controller' => 'Cidade', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="estado view large-10 medium-9 columns">
	<h2><?= h($estado->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Nome') ?></h6>
			<p><?= h($estado->nome) ?></p>
			<h6 class="subheader"><?= __('UF') ?></h6>
			<p><?= h($estado->UF) ?></p>
		</div>
		<div class="large-2 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($estado->id) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Cidade') ?></h4>
	<?php if (!empty($estado->cidade)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Nome') ?></th>
			<th><?= __('Estado Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($estado->cidade as $cidade): ?>
		<tr>
			<td><?= h($cidade->id) ?></td>
			<td><?= h($cidade->nome) ?></td>
			<td><?= h($cidade->estado_id) ?></td>

			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Cidade', 'action' => 'view', $cidade->id]) ?>

				<?= $this->Html->link(__('Edit'), ['controller' => 'Cidade', 'action' => 'edit', $cidade->id]) ?>

				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Cidade', 'action' => 'delete', $cidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cidade->id)]) ?>

			</td>
		</tr>

		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
