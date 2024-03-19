<?php $this->layout('layout', ['title' => 'Login - KaBuM!']) ?>

<main class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://www.kabum.com.br/logo.svg" alt="KaBuM!">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white">Faça
      login em sua conta
    </h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Email</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required
            class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus-orange-500">
        </div>
        <?php if ($errors['email'] ?? false): ?>
          <p class="text-sm text-red-500">
            <?= $errors['email'] ?>
          </p>
        <?php endif; ?>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Senha</label>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required
            class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus-orange-500">
        </div>
        <?php if ($errors['password'] ?? false): ?>
          <p class="text-sm text-red-500">
            <?= $errors['password'] ?>
          </p>
        <?php endif; ?>
      </div>

      <?php if ($errors['form'] ?? false): ?>
        <p class="text-sm text-red-500">
          <?= $errors['form'] ?>
        </p>
      <?php endif; ?>

      <div>
        <button type="submit"
          class="flex w-full justify-center rounded bg-orange-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus-visible:outline-orange-500 transition-colors">Entrar</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500 dark:text-gray-400">
      Ainda não tem uma conta?
      <a href="/registrar"
        class="font-semibold leading-6 text-orange-600 hover:text-orange-500 dark:text-orange-400 dark:hover:text-orange-300">Crie
        sua conta aqui</a>
    </p>
  </div>
</main>