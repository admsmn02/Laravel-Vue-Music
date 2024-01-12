<template>
    <MusicLayout>
        <template #title>
            Playlist : {{ playlist.title }}
        </template>

        <template #action>
            <Link :href="route('playlists.create')" class="bg-green-500 hover:bg-green-600 text-white rounded-md px-3 py-2 text-sm font-medium">
                Créer une playlist
            </Link>
        </template>

        <template #content>
            <div class="track-grid">
                <Track v-for="track in playlist.tracks" :key="track.uuid" :track="track" :active="currentTrack === track.uuid" @played="play" />
            </div>
        </template>
        
    </MusicLayout>
</template>
   
<script>
    import MusicLayout from '@/Layouts/MusicLayout.vue'
    import Track from '@/Components/Track/Track.vue'
    export default {
        components: {
            MusicLayout,
            Track,
        },
        props: {
            playlist: Object,
        },
        data() {
            return {
                audio: null,
                currentTrack: null,
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

table {
   border-collapse: separate;
   border-spacing: 0 1em; /* Adjust the second value to increase or decrease the space */
}

</style>