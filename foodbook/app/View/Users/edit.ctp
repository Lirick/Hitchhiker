<!-- app/View/Users/edit.ctp -->
<div class="container">
    <div class="col-xs-3 col-xs-offset-1">
        <div class="col-xs-12" style="border: 1px solid #e2e2e2; padding-bottom: 15px;padding-top:10px;">
        <?php echo $this->Html->image($picture, array('class' => 'img-responsive img-thumbnail', 'alt' => 'Profile Picture', 'fullBase' => true)); ?>
        <?php echo $this->Form->create('User', array('type' => 'file')); ?>
        <?php
        echo $this->Form->input('Choose file',array('label' => false, 'type' => 'file', 'style' => "margin: 10px 0;"));
        echo $this->Form->end(
            array(
                'label' => 'Upload',
                'class' => 'btn btn-primary btn-block')
        );
        ?>
        </div>
    </div>
    <div class="col-xs-6" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
        <h2>Edit my profile</h2>
        <div class="users form">
            <?php echo $this->Form->create('User'); ?>
            <div class="form-group">
                <?php echo $this->form->input(
                    'email',
                    array('div'=> false,
                        'class' => 'form-control',
                        'placeholder' => 'Email',
                        'default' => $email));
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->form->input(
                    'phone',
                    array('label' => 'Phone Number',
                        'div'=> false,
                        'class' => 'form-control',
                        'placeholder' => 'Phone Number',
                        'default' => $phone));
                ?>
            </div>
            <?php echo $this->Form->end(
                array(
                    'label' => 'Save',
                    'class' => 'btn btn-primary btn-block')
            );
            ?>
        </div>
    </div>
</div>

