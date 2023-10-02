<h2>Create task</h2>
<?php $attributes = ['id' => 'create_task', 'class' => 'form_horizontal'] ?>
<!-- Show Errors -->
<?= validation_errors("<div class='alert alert-danger alert-dismissible fade show' role='alert'>", "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>") ?>
<!-- Show Form -->
<?= form_open('tasks/create/' .$this->uri->segment(3), $attributes); ?>

<div class="mb-3">
    <?= form_label("Task Name", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'task_name',
        'placeholder' => 'Enter Task Name'
    ] ?>
    <?= form_input($data) ?>
</div>

<div class="mb-3">
    <?= form_label("Task Description", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'task_body',
    ] ?>
    <?= form_textarea($data) ?>
</div>
<div class="mb-3">
    <?= form_label("Due Date", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'due_date',
        'type' => 'date'
    ] ?>
    <?= form_input($data) ?>
</div>

<div class="mb-3">
    <?php $data = [
        'class' => 'btn btn-primary',
        'name' => 'submit',
        'value' => 'Create'
    ] ?>
    <?= form_submit($data) ?>
</div>
<?php echo form_close(); ?>