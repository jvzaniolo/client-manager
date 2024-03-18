<?php $this->layout('layout', ['title' => 'Página não encontrada - KaBuM!']) ?>

<header class="container mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-4">
  <div class="flex justify-end">
    <?php if ($_SESSION['user_id'] ?? false): ?>
      <a href="/logout" class="text-sm font-semibold px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-white/10">
        Sair
      </a>
    <?php else: ?>
      <a href="/login" class="text-sm font-semibold px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-white/10">
        Entrar
      </a>
    <?php endif; ?>
  </div>
</header>

<main class="grid min-h-full place-items-center px-6 py-24 sm:py-32 lg:px-8">
  <div class="text-center">
    <p class="text-base font-semibold text-orange-600 dark:text-orange-500">404</p>
    <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl dark:text-gray-100">Página não
      encontrada</h1>
    <p class="mt-6 text-base leading-7 text-gray-600 dark:text-gray-400">Desculpe, não conseguimos encontrar o que você
      está procurando.</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <a href="/"
        class="rounded bg-orange-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus-visible:outline-orange-500">Voltar
        para a página inicial</a>
    </div>
  </div>
</main>