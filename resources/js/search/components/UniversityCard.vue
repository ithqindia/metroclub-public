<template>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div style="border: 1px solid #c0c0c0" class="m-3">
      <div class="overlay">
        <div
          class="bgi-no-repeat bgi-position-center bgi-size-cover min-h-200px cursor-pointer"
          v-bind:style="{
            backgroundImage: 'url(' + university.logo + '?v=3)',
          }"
        ></div>
        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
          <router-link
            tag="a"
            :to="{
              name: 'university-details',
              params: {
                id: university.uuid,
              },
            }"
            class="btn btn-primary"
            >More details</router-link
          >
        </div>
      </div>

      <div class="p-3">
        <div class="line-clamp line-clamp-single">
          <router-link
            :to="{
              name: 'university-details',
              params: {
                id: university.uuid,
              },
            }"
            class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base"
          >
            {{ university.name }}</router-link
          >
        </div>
        <p class="line-clamp line-clamp-four">
          {{ university.description }}
        </p>
        <div class="text-center d-flex justify-content-center mt-3">
          <button
            class="btn btn-primary"
            v-if="!university.wished"
            v-on:click="addToWishList(university.uuid)"
          >
            <i class="bi bi-heart fs-3"></i> Shortlist
          </button>
          <button
            class="btn btn-secondary"
            v-if="university.wished"
            v-on:click="removeFromWishList(university.uuid)"
          >
            <i class="bi bi-trash fs-3 text-white"></i> Remove
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  props: ["university"],
  methods: {
    addToWishList(id) {
      console.log(id, this.$store.state.courseTag);
      const vm = this;
      Axios.post("/web/v1/wishlist/university", {
        university: id,
        courseTags: this.$store.state.courseTags,
      })
        .then((res) => {
          this.$store.commit("setErrors", []);
          console.log(
            "ng-aw ~ file: UniversityCard.vue ~ line 60 ~ addToWishList ~ res",
            res
          );
          vm.university.wished = true;
          this.$toast.success("University added to your shortlist");
        })
        .catch((err) => {
          console.log(
            "ng-aw ~ file: UniversityCard.vue ~ line 63 ~ addToWishList ~ err",
            err
          );
          console.log(err.response.status);
          if (err.response.status == 401) {
            console.log("please login");
            this.$toast.error(
              "You need to be logged in to shortlist university"
            );
          }
          this.$store.commit("setErrors", err.message);
        });
    },
    removeFromWishList(id) {
      console.log(id, this.$store.state.courseTag);
      const vm = this;
      Axios.delete("/web/v1/wishlist/university/" + id)
        .then((res) => {
          console.log(
            "ng-aw ~ file: UniversityCard.vue ~ line 95 ~ .then ~ res",
            res
          );
          vm.university.wished = false;
          this.$toast.warning("University removed from your shortlist");
          this.$store.commit("setErrors", []);
        })
        .catch((err) => {
          console.log(
            "ng-aw ~ file: UniversityCard.vue ~ line 99 ~ removeFromWishList ~ err",
            err
          );
          console.log(err.response.status);
          if (err.response.status == 401) {
            console.log("please login");
            this.$toast.error(
              "You need to be logged in to shortlist university"
            );
          }
          this.$store.commit("setErrors", err.message);
        });
    },
  },
};
</script>
