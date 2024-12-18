<h1 class="text-4xl p-4 h-[8%] min-h-[60px] bg-slate-800 text-white font-bold flex justify-between items-center">
    <a href="/" class="hover:scale-125 duration-200"><i class="fa-solid fa-arrow-left"></i></a>
    <p>
        Liste des tâches pour le projet <?= $project['title'] ?>
    </p>
    <p></p>
</h1>
<div class="flex justify-center items-center h-[92%] w-full flex-col">
    <a href="/project/<?= $project['id'] ?>/create" class="bg-slate-600 duration-150 hover:bg-purple-400 text-white font-bold m-3 py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter une tâche au projet</a>
    <div>
        <table class="border-collapse border border-slate-500">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td class="border border-slate-500"><?= $task['id'] ?></td>
                        <td class="border border-slate-500"><?= $task['title'] ?></td>
                        <td class="border border-slate-500"><?= $task['is_completed'] ? 'Terminée' : 'En cours' ?></td>
                        <td class="border border-slate-500 flex flex-row justify-between items-center gap-3">
                            <?php if (!$task['is_completed']): ?>
                                <form method="POST" action="/project/<?= $project['id'] ?>/complete">
                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                    <button type="submit" class="bg-lime-600 duration-150 hover:bg-purple-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><i class="fa-solid fa-check"></i></button>
                                </form>
                            <?php endif; ?>
                            <form method="POST" action="/project/<?= $project['id'] ?>/delete">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <button type="submit" class="bg-red-600 duration-150 hover:bg-purple-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>