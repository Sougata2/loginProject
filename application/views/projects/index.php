<?php if ($this->session->flashdata('project_updated')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Great</strong> <?= $this->session->flashdata('project_updated') ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($this->session->flashdata('project_not_updated')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Opps</strong> <?= $this->session->flashdata('project_not_updated') ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($this->session->flashdata('project_deleted')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning</strong> <?= $this->session->flashdata('project_deleted') ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($this->session->flashdata('project_created')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Warning</strong> <?= $this->session->flashdata('project_created') ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<h1>Welcome to projects</h1>
<a href="<?= base_url() ?>index.php/projects/create" class="btn btn-primary" style="float: right;">Create Project</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Body</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $project) : ?>
            <tr>
                <td>
                    <a href="<?= base_url() ?>index.php/projects/display/<?= $project->id ?>">
                        <?= $project->project_name; ?>
                    </a>
                </td>
                <td>
                    <?= $project->project_body; ?>
                </td>
                <td>
                    <a href="<?= base_url() ?>index.php/projects/delete/<?= $project->id ?>" ><i class="fa-solid fa-trash" style="color: #ff2e2e;"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>