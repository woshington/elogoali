<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Cidade'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Estado'), ['controller' => 'Estado', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estado', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="cidade index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('nome') ?></th>
			<th><?= $this->Paginator->sort('estado_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($cidade as $cidade): ?>
		<tr>
			<td><?= $this->Number->format($cidade->id) ?></td>
			<td><?= h($cidade->nome) ?></td>
			<td>
				<?= $cidade->has('estado') ? $this->Html->link($cidade->estado->id, ['controller' => 'Estado', 'action' => 'view', $cidade->estado->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $cidade->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $cidade->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cidade->id)]) ?>
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
