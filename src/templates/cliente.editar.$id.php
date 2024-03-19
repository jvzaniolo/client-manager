<?php $this->layout('layout', ['title' => "{$client['name']} - KaBuM!"]) ?>

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
      <div class="border-b border-gray-900/10 pb-12">
        <h1 class="block text-2xl font-semibold leading-7 text-gray-900 mb-8 dark:text-white">Editar
          <?= $this->e($client['name'] ?? 'cliente') ?>
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
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500"
                value="<?= $this->e($client['name']) ?>">
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
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500"
                value="<?= $this->e(date_format(new DateTimeImmutable($client['birth_date']), 'Y-m-d')) ?>">
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
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500"
                value="<?= $this->e($client['cpf']) ?>">
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
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500"
                value="<?= $this->e($client['rg']) ?>">
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
                class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:text-white dark:bg-white/5 dark:ring-white/10 dark:focus:ring-orange-500"
                value="<?= $this->e($client['phone']) ?>">
            </div>
            <?php if ($errors['phone'] ?? false): ?>
              <p class="text-sm mt-1 text-red-500">
                <?= $errors['phone'] ?>
              </p>
            <?php endif; ?>
          </div>
        </div>

        <fieldset class="mt-12">
          <div class="flex justify-between items-end flex-col sm:flex-row gap-4">
            <div>
              <legend class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Endereços</legend>
              <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">
                Use um endereço permanente onde você possa receber correspondência.
              </p>
            </div>

            <button type="button"
              class="rounded w-full sm:w-fit dark:bg-white/10 border dark:border-white/10 border-gray-300 hover:bg-gray-100 px-3 py-2 text-sm font-semibold dark:text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:focus-visible:outline-orange-500 dark:hover:bg-white/20 transition-colors inline-flex gap-3 items-center justify-center"
              name="address-dialog" aria-controls="address-dialog">
              <span class="leading-none">+</span>
              Novo endereço
            </button>
          </div>

          <div class="mt-10">
            <div class="relative -space-y-px rounded-md">
              <?php if (isset ($client['addresses']) && count($client['addresses']) > 0): ?>
                <?php foreach ($client['addresses'] as $key => $address): ?>
                  <label class="group relative flex justify-between cursor-pointer border border-gray-200 p-4 focus:outline-none has-[:checked]:z-10 has-[:checked]:border-orange-200 has-[:checked]:bg-orange-50 dark:border-gray-800 dark:has-[:checked]:border-orange-400/30 dark:has-[:checked]:bg-orange-500/5 <?=
                    // I'm sorry but I had to do this
                    count($client['addresses']) > 1
                    ? ($key === 0
                      ? 'rounded-tl-md rounded-tr-md' :
                      ($key === count($client['addresses']) - 1
                        ? 'rounded-bl-md rounded-br-md' : ''))
                    : 'rounded-md' ?>">
                    <span class="flex text-sm sm:items-center">
                      <input type="radio" name="selectedAddress" value="<?= $address['id'] ?>"
                        class="h-4 w-4 mt-0.5 text-orange-600 border-gray-300 focus:ring-orange-600 focus:ring-2 focus:ring-offset-2 dark:bg-gray-800 dark:border-white/10 dark:focus:ring-offset-gray-950 sm:mt-0">
                      <span class="ml-3 gap-2 flex flex-col sm:flex-row">
                        <span
                          class="font-medium text-gray-900 group-has-[:checked]:text-orange-900 dark:text-white dark:group-has-[:checked]:text-orange-200">
                          <?= $this->e($address['street']) ?>
                        </span>
                        <span
                          class="text-gray-500 group-has-[:checked]:text-orange-700 dark:text-gray-500 dark:group-has-[:checked]:text-orange-400 truncate">
                          <?= $this->e($address['city']) ?>,
                          <?= $this->e($address['state']) ?> -
                          <?= $this->e($address['country']) ?>
                          <?= $this->e("({$address['postal_code']})") ?>
                        </span>
                      </span>
                    </span>
                  </label>
                <?php endforeach; ?>
              <?php else: ?>
                <p class="text-gray-600 dark:text-gray-200">
                  Nenhum endereço cadastrado.
                </p>
              <?php endif; ?>
            </div>
          </div>
        </fieldset>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-4">
        <a href="/"
          class="text-sm font-semibold text-gray-900 dark:text-white px-3 py-2 rounded focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:focus-visible:outline-orange-500 dark:hover:bg-white/10 hover:bg-gray-100">Cancelar</a>
        <button type="submit"
          class="rounded bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus-visible:outline-orange-500 transition-colors">
          Editar cliente
        </button>
      </div>
    </div>
  </form>
</main>

<dialog id="address-dialog"
  class="bg-white shadow-xl rounded-lg top-1/2 -translate-y-1/2 p-8 [::backdrop]:bg-black/10 dark:bg-gray-950">
  <form method="post" action="/endereco/criar">
    <input type="hidden" name="client_id" value="<?= $client['id'] ?>">

    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      <div class="col-span-full">
        <h2 class="font-semibold dark:text-white text-gray-900">Novo endereço
        </h2>
      </div>

      <div class="sm:col-span-2">
        <label for="postal_code" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">CEP /
          Código postal</label>
        <div class="mt-2">
          <input type="text" name="address[postal_code]" id="postal_code" autocomplete="postal_code" required
            placeholder="00000-000"
            class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 dark:text-white dark:ring-white/10 dark:bg-white/5 sm:max-w-xs sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="sm:col-span-4 sm:col-start-1">
        <label for="address" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Endereço</label>
        <div class="mt-2">
          <input type="text" name="address[street]" id="address" autocomplete="shipping street-address" required
            placeholder="Rua João de Souza, 123"
            class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 dark:text-white dark:ring-white/10 dark:bg-white/5 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="sm:col-span-2">
        <label for="city" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Cidade</label>
        <div class="mt-2">
          <input type="text" name="address[city]" id="city" autocomplete="shipping address-level2" required
            placeholder="São Paulo"
            class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 dark:text-white dark:ring-white/10 dark:bg-white/5 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="sm:col-span-3">
        <label for="state" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Estado</label>
        <div class="mt-2">
          <input type="text" name="address[state]" id="state" autocomplete="shipping address-level1" required
            placeholder="São Paulo"
            class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 dark:text-white dark:ring-white/10 dark:bg-white/5 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="sm:col-span-3">
        <label for="country" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">País</label>
        <div class="mt-2">
          <input id="country" type="text" name="address[country]" autocomplete=" shipping country-name" required
            placeholder="Brasil"
            class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6 dark:ring-white/10 dark:bg-white/5 dark:text-white" />
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-4">
      <button type="button" autofocus
        class="text-sm font-semibold text-gray-900 dark:text-white px-3 py-2 rounded-lg focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:focus-visible:outline-orange-500">Cancelar</button>
      <button type="submit"
        class="rounded bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus-visible:outline-orange-500 transition-colors">
        Adicionar endereço
      </button>
    </div>
  </form>
</dialog>

<script>
  const dialog = document.getElementById('address-dialog');
  const openDialog = document.querySelector('button[aria-controls="address-dialog"]');
  const closeDialog = dialog.querySelector('button[type="button"]');

  openDialog.addEventListener('click', () => {
    dialog.showModal();
  });

  closeDialog.addEventListener('click', () => {
    dialog.close();
  });

  dialog.addEventListener('close', () => {
    openDialog.focus();
  });
</script>