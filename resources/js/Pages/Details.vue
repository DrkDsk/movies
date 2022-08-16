<script setup>
import SideNavigator from '@/Layouts/SideNavigationBar.vue'

const props = defineProps({
  movie: Object,
  releaseDate: String,
  year_release_date: String
});

</script>

<template>
  <SideNavigator>
    <div class="flex mx-6">
      <div class="flex-none w-auto h-14">
        <div class="max-w-2xl mx-auto">
          <div class="rounded-lg max-w-sm">
            <a href="#">
              <img class="object-cover" :src="'https://image.tmdb.org/t/p/original/' + movie.poster_path" alt="movie">
            </a>
          </div>
        </div>
      </div>
      <div class="grow h-14 mt-12 ml-12">
        <p class="text-white text-4xl font-bold">{{ movie.title }} <span class="text-white font-medium">({{ year_release_date }})</span>
        </p>
        <p class="mt-2 text-white text-base">{{ releaseDate }}
          <template  v-for="genre in movie.genres">
            <span class="mr-1">{{ genre.name}}</span> 
          </template>
          {{ movie.runtime }} minutes.
        </p>
        <p class="mt-4 text-white text-sm italic">{{ movie.tagline }}</p>
        <p class="mt-4 text-white text-2xl">Overview</p>
        <p class="mt-4 text-white text-lg w-11/12">{{ movie.overview }}</p>
      </div>
    </div>
  </SideNavigator>

</template>