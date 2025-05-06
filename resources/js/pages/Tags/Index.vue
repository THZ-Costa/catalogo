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
    title: 'Tags',
    href: '/tags',
  },
]

defineProps<{
  movies: any[]
}>()
</script>

<template>
  <Head title="Tags" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-4">
      <h1 class="text-2xl font-bold mb-4">Tags</h1>

      <ul>
        <li v-for="movie in movies" :key="movie.id" class="mb-2">
          {{ movie.title }}
        </li>
      </ul>
    </div>
  </AppLayout>
</template>
