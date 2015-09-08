<div class="users view">
<h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('username'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        
        
        <dt><?php echo __('Role'); ?></dt>
        <dd>
            <?php echo h($user['Group']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($user['User']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($user['User']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>