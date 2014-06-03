<div class="container">
    <div class="col-xs-6 col-xs-offset-3" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
        <div class="recipes index">
            <h2><?php echo __('Recipes'); ?></h2>
            <hr>
            <?php foreach ($recipes as $recipe): ?>
                <?php if ($myId == h($recipe['Recipe']['author'])): ?>
                    <div class="row">
                        <div class="col-xs-6">

                            <?php  echo $this->Html->link($recipe['Recipe']['name'], array(
                                    'action' => 'view',
                                    $recipe['Recipe']['id'])
                            );
                            ?>
                        </div>
                        <div class="col-xs-3">
                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recipe['Recipe']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recipe['Recipe']['id']), null, __('Are you sure you want to delete %s?', $recipe['Recipe']['name'])); ?>
                        </div>
                        <div class="col-xs-3"><?php echo h($recipe['Recipe']['date']); ?></div>
                    </div>
                    <hr>
                <?php endif; endforeach; ?>
        </div>
        <br>

        <div class="actions">
            <?php echo $this->Html->link(__('Add a new recipe'), array('action' => 'add'), array('class' => 'btn btn-primary btn-block')); ?>
        </div>
    </div>
</div>
