<?php class TaskController
{
    public function getProjectId()
    {
        return explode('/', trim($_SERVER['REQUEST_URI']))[2];
    }

    public function index()
    {
        $id = $this->getProjectId();
        $tasks = Task::all($id);
        $project = Project::getFromId($id)[0];  
        include __DIR__ . '/../views/include/header.php';
        include __DIR__ . '/../views/tasks/index.php';
        include __DIR__ . '/../views/include/footer.php';
    }

    public function create()
    {
        $project = Project::getFromId($this->getProjectId())[0];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Task::create($_POST['title'], $project['id']);
            header("Location: /project/{$project['id']}");
            exit;
        }
        include __DIR__ . '/../views/include/header.php';
        include __DIR__ . '/../views/tasks/create.php';
        include __DIR__ . '/../views/include/footer.php';
    }

    public function markAsCompleted($id)
    {
        Task::markAsCompleted($id);
        header("Location: /project/{$this->getProjectId()}");
        exit;
    }

    public function delete($id)
    {
        Task::delete($id);
        header("Location: /project/{$this->getProjectId()}");
        exit;
    }
}
