<template>
    <div class="track-card" :class="{'border border-blue-500': active}">
        <img :src="'/storage/' + track.image" alt="" class="track-image">
        <div class="track-info">
            <h2 class="track-title">{{ track.title }}</h2>
            <p class="track-artist">by {{ track.artist }}</p>
        </div>
        <button @click="handleClick" class="z-40 play-button bg-transparent border-none p-1 m-1 cursor-pointer outline-none transform transition duration-300 ease-in-out hover:scale-110 active:scale-90 absolute top-0 right-0">
            <img width="50" height="50" src="https://jccdallas.org/wp-content/uploads/2020/06/Spotify-Play-Button.png" alt="Play">
        </button>
        <div class="track-play-count">
            {{ track.play_count }} plays
        </div>
    </div>
</template>

<script>
    export default {
        emits : ['played'],
        props: {
            track: Object,
            active: {
                type: Boolean,
                default: false
            },
        },
        methods: {
            handleClick(){
                this.$emit('played', this.track );
            }
        }
    }
</script>