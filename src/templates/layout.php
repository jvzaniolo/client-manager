<!DOCTYPE html>
<html lang="pt-br">

<head class="min-h-full">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://static.kabum.com.br/conteudo/favicon/favicon.ico">
    <title>
        <?= $this->e($title) ?>
    </title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <style>
        :root {
            color-scheme: light dark;
        }
    </style>
</head>

<body class="min-h-full dark:bg-gray-950">
    <?= $this->section('content') ?>
</body>

</html>