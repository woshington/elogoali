<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Ramo'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="ramo index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('descricao') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($ramo as $ramo): ?>
		<tr>
			<td><?= $this->Number->format($ramo->id) ?></td>
			<td><?= h($ramo->descricao) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $ramo->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $ramo->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ramo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ramo->id)]) ?>
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
