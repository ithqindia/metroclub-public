<template>
  <div class="mt-5">
    <h1>{{ universities.length }} Universities found</h1>
    <div style="display: flex; flex-wrap: wrap">
      <university-card
        v-for="university in universities"
        :key="university.uuid"
        :university="university"
      ></university-card>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import UniversityCard from "../components/UniversityCard.vue";

export default {
  computed: {
    ...mapGetters(["levelOfStudy", "courseTags", "country", "universities"]),
  },
  mounted() {
    console.log("fetching universtiies");
    this.$store.dispatch("fetchUniversities");
  },
  components: {
    "university-card": UniversityCard,
  },
};
</script>
