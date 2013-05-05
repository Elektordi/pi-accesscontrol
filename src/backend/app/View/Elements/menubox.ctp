        <h3><?php echo __('Admin panel'); ?></h3>
        <ul>
                <li><?php echo $this->Html->link(__('Manage Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Manage Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Manage Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Manage Doors'), array('controller' => 'doors', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('View Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('View Web Logs'), array('controller' => 'web_logs', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Logout'), '/logout'); ?> </li>
        </ul>
