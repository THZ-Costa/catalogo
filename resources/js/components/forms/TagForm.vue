<script setup lang="ts">
import { ref } from 'vue';
import Button from '@/components/ui/button/Button.vue';

const title = ref('');
const rate = ref('');
const duration = ref('');
const description = ref('');
const photo = ref<File | null>(null);
const link = ref('');

const submit = () => {
  console.log('Título:', title.value);
  console.log('Nota:', rate.value);
  console.log('Duração:', duration.value);
  console.log('Descrição:', description.value);
  console.log('Link:', link.value);
  console.log('Capa:', photo.value);
  // Aqui você pode emitir um evento ou fazer um request
};

const handlePhotoChange = (event: Event) => {
  const target = event.target as HTMLInputElement;
  if (target.files && target.files.length > 0) {
    photo.value = target.files[0];
  }
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
      Descrição:
      <textarea
        v-model="description"
        class="w-full border rounded p-2 mt-1 dark:bg-gray-800 dark:border-gray-700"
        rows="4"
      ></textarea>
    </label>

    <label class="block mb-2">
      Capa:
      <input
        type="file"
        accept="image/*"
        @change="handlePhotoChange"
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

    <div class="flex justify-end mt-4 space-x-2">
      <Button label="Cancelar" icon="save" type="submit" />
      <Button label="Salvar" icon="save" type="submit" />
    </div>
  </form>
</template>
