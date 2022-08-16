<script setup>
import { ref } from 'vue';
import SideNavigator from '@/Layouts/SideNavigationBar.vue'
import 'vue3-simple-typeahead/dist/vue3-simple-typeahead.css';
import { Link } from '@inertiajs/inertia-vue3';
import VueSearch from '@/Components/VueSearch.vue'
import Item from '@/Components/Item.vue'
import axios from 'axios';

const props = defineProps({
    movies: Array
});

const itemsResultFromSearch = ref([]);
const getLabel = (item) => {
    return item.original_title
}

const update = (item) => {
    axios.get('/movies/search/', {
        params: {
            search: item
        }
    }).then((response) => {
        itemsResultFromSearch.value = response.data;
    }).catch((error) => {})
}

</script>

<template>
    <SideNavigator>
        <div class="mt-6 lg:mt-0 lg:px-2 lg:w-11/12">
            <div class="w-full custom-select" id="myCustomSelect">
                <vue-search placeholder="Search" :items="itemsResultFromSearch" :component-item='Item' :get-label="getLabel" @update-items="update"></vue-search>
            </div>
            
            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                <div v-for="(movie, index) in movies" :key="index"
                    class="flex flex-col items-left justify-center w-full max-w-lg mx-auto">
                    <Link :href="route('movies.getMovieDetails', movie.id)">
                    <img class="object-cover w-full rounded-md h-72 xl:h-80" loading="lazy"
                        :src="'https://image.tmdb.org/t/p/original/' + movie.poster_path" alt="movie">

                    <h4 class="mt-2 text-md font-medium text-white"> {{ movie.original_title }}</h4>
                    <div class="flex items-center">
                        <img src="https://img.icons8.com/fluency/20/000000/star.png" />
                        <p class="text-gray-500 mx-2">{{ movie.vote_average }}</p>
                    </div>
                    </Link>
                </div>
            </div>
        </div>
    </SideNavigator>
</template>