<script setup>
import { Link } from '@inertiajs/inertia-vue3';

</script>

<template>
  <section class="h-screen">
    <div class="container px-2 lg:px-4 py-12 mx-4">
      <div class="lg:flex lg:-mx-2">
        <div class="space-y-3 lg:w-1/6 lg:px-2 lg:space-y-4 mt-8">
          <Link class="text-white block px-6 py-3 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('home')"
          >
            Estrenos
          </Link>
          <Link class="text-white block px-6 py-3 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            :href="route('movies.popular')"
          >
            Populares
          </Link>
        </div>

        <section class="home">
          <main class="my-8">
            <slot></slot>
          </main>
        </section>
      </div>
    </div>
  </section>
</template>