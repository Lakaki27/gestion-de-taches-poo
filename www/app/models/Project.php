<?php
class Project
{
    public static function all()
    {
        $db = Database::getInstance()->getPdo();
        $stmt = $db->query("SELECT * FROM projects ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getFromId($id)
    {
        $db = Database::getInstance()->getPdo();
        $sql = "SELECT * FROM projects WHERE id = :id ORDER BY created_at DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id" => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($title)
    {
        $db = Database::getInstance()->getPdo();
        $sql = "INSERT INTO projects (title) VALUES (:title)";
        $stmt = $db->prepare($sql);
        $stmt->execute([":title" => $title]);
    }

    public static function delete($id)
    {
        $db = Database::getInstance()->getPdo();
        $sql = "DELETE projects.*, tasks.* FROM projects LEFT JOIN tasks  ON tasks.id_project = projects.id WHERE projects.id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id" => $id]);
    }
}
