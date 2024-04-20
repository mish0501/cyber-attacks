<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const props = defineProps<{
  posts: {
    id: number
    title: string
  }[]
}>()
</script>

<template>
  <Head title="SQL Injection" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Show posts
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
              class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
              <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
              >
                <tr>
                  <th scope="col" class="px-6 py-3">ID</th>

                  <th scope="col" class="px-6 py-3">Title</th>
                  <th scope="col" class="px-6 py-3">Links</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                  v-for="post in props.posts"
                  :key="post.id"
                >
                  <th
                    scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    {{ post.id }}
                  </th>
                  <td class="px-6 py-4">{{ post.title }}</td>
                  <td class="px-6 py-4 gap-3 flex">
                    <Link
                      :href="route('posts.show', post.id)"
                      class="text-indigo-800 dark:text-indigo-400 underline underline-offset-4"
                      >Show</Link
                    >
                    <Link
                      :href="route('posts.show-unprotected', post.id)"
                      class="text-indigo-800 dark:text-indigo-400 underline underline-offset-4"
                      >Show unprotected</Link
                    >
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
