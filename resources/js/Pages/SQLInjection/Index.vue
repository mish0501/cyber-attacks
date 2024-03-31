<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps<{
  protection: boolean
  queries: Record<'true' | 'false', string>
  search: string
  results: Record<string, string>[]
}>()

const form = useForm({
  protection: props.protection,
  search: props.search,
})
</script>

<template>
  <Head title="SQL Injection" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        SQL Injection
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <form
            class="flex flex-col gap-5"
            @submit.prevent="form.get(route('sql-injection.index'))"
          >
            <div class="flex justify-between">
              <div
                class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight"
              >
                Protection:
              </div>
              <div>
                <label class="inline-flex items-center cursor-pointer">
                  <input
                    type="checkbox"
                    class="sr-only peer"
                    v-model="form.protection"
                    true-value="true"
                    false-value="false"
                  />
                  <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                  ></div>
                </label>
              </div>
            </div>

            <div class="bg-gray-900 text-white p-4 rounded-md">
              <div class="flex justify-between items-center mb-2">
                <span class="text-gray-400">Query:</span>
              </div>
              <div class="overflow-x-auto">
                <pre
                  id="code"
                  class="text-gray-300"
                ><code>{{ props.queries[`${form.protection}`] }}</code></pre>
              </div>
            </div>

            <div>
              <label
                for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
                >Search</label
              >
              <div class="relative">
                <div
                  class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                >
                  <svg
                    class="w-4 h-4 text-gray-500 dark:text-gray-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 20 20"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                    />
                  </svg>
                </div>
                <input
                  type="search"
                  id="default-search"
                  class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Type SQL Injection here"
                  required
                  v-model="form.search"
                />
                <button
                  type="submit"
                  class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                  Search
                </button>
              </div>
            </div>

            <div
              class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight"
            >
              Results:
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
              >
                <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                  <tr>
                    <th scope="col" class="px-6 py-3">ID</th>

                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Password</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                    v-for="result in props.results"
                    :key="result.id"
                  >
                    <th
                      scope="row"
                      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      {{ result.id }}
                    </th>
                    <td class="px-6 py-4">{{ result.name }}</td>
                    <td class="px-6 py-4">{{ result.email }}</td>
                    <td class="px-6 py-4">{{ result.password }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
