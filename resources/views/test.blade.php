<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagramme de Gantt</title>
    <!-- Intégration de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Styles supplémentaires pour le diagramme de Gantt */
        .task-bar {
            position: relative;
            height: 30px;
            margin-bottom: 10px;
        }
        .task-name {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding-left: 10px;
        }
    </style>
</head>
<body class="p-4">

    <!-- Conteneur pour le diagramme de Gantt -->
    <div class="max-w-2xl mx-auto">

        <!-- Tâche 1 -->
        <div class="task-bar bg-blue-400" style="width: 60%;">
            <div class="task-name text-white">Tâche 1</div>
        </div>

        <!-- Tâche 2 -->
        <div class="task-bar bg-green-400" style="width: 40%;">
            <div class="task-name text-white">Tâche 2</div>
        </div>

        <!-- Tâche 3 -->
        <div class="task-bar bg-yellow-400" style="width: 80%;">
            <div class="task-name text-gray-800">Tâche 3</div>
        </div>

        <!-- Tâche 4 -->
        <div class="task-bar bg-purple-400" style="width: 30%;">
            <div class="task-name text-white">Tâche 4</div>
        </div>

    </div>

</body>
</html>
