<h1>Ajouter une tâche au projet <?= $project['title'] ?></h1>
<form method="POST">
    <label for="title">Titre :</label>
    <input type="text" name="title" required>
    <button type="submit">Ajouter</button>
</form>