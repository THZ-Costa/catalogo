<script setup lang="ts">
import { defineProps, defineEmits, computed } from 'vue';

const props = defineProps<{
  label: string;
  icon?: string;
  variant?: 'primary' | 'secondary' | 'danger';
  size?: 'sm' | 'md' | 'lg';
  type?: 'button' | 'submit';
}>();

const emit = defineEmits(['click']);

const buttonClass = computed(() => {
  let base = 'flex items-center gap-2 rounded-lg font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2';
  
  const variants = {
    primary: 'bg-blue-600 text-white hover:bg-blue-700 dark:bg-white dark:text-black dark:hover:bg-gray-200',
    secondary: 'bg-gray-200 text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600',
    danger: 'bg-red-600 text-white hover:bg-red-700 dark:bg-red-500 dark:text-white dark:hover:bg-red-600',
  };

  const sizes = {
    sm: 'text-xs px-2 py-1',
    md: 'text-sm px-4 py-2',
    lg: 'text-base px-5 py-3',
  };

  return `${base} ${variants[props.variant || 'primary']} ${sizes[props.size || 'md']}`;
});
</script>

<template>
  <button :type="type || 'button'" @click="$emit('click')" :class="buttonClass">
    <font-awesome-icon v-if="icon" :icon="icon" />
    <span>{{ label }}</span>
  </button>
</template>
