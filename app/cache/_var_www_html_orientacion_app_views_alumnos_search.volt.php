<ul class="pager">
    <li class="previous"><?php echo $this->tag->linkTo(array('alumnos/index', 'Volver')); ?></li>
    <?php if ($admin) { ?>
        <li class="next"> <?php echo $this->tag->linkTo(array('alumnos/new', 'Nuevo alumno')); ?></li>
    <?php } ?>
</ul>

<div class="page-header">
    <h1>Resultados de busqueda</h1>
</div>
<?php echo $this->getContent(); ?>

<table class="table table-bordered table-striped">
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <?php if ($admin) { ?>
            <th>Management</th>
        <?php } ?>
    </tr>
    <?php foreach ($page->items as $alumno) { ?>
            <tr>
                <td><?php echo $alumno->Nombre; ?> </td>
                <td>
<?php echo $alumno->apellidos; ?>
                </td>
                <?php if ($admin) { ?>
                    <td>
                        <?php echo $this->tag->linkTo(array('alumnos/edit/' . $alumno->NIE, '<i class=\'glyphicon glyphicon-edit\'></i> Modificar', 'class' => 'btn btn-default')); ?>

                    </td>
                <?php } ?>
            </tr>
    <?php } ?>
</table>

<nav>
    <ul class="pagination">
        <li><?php echo $this->tag->linkTo(array('alumnos/search', 'First')); ?></li>
        <li><?php echo $this->tag->linkTo(array('alumnos/search?page=' . $page->before, 'Previous')); ?></li>
        <li><?php echo $this->tag->linkTo(array('alumnos/search?page=' . $page->next, 'Next')); ?></li>
        <li><?php echo $this->tag->linkTo(array('alumnos/search?page=' . $page->last, 'Last')); ?></li>
    </ul>
</nav>
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
    Page <?php echo $page->current; ?> of <?php echo $page->total_pages; ?>
</p>
