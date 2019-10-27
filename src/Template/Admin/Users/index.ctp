<div class="container">
    <div class="page-header">
        <h1 class="page-title">
            <?php echo __d('auth', 'Users'); ?>
        </h1>
    </div>
    <div class="card">
        <div class="card-header">
            <?php echo __d('admin', 'List'); ?>
            <div class="card-options">
                <?php echo $this->element('pagination'); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-outline table-vcenter card-table">
                <thead>
                    <tr>
                        <th class="text-center w-1"><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
                        <th><?php echo $this->Paginator->sort('email', __d('auth', 'Address e-mail')); ?></th>
                        <th><?php echo __d('auth', 'Group'); ?></th>
                        <th class="text-center w-1"><?php echo $this->Paginator->sort('status', __d('auth', 'Status')); ?></th>
                        <th class="text-center"><?php echo $this->Paginator->sort('modified', __d('auth', 'Last modified')); ?></th>
                        <th class="text-center w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="text-center w-1">
                                <?php echo $user->id; ?>
                            </td>
                            <td>
                                <div>
                                    <?php echo $user->email; ?>
                                </div>
                                <div class="text-muted small">
                                    <?php echo __d('auth', 'Created at'); ?> <?php echo $user->created; ?>
                                </div>
                            </td>
                            <td>
                                <?php
                                    if (!empty($user_groups = $user->user_groups)) {
                                        echo implode(', ', array_map(function ($user_group) {
                                            return $user_group->name;
                                        }, $user_groups));
                                    }
                                ?>
                            </td>
                            <td class="text-center w-2">
                                <?php echo $user->status; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $user->modified; ?>
                            </td>
                            <td class="text-center w-1">
                                <div class="dropdown">
                                    <div data-toggle="dropdown" class="icon">
                                        <i class="fe fe-more-vertical"></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                        <?php
                                            echo $this->Icon->link('edit-2 dropdown-icon', __d('auth', 'Edit'), [
                                                'controller' => 'Users',
                                                'action' => 'edit',
                                                $user->id,
                                            ], [
                                                'class' => 'dropdown-item',
                                            ]);

                                            if ($this->Identity->get('id') != $user->id) {
                                                echo $this->Icon->postLink('trash-2 dropdown-icon', __d('auth', 'Delete'), [
                                                    'controller' => 'Users',
                                                    'action' => 'delete',
                                                    $user->id,
                                                ], [
                                                    'class' => 'dropdown-item',
                                                    'confirm' => __d('auth', 'Are you sure you want to do this?'),
                                                ]);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="text-right">
                <?php echo $this->element('pagination'); ?>
            </div>
        </div>
    </div>
</div>
