<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Combinazioni> $combinazioni
 */
?>
<div class="combinazioni index content">
    <?= $this->Html->link(__('New Combinazioni'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Combinazioni') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('classe_eta') ?></th>
                    <th><?= $this->Paginator->sort('comuni') ?></th>
                    <th><?= $this->Paginator->sort('anno') ?></th>
                    <th><?= $this->Paginator->sort('sesso') ?></th>
                    <th><?= $this->Paginator->sort('patologia') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($combinazioni as $combinazioni): ?>
                <tr>
                    <td><?= $this->Number->format($combinazioni->id) ?></td>
                    <td><?= $this->Number->format($combinazioni->classe_eta) ?></td>
                    <td><?= h($combinazioni->comuni) ?></td>
                    <td><?= $this->Number->format($combinazioni->anno) ?></td>
                    <td><?= h($combinazioni->sesso) ?></td>
                    <td><?= h($combinazioni->patologia) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $combinazioni->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $combinazioni->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $combinazioni->id], ['confirm' => __('Are you sure you want to delete # {0}?', $combinazioni->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
