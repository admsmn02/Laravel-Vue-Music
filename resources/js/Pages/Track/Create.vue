<template>
    <MusicLayout>
        <template #title>
            Créer un nouveau titre
        </template>
        <template #action>
            
        </template>
        <template #content>
            
        </template>
    </MusicLayout>
</template>
   
<script>
   import MusicLayout from '@/Layouts/MusicLayout.vue'
   export default {
        components: { MusicLayout }
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
    width: calc((100% / 3) - 2rem); /* Adjusted width */
    height: 32rem; /* Adjusted height */
    background-color: #f3f4f6;
    border-radius: 0.375rem;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    position: relative; /* Added to position the play count */
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