<template>
    <MusicLayout>
        <template #title>
            Créer un nouveau titre
        </template>
        <template #action>
            
        </template>
        <template #content>
            <form>
                    <!-- Title input -->
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Titre
                    </label>
                    <input
                        id="title"
                        v-model="form.title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-red-500"
                        :class="{ 'border-red-500': form.errors.title }"
                        type="text"
                        placeholder="Title"
                    >
                    <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>   
                </div>

                    <!-- Artist input -->
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="artist">
                        Artist
                    </label>
                    <input
                        id="artist"
                        v-model="form.artist"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-red-500"
                        :class="{ 'border-red-500': form.errors.artist }"
                        type="text"
                        placeholder="Artist"
                    >
                    <p class="text-red-500 text-xs italic">{{ form.errors.artist }}</p>  
                </div>

                    <!-- Image input -->
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                        Miniature
                    </label>
                    <input
                        id="image"
                        @change="handleInputChange($event, 'image')"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-red-500"
                        :class="{ 'border-red-500': form.errors.image }"
                        type="file"
                    >
                    <p class="text-red-500 text-xs italic">{{ form.errors.image }}</p>  
                </div>

                    <!-- Music input -->
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="music">
                        Music
                    </label>
                    <input
                        id="music"
                        @change="handleInputChange($event, 'music')"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-red-500"
                        :class="{ 'border-red-500': form.errors.music }"
                        type="file"
                    >
                        <p class="text-red-500 text-xs italic">{{ form.errors.music }}</p>
                </div>

                    <!-- Display input -->
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="display">
                        Display
                    </label>
                    <select
                        id="display"
                        v-model="form.display"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-red-500"
                        :class="{ 'border-red-500': form.errors.display }"
                    >
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                    <p class="text-red-500 text-xs italic">{{ form.errors.display }}</p> 
                </div>
                
            </form>

            {{ form }}
        </template>
    </MusicLayout>
</template>
   
<script>
   import MusicLayout from '@/Layouts/MusicLayout.vue'
   export default {
        components: { MusicLayout },
        data() {
            return {
                form: this.$inertia.form({
                    title: '',
                    artist: '',
                    image: null,
                    music: null,
                    display: true,
                })
            }
        },
        methods: {
            handleInputChange(event, fieldName) {
              this.form[fieldName] = event.target.files[0];
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