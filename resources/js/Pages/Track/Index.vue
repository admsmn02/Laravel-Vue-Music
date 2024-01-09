<template>
    <MusicLayout>
        <template #title>
            Musiques
        </template>

        <template #action>
            <Link :href="route('tracks.create')" class="bg-green-500 hover:bg-green-600 text-white rounded-md px-3 py-2 text-sm font-medium">
                Créer une musique
            </Link>
        </template>

        <template #content>
            <input
                type="search"
                v-model="search"
            >
            {{ search }}
            <div class="track-grid">
                <div v-for="track in filteredTracks" :key="track.uuid" class="track-card">
                    <img :src="'/storage/' + track.image" alt="" class="track-image">
                    <audio controls>
                        <source :src="'/storage/' + track.music" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <div class="track-info">
                        <h2 class="track-title">{{ track.title }}</h2>
                        <p class="track-artist">by {{ track.artist }}</p>
                    </div>
                    <div class="track-play-count">
                        {{ track.play_count }} plays
                    </div>
                </div>
            </div>
        </template>
        
    </MusicLayout>
</template>
   
<script>
   import MusicLayout from '@/Layouts/MusicLayout.vue'
   import { Link } from '@inertiajs/vue3'
   export default {
        components: {
            MusicLayout,
            Link
        },
        props: ['tracks'],
        data() {
            return {
                search: ''
            }
        },
        computed: {
            filteredTracks(){
                return this.tracks.filter((track) => {
                    return track.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        }
   }
</script>
   
<style scoped>
    .track-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    }

    .track-card {
    margin: 1rem;
    width: calc((100% / 3) - 2rem);
    background-color: #f3f4f6;
    border-radius: 0.375rem;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    position: relative;
    }

    .track-image {
    width: 100%;
    height: auto;
    }

    .track-info {
    padding: 1rem;
    color: #333;
    }

    .track-title {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    }

    .track-artist {
    font-size: 1.2rem;
    color: #666;
    }

    .track-play-count {
    position: absolute;
    bottom: 1rem;
    right: 1rem;
    font-size: 1.2rem;
    color: #666;
    }
</style>