<ul class="pager">
    <li class="previous"><?php echo $this->tag->linkTo(array('users/index', 'Go back')); ?></li>
    <?php if ($admin) { ?>
        <li class="next"> <?php echo $this->tag->linkTo(array('users/new', 'New user')); ?></li>
    <?php } ?>
</ul>

<div class="page-header">
    <h1>Search results</h1>
</div>
<?php echo $this->getContent(); ?>

<table class="table table-bordered table-striped">
    <tr>
        <th>Username</th>
        <th>Access Level</th>
        <?php if ($admin) { ?>
            <th>Management</th>
        <?php } ?>
    </tr>
    <?php foreach ($page->items as $user) { ?>
        <?php if ($user->username == $actual_user) { ?>
            <tr>
                <td><?php echo $user->username; ?> (You)</td>
                <td>
                    <?php if ($user->is_admin) { ?>
                        Head of the school
                    <?php } else { ?>
                        Teacher
                    <?php } ?>
                </td>
                <?php if ($admin) { ?>
                    <td>
                        <?php echo $this->tag->linkTo(array('userpanel/link', '<i class=\'glyphicon glyphicon-edit\'></i> Go to User Panel', 'class' => 'btn btn-default')); ?>

                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    <?php } ?>
    <?php foreach ($page->items as $user) { ?>
        <?php if ($user->username != $actual_user) { ?>
            <tr>
                <td><?php echo $user->username; ?></td>
                <td>
                    <?php if ($user->is_admin) { ?>
                        Head of the school
                    <?php } else { ?>
                        Teacher
                    <?php } ?>
                </td>
                <?php if ($admin) { ?>
                    <td>
                        <?php if ($user->username != $actual_user) { ?>
                            <?php echo $this->tag->linkTo(array('users/edit/' . $user->username, '<i class="glyphicon glyphicon-edit"></i> Edit', 'class' => 'btn btn-default')); ?>
                            <button class="btn btn-default" value="modal"
                                    onclick="confirmDeleteUser('<?php echo $user->username; ?>')"><i
                                        class="glyphicon glyphicon-trash"></i> Delete
                            </button>
                        <?php } ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    <?php } ?>
</table>

<nav>
    <ul class="pagination">
        <li><?php echo $this->tag->linkTo(array('users/search', 'First')); ?></li>
        <li><?php echo $this->tag->linkTo(array('users/search?page=' . $page->before, 'Previous')); ?></li>
        <li><?php echo $this->tag->linkTo(array('users/search?page=' . $page->next, 'Next')); ?></li>
        <li><?php echo $this->tag->linkTo(array('users/search?page=' . $page->last, 'Last')); ?></li>
    </ul>
</nav>
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
    Page <?php echo $page->current; ?> of <?php echo $page->total_pages; ?>
</p>
