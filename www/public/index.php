<?php

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/models/Task.php';
require_once __DIR__ . '/../app/models/Project.php';
require_once __DIR__ . '/../app/controllers/TaskController.php';
require_once __DIR__ . '/../app/controllers/ProjectController.php';

$router = new Router();

$router->add('/', [new ProjectController, 'index']);

$router->add('/create', [new ProjectController, 'create']);

$router->add('/delete', function () {
    $id = $_POST['id'] ?? null;
    (new ProjectController)->delete($id);
});

$router->add('/project/[0-9]+', [new TaskController, 'index']);

$router->add('/project/[0-9]+/create', [new TaskController, 'create']);

$router->add('/project/[0-9]+/complete', function () {
    $id = $_POST['id'] ?? null;
    (new TaskController)->markAsCompleted($id);
});

$router->add('/project/[0-9]+/delete', function () {
    $id = $_POST['id'] ?? null;
    (new TaskController)->delete($id);
});

$router->dispatch();
