<?php class Task
{
    public static function all($id)
    {
        $db = Database::getInstance()->getPdo();
        $sql = "SELECT tasks.*, projects.title as project_title, projects.id as id_project FROM tasks JOIN projects ON projects.id = :id WHERE id_project = :id ORDER BY tasks.created_at DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($title, $projectId)
    {
        $db = Database::getInstance()->getPdo();
        $sql = "INSERT INTO tasks (title, id_project) VALUES (:title, :id_project)";
        $stmt = $db->prepare($sql);
        $stmt->execute([":title" => $title, ":id_project" => $projectId]);
    }

    public static function markAsCompleted($id)
    {
        $db = Database::getInstance()->getPdo();
        $sql = "UPDATE tasks SET is_completed = 1 WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id" => $id]);
    }

    public static function delete($id)
    {
        $db = Database::getInstance()->getPdo();
        $sql = "DELETE FROM tasks WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id" => $id]);
    }
}
