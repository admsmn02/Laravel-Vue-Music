<template>
    <div>
        <h1>My API Keys</h1>
        <table class="table">
            <thead>
                <tr>
                   <th>Name</th>
                   <th>Key</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="apiKey in apiKeys" :key="apiKey.id">
                   <td>{{ apiKey.name }}</td>
                   <td>{{ apiKey.key }}</td>
                </tr>
            </tbody>
        </table>
    </div>
 </template>

<script>
    export default {
        props: {
            apiKeys: Array,
        },
    }
</script>

<style scoped>

h1 {
  text-align: center;
  font-size: 2em;
  color: #333;
}
.table {
   width: 100%;
   border-collapse: collapse;
}

.table th, .table td {
   padding: 1rem;
   border: 1px solid #ddd;
}

.table tr:nth-child(even) {
   background-color: #f2f2f2;
}
</style>