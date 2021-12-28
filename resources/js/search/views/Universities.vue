<template>
  <div class="mt-5">
    <h1>Universities</h1>
    <p>levelOfStudy {{ levelOfStudy }}</p>
    <p>courseTags {{ courseTags }}</p>
    <p>country {{ country }}</p>

    {{ universities }}
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  computed: {
    ...mapGetters(["levelOfStudy", "courseTags", "country", "universities"]),
  },
  mounted() {
    console.log("fetching universtiies");
    this.$store.dispatch("fetchUniversities");
  },
};
</script>
