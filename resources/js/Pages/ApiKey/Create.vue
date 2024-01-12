<template>
    <div>
        <form @submit.prevent="submit">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" v-model="form.name">
            <input type="submit" value="submit">
        </form>
    </div>
</template>

<script>
    export default {
        data() {
           return {
               form: this.$inertia.form({
                    'name': '',
               })
           }
       },
         methods: {
              submit() {
                this.form.post(route('api-keys.store'))
              }
         }
    }
</script>