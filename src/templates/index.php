<?php $this->layout('layout', ['title' => 'Meus clientes - KaBuM!']) ?>

<header class="container mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-4">
  <div class="flex justify-end">
    <a href="/logout" class="text-sm font-semibold px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-white/10">
      Sair
    </a>
  </div>
</header>

<main class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-2xl font-semibold leading-6 text-gray-900 dark:text-white">Meus clientes</h1>
      <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">Uma lista com todos os clientes da sua conta,
        incluindo
        nome, data de nascimento, cpf, rg e telefone.
      <p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
      <a href="/cliente/criar"
        class="flex rounded bg-orange-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600 dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus-visible:outline-orange-500 transition-colors">Adicionar
        cliente</a>
    </div>
  </div>

  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
          <thead>
            <tr>
              <th scope="col"
                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">
                Nome
              </th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">CPF
              </th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">RG
              </th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Telefone
              </th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Data de
                Nasc.
              </th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                Endereços
              </th>
              <th scope="col"
                class="relative py-3.5 pl-3 pr-4 sm:pr-0 text-sm font-semibold text-gray-900 dark:text-white">
                Ações
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
            <?php foreach ($clients as $client): ?>
              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 dark:text-white">
                  <?= $this->e($client['name']) ?>
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                  <?= $this->e($client['cpf']) ?>
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                  <?= $this->e($client['rg']) ?>
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                  <?= $this->e($client['phone']) ?>
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                  <?= $this->e(date('d/m/Y', strtotime($client['birth_date']))) ?>
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                  <?= $this->e($client['addresses_count']) ?>
                </td>
                <td class="relative whitespace-nowrap text-right text-sm font-medium sm:pr-0 flex gap-2 px-3 py-4">
                  <a href="/cliente/editar?id=<?= $client['id'] ?>"
                    class="text-orange-600 hover:text-orange-900 hover:bg-gray-100 dark:text-orange-400 dark:hover:text-orange-200 focus-visible:outline-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 rounded dark:hover:bg-white/10 p-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                    <span class="sr-only">Editar
                      <?= $this->e($client['name']) ?>
                    </span>
                  </a>

                  <form action="/cliente/excluir?id=<?= $client['id'] ?>" method="post">
                    <button type="submit"
                      class="text-red-600 hover:text-red-900 hover:bg-gray-100 dark:text-red-400 dark:hover:text-red-500 focus-visible:outline-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 rounded p-1.5 dark:hover:bg-white/10">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                      <span class="sr-only">
                        Excluir
                        <?= $this->e($client['name']) ?>
                      </span>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>