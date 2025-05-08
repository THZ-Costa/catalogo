<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/components/ui/dialog/Modal.vue';
import MovieForm from '@/components/forms/MovieForm.vue';
import Button from '@/components/ui/button/Button.vue';
import type { BreadcrumbItem } from '@/types';

const showModal = ref(false);

const handleAdd = () => {
  showModal.value = true;
};

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Dashboard', href: '/dashboard' },
  { title: 'Filmes', href: '/movies' },
];

defineProps<{
  movies: any[]
}>();
</script>

<template>
  <Head title="Filmes" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-4">
      <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Filmes</h1>
        <Button label="Adicionar" icon="plus" @click="handleAdd" />
      </div>

      <hr>

      <ul>
        <li v-for="movie in movies" :key="movie.id" class="mb-2">
          {{ movie.title }}
        </li>
      </ul>
    </div>

    <!-- modal -->
    <Modal :show="showModal" @close="showModal = false">
      <h2 class="text-xl font-semibold mb-4">Adicionar Filme</h2>
      <MovieForm />
    </Modal>
  </AppLayout>
</template>
