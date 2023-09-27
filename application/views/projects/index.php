<h1>Welcome to projects</h1>
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
                    <a href="<?= base_url() ?>index.php/projects/display">
                        <?= $project->project_name; ?>
                    </a>
                </td>
                <td>
                    <?= $project->project_body; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>