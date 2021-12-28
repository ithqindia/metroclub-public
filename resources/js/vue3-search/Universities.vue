<template>
  <div>
    <h1>Universities found</h1>
    <div class="row">
      <div class="row g-10 pb-10">
        <template v-if="universities">
          <template v-for="university in universities" :key="university.uuid">
            <university-card :university="university"></university-card>
          </template>
        </template>
        <template v-else>
          <h1>No data found</h1>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import UniversityCard from "./components/UniversityCard.vue";
import Axios from "axios";

export default {
  components: {
    "university-card": UniversityCard,
  },
  data() {
    return {
      universities: null,
    };
  },
  created() {
    console.log(this.$store.state);
    Axios.get(
      `/api/v1/universities/${this.$store.state.country}/${this.$store.state.levelOfStudy}/${this.$store.state.courseTag}/all`
    ).then((res) => {
      this.universities = res.data;
      console.log(
        "ng-aw ~ file: Universities.vue ~ line 33 ~ ).then ~ res.data",
        res.data
      );
    });
  },
};
</script>
