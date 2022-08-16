<template>
  <a :href="'/movies/' + item.id">
    <picture class="max-h-6">
      <div class="flex" v-if="item.original_title && item.release_date && item.poster_path">
        <img class="object-cover rounded-md h-10 w-10" loading="lazy"
          :src="'https://image.tmdb.org/t/p/original/' + item.poster_path" alt="movie">
        <div class="flex flex-col ml-2">
          <span class="">{{ item.original_title }}</span>
          <span class="text-xs">{{ item.release_date }}</span>
        </div>
      </div>
    </picture>
  </a>
</template>

<script>
export default {
  props: {
    item: { required: true }
  }
}
</script>