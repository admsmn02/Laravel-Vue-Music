<template>
    <MusicLayout>
        <template #title>
            Playlists
        </template>

        <template #action>
            <Link :href="route('playlists.create')" class="bg-green-500 hover:bg-green-600 text-white rounded-md px-3 py-2 text-sm font-medium">
                Créer une playlist
            </Link>
        </template>

        <template #content>
            <table>
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">Titre</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">Nombre de musiques</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">Crée le</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(playlist, i) in playlists" :key="playlist.uuid">
                        <td class="text-center">{{ i + 1 }}</td>
                        <td class="text-center">{{ playlist.title }}</td>
                        <td class="text-center">{{ playlist.tracks.length }}</td>
                        <td class="text-center">{{ $moment(playlist.created_at).format("DD-MM-YYYY à hh:mm:ss") }}</td>
                        <td class="text-center">
                            <Link :href="route('playlists.show', { playlist: playlist })" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voir</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </template>
        
    </MusicLayout>
</template>
   
<script>
    import MusicLayout from '@/Layouts/MusicLayout.vue'
    export default {
        components: {
            MusicLayout,
        },
        props: {
            playlists: Array,
        }
    }
</script>
   
<style>

table {
    border-collapse: separate;
    border-spacing: 0 1em;
}

</style>
