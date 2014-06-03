<!-- app/View/Users/signup.ctp -->
<div class="container">
    <div class="col-xs-6 col-xs-offset-3" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
    <h2>Sign in</h2>
    <div class="users form">
        <?php echo $this->Form->create('User'); ?>
        <div class="form-group">
            <?php echo $this->Form->input(
                'username',
                array('div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'Username',
                    'label' => 'Username'));
            ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input(
                'password',
                array('div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'Password',
                    'label' => 'Password'));
            ?>
        </div>

 
        <?php echo $this->Form->end(
            array(
                'label' => 'Login',
                'class' => 'btn btn-primary btn-block')
            );
        ?>
        Not a member yet? <?php echo $this->Html->link('Sign up',array('controller' => 'users', 'action' => 'signup', 'full_base' => true)); ?>
    </div>
    </div>
</div>

