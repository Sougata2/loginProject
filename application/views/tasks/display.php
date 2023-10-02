<?php if ($this->session->flashdata('task_edited')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Great</strong> <?= $this->session->flashdata('task_edited') ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<h1>Tasks</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?= $task->task_name; ?>
            </td>
            <td>
                <?= $task->task_body; ?>
            </td>
            <td>
                <?= $task->date_created ?>
            </td>
            <td>
                <a href="<?= base_url() ?>index.php/tasks/edit/<?= $task->id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="<?= base_url() ?>index.php/tasks/delete/<?= $task->id ?>"><i class="fa-solid fa-trash" style="color: #ff2e2e;"></i></a>
            </td>
        </tr>
    </tbody>
</table>