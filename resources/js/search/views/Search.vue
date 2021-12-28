<template>
  <div class="mt-5">
    <h1>Search</h1>
<v-select :options="[12,4,2,23,32,2]"></v-select>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      countries: null,
      levelOfStudies: null,
      courseTags: null,
    };
  },
  mounted() {
    Axios.get("/api/v1/countries").then((res) => {
      console.log("ng-aw ~ file: Search.vue ~ line 13 ~ Axios.get ~ res", res);
      this.countries = res.data;
    });
    Axios.get("/api/v1/level-of-studies").then((res) => {
      this.levelOfStudies = res.data;
    });
    Axios.get("api/v1/course-tags").then((res) => {
      this.courseTags = res.data;
    });
  },
};
</script>
