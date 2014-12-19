<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Empreendimento'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Cidade'), ['controller' => 'Cidade', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Cidade'), ['controller' => 'Cidade', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Ramo'), ['controller' => 'Ramo', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Ramo'), ['controller' => 'Ramo', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Avaliacao'), ['controller' => 'Avaliacao', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Avaliacao'), ['controller' => 'Avaliacao', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="empreendimento index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('telefone') ?></th>
			<th><?= $this->Paginator->sort('nome_fantasia') ?></th>
			<th><?= $this->Paginator->sort('logradouro') ?></th>
			<th><?= $this->Paginator->sort('numero') ?></th>
			<th><?= $this->Paginator->sort('cep') ?></th>
			<th><?= $this->Paginator->sort('cidade_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($empreendimento as $empreendimento): ?>
		<tr>
			<td><?= $this->Number->format($empreendimento->id) ?></td>
			<td><?= h($empreendimento->telefone) ?></td>
			<td><?= h($empreendimento->nome_fantasia) ?></td>
			<td><?= h($empreendimento->logradouro) ?></td>
			<td><?= h($empreendimento->numero) ?></td>
			<td><?= $this->Number->format($empreendimento->cep) ?></td>
			<td>
				<?= $empreendimento->has('cidade') ? $this->Html->link($empreendimento->cidade->id, ['controller' => 'Cidade', 'action' => 'view', $empreendimento->cidade->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $empreendimento->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $empreendimento->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $empreendimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empreendimento->id)]) ?>
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
