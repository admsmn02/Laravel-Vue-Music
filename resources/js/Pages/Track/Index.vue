<template>
    <MusicLayout>
        <template #title>
            Musiques
        </template>

        <template #action>
            <Link v-if="$page.props.isAdmin" :href="route('tracks.create')" class="bg-green-500 hover:bg-green-600 text-white rounded-md px-3 py-2 text-sm font-medium">
                Créer une musique
            </Link>
        </template>

        <template #content>
            <input
                type="search"
                v-model="search"
            >
            <div class="track-grid">
                <Track v-for="track in filteredTracks" :key="track.uuid" :track="track" :active="currentTrack === track.uuid" @played="play" />
            </div>
        </template>
        
    </MusicLayout>
</template>
   
<script>
   import MusicLayout from '@/Layouts/MusicLayout.vue'
   import { Link } from '@inertiajs/vue3'
   import Track from '@/Components/Track/Track.vue'
   export default {
        components: {
            MusicLayout,
            Link,
            Track,
        },
        props: ['tracks'],
        data() {
            return {
                search: '',
                audio: null,
                currentTrack: null,
            }
        },
        computed: {
            filteredTracks(){
                return this.tracks.filter((track) => {
                    return track.title.toLowerCase().includes(this.search.toLowerCase()) || track.artist.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        },
        methods: {
            play(track){
                const url = '/storage/' + track.music;

                if(!this.currentTrack){
                    this.audio = new Audio(url);
                    this.audio.play();
                } else if (this.currentTrack !== track.uuid){
                    this.audio.pause();
                    this.audio.src = url;
                    this.audio.play();
                } else {
                    this.audio.paused ? this.audio.play() : this.audio.pause();
                }

                this.currentTrack = track.uuid;
            }
        }
   }
</script>
   
<style>
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
    width: 80%;
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