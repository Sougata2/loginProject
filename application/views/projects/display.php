<?php if ($this->session->flashdata('task_deleted')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> <?= $this->session->flashdata('task_deleted') ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('status_update')) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('status_update') ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div class="col-xs-3">
    <h1><?= $project_data->project_name ?></h1>
    <h3>Description</h3>
    <p>
        <?= $project_data->project_body ?>
    </p>
</div>

<?php if ($not_completed_tasks) : ?>
    <h3>Active Tasks</h3>
    <ul>
        <?php foreach ($not_completed_tasks as $task) : ?>
            <p>
                <a href="<?= base_url() ?>index.php/tasks/display/<?= $task->id ?>"><?= $task->task_name ?></a>
            </p>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($completed_tasks) : ?>
    <h3>Completed Tasks</h3>
    <ul>
        <?php foreach ($completed_tasks as $task) : ?>
            <p>
                <a href="<?= base_url() ?>index.php/tasks/display/<?= $task->id ?>"><?= $task->task_name ?></a>
            </p>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<div class="col-xs-3 my-4">
    <ul class="list-group">
        <h4>Project Actions</h4>
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/tasks/create/<?= $project_data->id ?>">Create Task</a></li>
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/projects/edit/<?= $project_data->id ?>">Edit Project</a></li>
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/projects/delete/<?= $project_data->id ?>">Delete Project</a></li>
    </ul>
</div>