<div class="col-xs-3">
    <h1><?= $project_data->project_name ?></h1>
    <h3>Description</h3>
    <p>
        <?= $project_data->project_body ?>
    </p>
</div>

<h3>Tasks</h3>
<?php if ($completed_tasks) : ?>
    <?php foreach ($completed_tasks as $task) : ?>
        <h5><?= $task->task_name ?></h5>
        <p><?= $task->task_body ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<div class="col-xs-3">
    <ul class="list-group">
        <h4>Project Actions</h4>
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/tasks/create/<?= $project_data->id ?>">Create Task</a></li>
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/projects/edit/<?= $project_data->id ?>">Edit Project</a></li>
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/projects/delete/<?= $project_data->id ?>">Delete Project</a></li>
    </ul>
</div>