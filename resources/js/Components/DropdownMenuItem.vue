<script setup lang="ts">
import { computed } from 'vue'
import Dropdown from './Dropdown.vue'

const props = defineProps<{
  active?: boolean
}>()

const wrapperClasses = computed(() =>
  props.active
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out'
)

const triggerClasses = computed(() =>
  props.active
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 transition duration-150 ease-in-out'
)
// inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150
</script>

<template>
  <div :class="wrapperClasses">
    <Dropdown align="right" width="48" content-classes="mt-3">
      <template #trigger>
        <span class="inline-flex rounded-md">
          <button type="button" :class="triggerClasses">
            <slot name="trigger" />
          </button>
        </span>
      </template>

      <template #content>
        <slot name="content" />
      </template>
    </Dropdown>
  </div>
</template>
