<?php
class ProjectController
{
    public function index()
    {
        $projects = Project::all();
        include __DIR__ . '/../views/include/header.php';
        include __DIR__ . '/../views/projects/index.php';
        include __DIR__ . '/../views/include/footer.php';
    }
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Project::create($_POST['title']);
            header('Location: /');
            exit;
        }
        include __DIR__ . '/../views/include/header.php';
        include __DIR__ . '/../views/projects/create.php';
        include __DIR__ . '/../views/include/footer.php';
    }

    public function delete($id)
    {
        Project::delete($id);
        header('Location: /');
        exit;
    }
}
