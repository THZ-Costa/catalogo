<script setup lang="ts">
import { defineProps, defineEmits } from 'vue';

defineProps<{
  label: string;
  icon: string;
}>();

const emit = defineEmits(['click']);
</script>

<template>
  <button
    @click="$emit('click')"
    class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold transition-colors
      bg-blue-600 text-white hover:bg-blue-700
      dark:bg-white dark:text-black dark:hover:bg-gray-200"
  >
    <font-awesome-icon :icon="icon" />
    <span>{{ label }}</span>
  </button>
</template>
