<template>
    <div class="mt-5">
        <span v-if="countries">
            <!-- <v-select :options="countries" label="country" /> -->
        </span>
        <v-select
            v-model="selected"
            :reduce="(option) => option.id"
            :options="[
                { label: 'One', id: 1 },
                { label: 'Two', id: 2 },
            ]"
        />

        <pre>{{ countries }}</pre>
        <pre>{{ levelOfStudies }}</pre>
        <pre>{{ courseTags }}</pre>
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

export default {
    created() {
        this.getLocalStorage();
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
    },
    // components: { ElFormItem, ElInput, ElForm, ElCol },
    data() {
        return {
            levelOfStudies: null,
            countries: null,
            courseTags: null,
            formData: {
                country: "",
                levelOfStudy: "",
                courseTag: "",
            },
        };
    },
    methods: {
        countryChange(id) {
            this.saveForm();
        },
        levelOfStudyChange(id) {
            this.saveForm();
        },
        courseTagChange(id) {
            this.saveForm();
        },
        saveForm() {
            localStorage.setItem("formData", JSON.stringify(this.formData));
        },

        getLocalStorage(key = null) {
            if (localStorage.getItem("formData") !== null) {
                let storedForm = "";
                try {
                    storedForm = JSON.parse(localStorage.getItem("formData"));
                } catch (e) {
                    return null;
                }
                if (storedForm) {
                    this.formData = storedForm;
                }
            }
            return null;
        },
        searchUniversities() {
            console.log("formdata", this.formData);
            this.$store.commit("setCountry", this.formData.country);
            this.$store.commit("setLevelOfStudy", this.formData.levelOfStudy);
            this.$store.commit("setCourseTag", this.formData.courseTag);
            this.$router.push("universities");
        },
    },
};
</script>
<style>
.el-select {
    width: 100%;
}
</style>
