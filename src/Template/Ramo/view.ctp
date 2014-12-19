<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Ramo'), ['action' => 'edit', $ramo->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Ramo'), ['action' => 'delete', $ramo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ramo->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Ramo'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Ramo'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Empreendimento'), ['controller' => 'Empreendimento', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="ramo view large-10 medium-9 columns">
	<h2><?= h($ramo->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Descricao') ?></h6>
			<p><?= h($ramo->descricao) ?></p>
		</div>
		<div class="large-2 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($ramo->id) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Empreendimento') ?></h4>
	<?php if (!empty($ramo->empreendimento)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Telefone') ?></th>
			<th><?= __('Nome Fantasia') ?></th>
			<th><?= __('Logradouro') ?></th>
			<th><?= __('Numero') ?></th>
			<th><?= __('Cep') ?></th>
			<th><?= __('Cidade Id') ?></th>
			<th><?= __('Ramo Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($ramo->empreendimento as $empreendimento): ?>
		<tr>
			<td><?= h($empreendimento->id) ?></td>
			<td><?= h($empreendimento->telefone) ?></td>
			<td><?= h($empreendimento->nome_fantasia) ?></td>
			<td><?= h($empreendimento->logradouro) ?></td>
			<td><?= h($empreendimento->numero) ?></td>
			<td><?= h($empreendimento->cep) ?></td>
			<td><?= h($empreendimento->cidade_id) ?></td>
			<td><?= h($empreendimento->ramo_id) ?></td>

			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Empreendimento', 'action' => 'view', $empreendimento->id]) ?>

				<?= $this->Html->link(__('Edit'), ['controller' => 'Empreendimento', 'action' => 'edit', $empreendimento->id]) ?>

				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Empreendimento', 'action' => 'delete', $empreendimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empreendimento->id)]) ?>

			</td>
		</tr>

		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
