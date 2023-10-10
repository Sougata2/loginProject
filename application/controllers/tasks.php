<?php

class Tasks extends CI_Controller
{
    public function display($task_id)
    {
        $data['task'] = $this->task_model->get_task($task_id);
        $data['project'] = $this->get_project_name($data['task']->project_id);
        $data['main_view'] = "tasks/display";
        $this->load->view('layouts/main', $data);
    }
    public function get_project_name($project_id)
    {
        $project = $this->projects_model->get_project($project_id);
        return $project;
    }

    public function create($project_id)
    {
        $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
        $this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');
        if (!$this->form_validation->run()) {
            $data['project_id'] = $project_id;
            $data['main_view'] = 'tasks/create_task';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(
                'project_id' => $project_id,
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body'),
                'due_date' => $this->input->post('due_date')
            );

            if ($insert_id = $this->task_model->create_task($data)) {
                $this->session->set_flashdata('task_created', 'Your Task [' . $data['task_name'] . '] has been created');
                redirect('projects/display/' . $project_id);
            }
        }
    }
    public function edit($task_id)
    {
        $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
        $this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');
        if (!$this->form_validation->run()) {
            $data['task'] = $this->task_model->get_task($task_id);
            $data['main_view'] = 'tasks/edit_task';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body'),
                'due_date' => $this->input->post('due_date')
            );

            if ($insert_id = $this->task_model->edit_task($task_id, $data)) {
                $this->session->set_flashdata('task_edited', 'Your Task [' . $data['task_name'] . '] has been edited');
                redirect('tasks/display/' . $insert_id);
            }
        }
    }

    public function delete($task_id)
    {
        $task = $this->task_model->get_task($task_id);
        $this->task_model->delete_task($task_id);
        $this->session->set_flashdata('task_deleted', 'Your task [' . $task->task_name . '] has been deleted');
        redirect('projects/display/' . $task->project_id);
    }

    public function mark_as_complete($task_id)
    {
        $task = $this->task_model->update_status($task_id, true);
        $this->session->set_flashdata('status_update', "Your Task [{$task->task_name}] is marked as Completed!");
        redirect("projects/display/{$task->project_id}");
    }

    public function mark_as_incomplete($task_id)
    {
        $task = $this->task_model->update_status($task_id, false);
        $this->session->set_flashdata('status_update', "Your Task [{$task->task_name}] is marked as Incompleted!");
        redirect("projects/display/{$task->project_id}");
    }
}
