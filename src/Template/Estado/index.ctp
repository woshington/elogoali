<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Estado'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Cidade'), ['controller' => 'Cidade', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Cidade'), ['controller' => 'Cidade', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="estado index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('nome') ?></th>
			<th><?= $this->Paginator->sort('UF') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($estado as $estado): ?>
		<tr>
			<td><?= $this->Number->format($estado->id) ?></td>
			<td><?= h($estado->nome) ?></td>
			<td><?= h($estado->UF) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $estado->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $estado->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]) ?>
			</td>
		</tr>

	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->prev('< ' . __('previous')); ?>
			<?= $this->Paginator->numbers(); ?>
			<?=	$this->Paginator->next(__('next') . ' >'); ?>
		</ul>
		<p><?= $this->Paginator->counter(); ?></p>
	</div>
</div>
