<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __d('auth', 'Actions'); ?></li>
        <li>
            <?php
                echo $this->Html->link(__d('auth', 'Forgotten password'), [
                    'action' => 'forgot',
                ]);
            ?>
        </li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?php
        echo $this->Form->create($user, [
            'novalidate' => true,
        ]);
    ?>
        <fieldset>
            <legend><?php echo __d('auth', 'Login User'); ?></legend>
            <?php
                echo $this->Form->control('email');
                echo $this->Form->control('password', [
                    'type' => 'password',
                ]);
            ?>
        </fieldset>
        <?php echo $this->Form->button(__d('auth', 'Login')); ?>
    <?php echo $this->Form->end(); ?>
</div>