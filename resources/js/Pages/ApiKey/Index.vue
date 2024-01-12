<template>
    <div>
        <h1>My API Keys</h1>
        <Link :href="route('api-keys.create')" class="custom-link">Create API Key</Link>
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
                   <td><Link :href="route('api-keys.destroy', { apiKey: apiKey })" method="delete" as="button">Delete API Key</Link></td>
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

.custom-link {
   display: inline-block;
   padding: 10px 20px;
   margin: 10px 0;
   color: #fff;
   background-color: #007bff;
   border: none;
   border-radius: 4px;
   cursor: pointer;
   text-decoration: none;
   transition: background-color 0.3s ease;
}

.custom-link:hover {
   background-color: #0056b3;
}
</style>
