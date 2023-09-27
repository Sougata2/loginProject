<!-- Check if not logged in -->
<?php if (!$this->session->userdata('logged_in')) : ?>
    <h2>Login form</h2>
    <?php $attributes = ['id' => 'login_form', 'class' => 'form_horizontal'] ?>
    <!-- Show Errors -->
    <?php if ($this->session->flashdata('errors')) : ?>
        <?= $this->session->flashdata('errors'); ?>
    <?php endif; ?>
    <!-- Show Form -->
    <?= form_open('users/login', $attributes); ?>
    <div class="mb-3">
        <?= form_label("User name", '', ['class' => 'form-label']) ?>
        <?php $data = [
            'class' => 'form-control',
            'name' => 'username',
            'placeholder' => 'Enter Username'
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
            'value' => 'Login'
        ] ?>
        <?= form_submit($data) ?>
    </div>
    <?php echo form_close(); ?>
    <!-- if logged in -->
<?php else : ?>
    <p>
        You are logged in as <?= ucfirst($this->session->username) ?>
    </p>
    <?= form_open('users/logout') ?>
    <?php
    $data = ['class' => 'btn btn-primary mt-2', 'name' => 'submit', 'value' => 'Logout'];

    ?>
    <?= form_submit($data) ?>
    <?= form_close(); ?>
<?php endif; ?>