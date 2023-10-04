<?php
class Projects_model extends CI_Model
{
    public function get_projects()
    {
        $query = $this->db->get('projects');
        return $query->result();
    }

    public function get_project($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get("projects");
        return $query->row();
    }

    public function create_project($data)
    {
        $insert_query = $this->db->insert('projects', $data);
        return $insert_query;
    }

    public function edit_project($project_id, $data)
    {
        $this->db->where('id', $project_id);
        $this->db->update('projects', $data);
        return true;
    }

    public function get_projects_info($project_id)
    {
        $this->db->where('id', $project_id);
        $result = $this->db->get('projects');
        return $result->row();
    }

    public function delete_project($project_id)
    {
        $this->db->where('id', $project_id);
        $this->db->delete('projects');
    }

    public function get_all_projects_by_id($user_id)
    {
        $this->db->where('project_user_id', $user_id);
        $query = $this->db->get('projects');
        return $query->result();
    }

    public function get_project_tasks($project_id, $active = true)
    {
        $status = $active ? '0' : '1';
        $query = $this->db->query('select tasks.id, tasks.task_name, tasks.task_body, tasks.due_date, projects.project_name
                                   from tasks
                                   join projects
                                   on tasks.project_id = projects.id
                                   where projects.id = ' . $project_id . ' and status = ' . $status . '');

        if ($query->num_rows() < 1) {
            return false;
        }
        return $query->result();
    }

    public function delete_project_task($project_id){
        $this->db->where('project_id', $project_id);
        return $this->db->delete('tasks');
    }
}
