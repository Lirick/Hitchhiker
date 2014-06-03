

<div class="container">
    <div class="col-xs-6 col-xs-offset-3" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
        <div class="recipes index">
            <h2><?php echo __('Recipes'); ?></h2>
            <hr>
            <?php
            foreach($found as $name => $id)
            {
                echo $this->Html->link($name,array('controller' => 'recipes', 'action' => 'view/' . $id , 'full_base' => true)) . ' <br>';
            }
            ?>
        </div>
    </div>
</div>