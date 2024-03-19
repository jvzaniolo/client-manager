<?php $this->layout('layout', ['title' => 'KaBuM!']) ?>

<header class="container mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-4">
  <div class="flex justify-end">
    <a href="/logout" class="text-sm font-semibold px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-white/10">
      Sair
    </a>
  </div>
</header>

<main class="container mx-auto px-4 sm:px-8 md:px-8 py-12">
  <form method="post">
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12 dark:border-white/15">
        <h1 class="block text-2xl font-semibold leading-7 text-gray-900 mb-8 dark:text-white">Adicionar cliente
        </h1>

        <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Informações pessoais</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">
          Implementamos medidas de segurança para proteger as informações pessoais dos clientes contra acesso
          não
          autorizado.
        </p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Nome</label>
            <div class="mt-2">
              <input type="text" name="client[name]" id="name" autocomplete="name" required
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500">
            </div>
            <?php if ($errors['name'] ?? false): ?>
              <p class="text-sm mt-1 text-red-500">
                <?= $errors['name'] ?>
              </p>
            <?php endif; ?>
          </div>

          <div class="sm:col-span-2">
            <label for="birth_date" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Data de
              Nascimento</label>
            <div class="mt-2">
              <input type="date" name="client[birth_date]" id="birth_date" autocomplete="bday" required
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500">
            </div>
            <?php if ($errors['birth_date'] ?? false): ?>
              <p class="text-sm mt-1 text-red-500">
                <?= $errors['birth_date'] ?>
              </p>
            <?php endif; ?>
          </div>

          <div class="sm:col-span-2">
            <label for="cpf" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">CPF</label>
            <div class="mt-2">
              <input type="text" name="client[cpf]" id="cpf" placeholder="000.000.000-00" required
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500">
            </div>
            <?php if ($errors['cpf'] ?? false): ?>
              <p class="text-sm mt-1 text-red-500">
                <?= $errors['cpf'] ?>
              </p>
            <?php endif; ?>
          </div>

          <div class="sm:col-span-2">
            <label for="rg" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">RG</label>
            <div class="mt-2">
              <input type="text" name="client[rg]" id="rg" placeholder="00.000.000-0" required
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500">
            </div>
            <?php if ($errors['rg'] ?? false): ?>
              <p class="text-sm mt-1 text-red-500">
                <?= $errors['rg'] ?>
              </p>
            <?php endif; ?>
          </div>

          <div class="sm:col-span-2">
            <label for="phone"
              class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Telefone</label>
            <div class="mt-2">
              <input type="tel" name="client[phone]" id="phone" placeholder="(00) 00000-0000" autocomplete="tel"
                required
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500">
            </div>
            <?php if ($errors['phone'] ?? false): ?>
              <p class="text-sm mt-1 text-red-500">
                <?= $errors['phone'] ?>
              </p>
            <?php endif; ?>
          </div>
        </div>

        <fieldset class="mt-12">
          <div class="flex justify-between items-end">
            <div>
              <legend class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Endereços</legend>
              <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">
                Use um endereço permanente onde você possa receber correspondência.
              </p>
            </div>
          </div>

          <div class="mt-10">
            <div class="relative -space-y-px rounded-md">
              <p class="text-gray-600 dark:text-gray-200">
                Para adicionar um endereço, crie um cliente e depois edite o cadastro.
              </p>
            </div>
          </div>
        </fieldset>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-4">
        <a href="/"
          class="text-sm font-semibold text-gray-900 dark:text-white px-3 py-2 rounded focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:focus-visible:outline-orange-500 hover:bg-gray-100 transition-colors dark:hover:bg-white/10">Cancelar</a>
        <button type="submit"
          class="rounded bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus-visible:outline-orange-500 transition-colors">
          Adicionar cliente
        </button>
      </div>
    </div>
  </form>
</main>