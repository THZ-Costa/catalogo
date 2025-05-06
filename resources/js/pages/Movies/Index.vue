<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { type BreadcrumbItem } from '@/types'

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/dashboard',
  },
  {
    title: 'Filmes',
    href: '/movies',
  },
]

defineProps<{
  movies: any[]
}>()
</script>

<template>
  <Head title="Filmes" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-4">
      <h1 class="text-2xl font-bold mb-4">Filmes</h1>

      <ul>
        <li v-for="movie in movies" :key="movie.id" class="mb-2">
          {{ movie.title }}
        </li>
      </ul>
    </div>
  </AppLayout>
</template>
