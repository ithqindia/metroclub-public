<template>
  <div class="mt-5">
    <h1>Universities</h1>
    <p>levelOfStudy {{ levelOfStudy }}</p>
    <p>courseTags {{ courseTags }}</p>
    <p>country {{ country }}</p>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters(["levelOfStudy", "courseTags", "country"]),
  },
};
</script>
