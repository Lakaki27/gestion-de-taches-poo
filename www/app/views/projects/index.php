<h1>Liste des projets</h1>
<a href="/create">Ajouter un projet</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Tâches</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $proj): ?>
            <tr>
                <td><?= $proj['id'] ?></td>
                <td><?= $proj['title'] ?></td>
                <td>
                    <a href="/project/<?= $proj['id'] ?>">Tâches</a>
                </td>
                <td>
                    <form method="POST" action="/delete">
                        <input type="hidden" name="id" value="<?= $proj['id'] ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>

</html>