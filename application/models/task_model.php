<?php

class Task_model extends CI_Model
{
    public function get_task($task_id)
    {
        $this->db->where('id', $task_id);
        $query = $this->db->get('tasks');
        return $query->row();
    }

    public function create_task($data)
    {
        $this->db->insert('tasks', $data);
        return $this->db->insert_id();
    }

    public function edit_task($task_id, $data)
    {
        $this->db->where('id', $task_id);
        $this->db->update('tasks', $data);
        return $task_id;
    }

    public function delete_task($task_id)
    {
        $this->db->where('id', $task_id);
        $this->db->delete('tasks');
        return true;
    }

    public function update_status($task_id, $flag)
    {
        $this->db->set('status', $flag ? 1 : 0, FALSE);
        $this->db->where('id', $task_id);
        $this->db->update('tasks',);

        return $this->get_task($task_id);
    }
}
