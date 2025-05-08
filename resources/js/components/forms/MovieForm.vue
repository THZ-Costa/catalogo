<script setup lang="ts">
import { ref } from 'vue';
import Button from '@/components/ui/button/Button.vue';
import axios from 'axios';

const title = ref('');
const rate = ref('');
const duration = ref('');
const description = ref('');
const photo = ref<File | null>(null);
const link = ref('');

const handlePhotoChange = (event: Event) => {
  const target = event.target as HTMLInputElement;
  if (target.files && target.files.length > 0) {
    photo.value = target.files[0];
  }
};

const submit = async () => {

  console.log('Título:', title.value);
  console.log('Nota:', rate.value);
  console.log('Duração:', duration.value);
  console.log('Descrição:', description.value);
  console.log('Link:', link.value);
  console.log('Capa:', photo.value);

  const formData = new FormData();
  formData.append('title', title.value);
  formData.append('rate', rate.value);
  formData.append('duration', duration.value);
  formData.append('description', description.value);
  formData.append('link', link.value);
  if (photo.value) {
    formData.append('photo', photo.value);
  }

  try {
    await axios.post(route('movies.store'), formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });

    // opcional: emitir evento pra fechar modal ou dar reload
  } catch (error) {
    console.error(error);
  }
};

const emit = defineEmits(['close'])

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
      <Button @click="$emit('close')"  label="Cancelar" icon="save" type="submit" />
      <Button label="Salvar" icon="save" type="submit" />
    </div>
  </form>
</template>
