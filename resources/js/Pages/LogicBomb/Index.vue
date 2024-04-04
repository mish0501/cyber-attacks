<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

const props = defineProps<{
  logicBomb: boolean
}>()
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
          <div class="text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Logic bomb:
            <span class="font-extrabold text-3xl">
              {{ String(logicBomb) }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
