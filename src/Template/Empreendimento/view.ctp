<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Empreendimento'), ['action' => 'edit', $empreendimento->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Empreendimento'), ['action' => 'delete', $empreendimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empreendimento->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Empreendimento'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Empreendimento'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Cidade'), ['controller' => 'Cidade', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Cidade'), ['controller' => 'Cidade', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Ramo'), ['controller' => 'Ramo', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Ramo'), ['controller' => 'Ramo', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Avaliacao'), ['controller' => 'Avaliacao', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Avaliacao'), ['controller' => 'Avaliacao', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="empreendimento view large-10 medium-9 columns">
	<h2><?= h($empreendimento->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Telefone') ?></h6>
			<p><?= h($empreendimento->telefone) ?></p>
			<h6 class="subheader"><?= __('Nome Fantasia') ?></h6>
			<p><?= h($empreendimento->nome_fantasia) ?></p>
			<h6 class="subheader"><?= __('Logradouro') ?></h6>
			<p><?= h($empreendimento->logradouro) ?></p>
			<h6 class="subheader"><?= __('Numero') ?></h6>
			<p><?= h($empreendimento->numero) ?></p>
			<h6 class="subheader"><?= __('Cidade') ?></h6>
			<p><?= $empreendimento->has('cidade') ? $this->Html->link($empreendimento->cidade->id, ['controller' => 'Cidade', 'action' => 'view', $empreendimento->cidade->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Ramo') ?></h6>
			<p><?= $empreendimento->has('ramo') ? $this->Html->link($empreendimento->ramo->id, ['controller' => 'Ramo', 'action' => 'view', $empreendimento->ramo->id]) : '' ?></p>
		</div>
		<div class="large-2 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($empreendimento->id) ?></p>
			<h6 class="subheader"><?= __('Cep') ?></h6>
			<p><?= $this->Number->format($empreendimento->cep) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Avaliacao') ?></h4>
	<?php if (!empty($empreendimento->avaliacao)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Estrelas') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Empreendimento Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($empreendimento->avaliacao as $avaliacao): ?>
		<tr>
			<td><?= h($avaliacao->id) ?></td>
			<td><?= h($avaliacao->estrelas) ?></td>
			<td><?= h($avaliacao->created) ?></td>
			<td><?= h($avaliacao->empreendimento_id) ?></td>

			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Avaliacao', 'action' => 'view', $avaliacao->id]) ?>

				<?= $this->Html->link(__('Edit'), ['controller' => 'Avaliacao', 'action' => 'edit', $avaliacao->id]) ?>

				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Avaliacao', 'action' => 'delete', $avaliacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $avaliacao->id)]) ?>

			</td>
		</tr>

		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
