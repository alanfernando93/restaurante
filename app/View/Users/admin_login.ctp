<div class="col-md-4 col-md-offset-4">
    <h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>
    <div class="account-wall">
        <?php echo $this->Html->image('../img/photo.jpg', array('class' => 'profile-img')); ?>
        <?php echo $this->Form->create('user', array('class' => 'form-signin')); ?>
        <?php
        echo $this->Form->input('username', array(
            'label' => false,
            'class' => 'form-control',
            'placeholder' => 'User Name'
                )
        );
        echo $this->Form->input('password', array(
            'label' => false,
            'class' => 'form-control',
            'type' => 'password',
            'placeholder' => 'Password'
                )
        );
        echo $this->Form->button('Sign in', array(
            'class' => 'btn btn-lg btn-primary btn-block',
            'type' => 'submit'
                )
        );
        ?>
        <?php echo $this->Form->end(); ?>
    </div>
    <?php echo $this->Html->link('Create an account', array('action' => 'signup'), array('class' => 'text-center new-account')); ?>
    <?php echo $this->Html->link('<< Volver a Salesianito', '/', array('class' => 'text-center new-account')); ?>
</div>