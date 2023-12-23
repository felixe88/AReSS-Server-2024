<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Combinazioni $combinazioni
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Combinazioni'), ['action' => 'edit', $combinazioni->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Combinazioni'), ['action' => 'delete', $combinazioni->id], ['confirm' => __('Are you sure you want to delete # {0}?', $combinazioni->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Combinazioni'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Combinazioni'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="combinazioni view content">
            <h3><?= h($combinazioni->comuni) ?></h3>
            <table>
                <tr>
                    <th><?= __('Comuni') ?></th>
                    <td><?= h($combinazioni->comuni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sesso') ?></th>
                    <td><?= h($combinazioni->sesso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Patologia') ?></th>
                    <td><?= h($combinazioni->patologia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($combinazioni->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Classe Eta') ?></th>
                    <td><?= $this->Number->format($combinazioni->classe_eta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Anno') ?></th>
                    <td><?= $this->Number->format($combinazioni->anno) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
