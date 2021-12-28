<template>
  <div class="mt-5">
    <div class="alert alert-danger" role="alert">
      <p v-if="errors?.length">Total errors {{ errors.length }}</p>
      <p v-else>
        No errors - This is expected output - Will be changed in prod
      </p>
      <ul v-if="errors.length">
        <li v-for="error in errors">
          {{ error }}
        </li>
      </ul>
    </div>
    <h4>Home of search</h4>
    <router-link to="/">Go to Home</router-link>
    <router-link to="/search">Go to search</router-link>
    <router-link to="/universities">Go to uni</router-link>

    <router-view></router-view>
  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: null,
    };
  },
  created() {
    this.errors = this.$store.state.errors;
    console.log(
      "ng-aw ~ file: App.vue ~ line 32 ~ created ~ this.errors",
      this.errors
    );
  },
};
</script>
