<template>
  <div class="col-md-4">
    <div class="card-xl-stretch me-md-6">
      <a href="#">
        <div
          class="
            bgi-no-repeat bgi-position-center bgi-size-cover
            card-rounded
            min-h-175px
          "
          v-bind:style="{
            backgroundImage: 'url(' + university.logo + '?v=3)',
          }"
        ></div>
      </a>
      <div class="mt-5">
        <a
          href="#"
          class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base"
        >
          {{ university.name }}
        </a>
        <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">
          {{ university.description.substring(0, 100) + "..." }}
          <br />
        </div>
        <div class="flex flex-center">
          <div>
            <img v-bind:src="university.country.flag" style="width: 100px" />
            <div class="text-gray-600 text-dark">{{ university.city }}</div>
          </div>
        </div>
        <div class="fs-6 fw-bolder mt-5 d-flex flex-center">
          <template v-if="university.wished">
            <button
              class="btn btn-secondary"
              v-on:click="removeFromWishList(university.uuid)"
            >
              <i class="bi bi-heart-fill fs-3" style="color: white"></i> Remove
            </button>
          </template>
          <template v-else>
            <button
              class="btn btn-primary"
              v-on:click="addToWishList(university.uuid)"
            >
              <i class="bi bi-heart fs-3"></i> Shortlist
            </button>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
import { useToast } from "vue-toastification";
const toast = useToast();

export default {
  props: ["university"],
  methods: {
    addToWishList(id) {
      console.log(id, this.$store.state.courseTag);
      const vm = this;
      Axios.post("/api/v1/wishlist/university", {
        university: id,
        courseTags: this.$store.state.courseTag,
      })
        .then((res) => {
          this.$store.commit("setErrors", []);
          console.log(
            "ng-aw ~ file: UniversityCard.vue ~ line 60 ~ addToWishList ~ res",
            res
          );
          vm.university.wished = true;
          toast.success("University added to your shortlist");
        })
        .catch((err) => {
          console.log(
            "ng-aw ~ file: UniversityCard.vue ~ line 63 ~ addToWishList ~ err",
            err
          );
          console.log(err.response.status);
          if (err.response.status == 401) {
            console.log("please login");
            toast.error("You need to be logged in to shortlist university");
          }
          this.$store.commit("setErrors", err.message);
        });
    },
    removeFromWishList(id) {
      console.log(id, this.$store.state.courseTag);
      const vm = this;
      Axios.delete("/api/v1/wishlist/university/" + id)
        .then((res) => {
          console.log(
            "ng-aw ~ file: UniversityCard.vue ~ line 95 ~ .then ~ res",
            res
          );
          vm.university.wished = false;
          toast.warning("University removed from your shortlist");
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
            toast.error("You need to be logged in to shortlist university");
          }
          this.$store.commit("setErrors", err.message);
        });
    },
  },
};
</script>
