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
        <Link v-if="$page.props.isAdmin" :href="route('tracks.edit', {track: track })" class="ease-in-out hover:scale-110 active:scale-90 text-white font-bold ml-2 absolute top-[0.7rem] right-[4rem]">
            <img width= "38" height="38" src="https://freesvg.org/img/gearGreen.png" alt="Modifier">
        </Link>
        <Link v-if="$page.props.isAdmin" :href="route('tracks.destroy', {track: track })" method="delete" as="button" class="ease-in-out hover:scale-110 active:scale-90 text-white font-bold ml-2 absolute top-[0.6rem] right-[6.8rem]">
            <img width= "38" height="38" src="https://cdn-icons-png.flaticon.com/512/325/325008.png" alt="Supprimer">
        </Link>
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