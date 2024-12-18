<h1 class="text-4xl p-4 h-[8%] min-h-[60px] bg-slate-800 text-white font-bold flex justify-center items-center">
    <p>
        Liste des projets
    </p>
</h1>
<div class="flex justify-center items-center h-[92%] w-full flex-col">
    <a href="/create" class="bg-slate-600 duration-150 hover:bg-purple-400 text-white font-bold m-3 py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter un projet</a>
    <div>
        <table class="border-collapse border border-slate-500">
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
                        <td class="border border-slate-500"><?= $proj['id'] ?></td>
                        <td class="border border-slate-500"><?= $proj['title'] ?></td>
                        <td class="border border-slate-500">
                            <a href="/project/<?= $proj['id'] ?>" class="bg-slate-600 duration-150 hover:bg-purple-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tâches</a>
                        </td>
                        <td class="border border-slate-500">
                            <form method="POST" action="/delete">
                                <input type="hidden" name="id" value="<?= $proj['id'] ?>">
                                <button type="submit" class="bg-red-600 duration-150 hover:bg-purple-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>