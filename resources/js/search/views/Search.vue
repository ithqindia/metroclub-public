<template>
  <div class="mt-5">
    <div v-if="countries">
      <h4 class="mt-5">Country</h4>
      <v-select
        v-model="formData.country"
        :options="countries"
        :reduce="(item) => item.uuid"
        v-on:change="setLocalStorage"
        label="country"
      />
    </div>

    <div v-if="levelOfStudies">
      <h4 class="mt-5">Level of study</h4>
      <v-select
        v-model="formData.levelOfStudy"
        :options="levelOfStudies"
        :reduce="(item) => item.uuid"
        v-on:change="setLocalStorage"
        label="major"
      />
    </div>

    <div v-if="courseTags">
      <h4 class="mt-5">Course</h4>
      <v-select
        multiple
        v-model="formData.courseTags"
        :options="courseTags"
        :reduce="(item) => item.id"
        v-on:change="setLocalStorage"
        label="name"
      />
    </div>

    <div class="d-grid">
      <button
        class="btn btn-primary my-10"
        type="button"
        v-on:click="searchUniversities"
      >
        Find the Universities
      </button>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
import _ from "lodash";

export default {
  data() {
    return {
      countries: null,
      levelOfStudies: null,
      courseTags: null,
      formData: {
        country: null,
        levelOfStudy: null,
        courseTags: null,
      },
    };
  },
  mounted() {
    Axios.get("/api/v1/countries").then((res) => {
      this.countries = res.data;
    });
    Axios.get("/api/v1/level-of-studies").then((res) => {
      this.levelOfStudies = res.data;
    });
    Axios.get("api/v1/course-tags").then((res) => {
      this.courseTags = res.data;
    });
    this.getLocalStorage();
  },
  methods: {
    searchUniversities() {
      this.$store.commit("setCountry", this.formData.country);
      this.$store.commit("setLevelOfStudy", this.formData.levelOfStudy);
      this.$store.commit("setCourseTag", this.formData.courseTags);
      this.$router.push("universities");
    },

    setLocalStorage() {
      localStorage.setItem("vuex", JSON.stringify(this.formData));
    },
    getLocalStorage(key = null) {
      if (localStorage.getItem("vuex") !== null) {
        let storedForm = "";
        try {
          storedForm = JSON.parse(localStorage.getItem("vuex"));
        } catch (e) {
          return null;
        }
        console.log(
          "ng-aw ~ file: Search.vue ~ line 99 ~ getLocalStorage ~ storedForm",
          storedForm
        );
        if (storedForm) {
          this.formData = storedForm;
          this.formData.courseTags = storedForm.courseTags
            .split("|")
            .map((item) => Number(item));
        }
      }
      return null;
    },
  },
};
</script>
