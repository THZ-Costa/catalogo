<script setup lang="ts">
import { ref } from 'vue';
import Button from '@/components/ui/button/Button.vue';

const title = ref('');
const rate = ref('');
const duration = ref('');
const photo = ref('');
const link = ref('');
const description = ref('');

const submit = () => {
  console.log('Título:', title.value);
  console.log('rate:',  rate.value);
  console.log('duration:',  duration.value);
  console.log('photo:',  photo.value);
  console.log('link:',  link.value);
  console.log('description:',  description.value);
  // Aqui você pode emitir ou chamar um endpoint
};
</script>

<template>
  <form @submit.prevent="submit">
    <label class="block mb-2">
      Título:
      <input
        v-model="title"
        type="text"
        class="w-full border rounded p-2 mt-1 dark:bg-gray-800 dark:border-gray-700"
      />
    </label>
    <label class="block mb-2">
      Descrição:
      <input
        v-model="description"
        type="text"
        class="w-full border rounded p-2 mt-1 dark:bg-gray-800 dark:border-gray-700"
      />
    </label>
    <label class="block mb-2">
      Nota:
      <input
        v-model="rate"
        type="text"
        class="w-full border rounded p-2 mt-1 dark:bg-gray-800 dark:border-gray-700"
      />
    </label>
    <label class="block mb-2">
      Duração:
      <input
        v-model="duration"
        type="text"
        class="w-full border rounded p-2 mt-1 dark:bg-gray-800 dark:border-gray-700"
      />
    </label>
    <label class="block mb-2">
      Capa:
      <input
        v-model="photo"
        type="text"
        class="w-full border rounded p-2 mt-1 dark:bg-gray-800 dark:border-gray-700"
      />
    </label>
    <label class="block mb-2">
      Link:
      <input
        v-model="link"
        type="text"
        class="w-full border rounded p-2 mt-1 dark:bg-gray-800 dark:border-gray-700"
      />
    </label>

    <div class="flex justify-end mt-5">
        <Button label="Cancelar" icon="save" type="submit" />
        <Button class="ml-4" label="Salvar" icon="save" type="submit" />
    </div>

  </form>
</template>
