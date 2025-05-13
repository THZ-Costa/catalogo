<script setup lang="ts">

const props = defineProps<{
  show: boolean;
  title: string;
}>()

const emit = defineEmits(['close'])
</script>

<template>
  <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">
    <div class="bg-white dark:bg-gray-900 p-6 rounded-xl w-full max-w-lg">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold">{{ title }}</h2>
        <button @click="$emit('close')" class="text-gray-500 hover:text-gray-900">X</button>
        <Button label="Cancelar" icon="xmark" @click="$emit('close')" />
      </div>
      <div>
        <!-- slot para conteúdo personalizado -->
        <slot></slot>
      </div>
    </div>
  </div>
</template>
