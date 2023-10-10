<h2>Login form</h2>
<?php $attributes = ['id' => 'register_form', 'class' => 'form_horizontal'] ?>
<!-- Show Errors -->
<?= validation_errors("<div class='alert alert-danger alert-dismissible fade show' role='alert'>", "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>") ?>
<!-- Show Form -->
<?= form_open('users/register', $attributes); ?>

<div class="mb-3">
    <?= form_label("First Name", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'first_name',
        'placeholder' => 'Enter First Name',
        'value' => set_value('first_name')
    ] ?>
    <?= form_input($data) ?>
</div>

<div class="mb-3">
    <?= form_label("Last Name", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'last_name',
        'placeholder' => 'Enter Last Name',
        'value' => set_value('last_name')
    ] ?>
    <?= form_input($data) ?>
</div>

<div class="mb-3">
    <?= form_label("Email", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'email',
        'placeholder' => 'Enter Email',
        'value' => set_value('email')
    ] ?>
    <?= form_input($data) ?>
</div>

<div class="mb-3">
    <?= form_label("User name", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'username',
        'placeholder' => 'Enter Username',
        'value' => set_value('username')
    ] ?>
    <?= form_input($data) ?>
</div>
<div class="mb-3">
    <?= form_label("Password", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'password',
        'placeholder' => 'Enter Password'
    ] ?>
    <?= form_password($data) ?>
</div>
<div class="mb-3">
    <?= form_label("Confirm Password", '', ['class' => 'form-label']) ?>
    <?php $data = [
        'class' => 'form-control',
        'name' => 'confirm_password',
        'placeholder' => 'Confirm Password'
    ] ?>
    <?= form_password($data) ?>
</div>
<div class="mb-3">
    <?php $data = [
        'class' => 'btn btn-primary',
        'name' => 'submit',
        'value' => 'Sign up'
    ] ?>
    <?= form_submit($data) ?>
</div>
<?php echo form_close(); ?>