<!-- app/View/Users/signup.ctp -->
<div class="container">
    <div class="col-xs-6 col-xs-offset-3" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
    <h2>Join Foodbook today</h2>
    <div class="users form">
        <?php echo $this->Form->create('User'); ?>
        <div class="form-group">
            <?php echo $this->Form->input(
                'username',
                array('div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'Username',
                    'label' => 'Username*'));
            ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input(
                'password',
                array('div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'Password',
                    'label' => 'Password*'));
            ?>
        </div>

        <hr>

        <div class="form-group">
            <?php echo $this->Form->input(
                'name',
                array('div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'Your name'));
            ?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input(
                'location',
                array('div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'Your address'));
            ?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input(
                'email',
                array('div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'Email'));
            ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input(
                'phone',
                array('label' => 'Phone Number',
                    'div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'Phone Number'));
            ?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input(
                'description',
                array('div'=> false,
                    'class' => 'form-control',
                    'placeholder' => 'About yourself',
                    'type' => 'textarea')
            );
            ?>
        </div>
        <?php echo $this->Form->end(
            array(
                'label' => 'Create my account',
                'class' => 'btn btn-primary btn-block')
            );
        ?>
    </div>
    </div>
</div>

