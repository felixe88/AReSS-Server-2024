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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $combinazioni->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $combinazioni->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Combinazioni'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="combinazioni form content">
            <?= $this->Form->create($combinazioni) ?>
            <fieldset>
                <legend><?= __('Edit Combinazioni') ?></legend>
                <?php
                    echo $this->Form->control('classe_eta');
                    echo $this->Form->control('comuni');
                    echo $this->Form->control('anno');
                    echo $this->Form->control('sesso');
                    echo $this->Form->control('patologia');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
