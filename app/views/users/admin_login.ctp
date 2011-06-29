    <?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User', array('action' => 'login', 'class' => 'form'));
    echo $this->Form->inputs(array('legend' => __('ورود', true), 'email', 'password'));
    echo $this->Form->end('ورود');
    ?>
