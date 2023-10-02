<h2>Edit Form</h2>
<?php $attributes = ['id' => 'edit_form', 'class' => 'form_horizontal'] ?>
<!-- Show Errors -->
<?= validation_errors("<div class='alert alert-danger alert-dismissible fade show' role='alert'>", "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>") ?>
<!-- Show Form -->
<?= form_open("projects/edit/" . $project_data->id, $attributes); ?>

<div class="mb-3">
    <?= form_label("Project Name", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'project_name',
        'placeholder' => 'Enter Project Name',
        'value' => $project_data->project_name
    ] ?>
    <?= form_input($data) ?>
</div>

<div class="mb-3">
    <?= form_label("Project Description", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'project_body',
        'value' => $project_data->project_body
    ] ?>
    <?= form_textarea($data) ?>
</div>

<div class="mb-3">
    <?php $data = [
        'class' => 'btn btn-primary',
        'name' => 'submit',
        'value' => 'Update'
    ] ?>
    <?= form_submit($data) ?>
</div>
<?php echo form_close(); ?>