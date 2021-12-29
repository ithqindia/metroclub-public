<template>
  <div class="mt-5">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <h2>{{ university.name }} <span v-if="university.wished"><i class="bi bi-heart-fill fs-3 text-brand-secondary"></i></span></h2>
        <p v-if="university.description"><strong>University details - </strong>{{ university.description }}</p>
        <p><strong>City</strong> {{ university.city }}</p>
        <p v-if="university.logo">
          <img v-bind:src="university.logo" class="img-fluid col-4" />
        </p>
      </div>
      <div class="col-md-6 col-sm-12">
        <h2>{{ university.country.country }}</h2>
        <img v-bind:src="university.country.flag" class="img-fluid col-4" />
        <div v-if="university.country.description">
          <strong>Country details</strong> -
          {{ university.country.description }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import _ from "lodash";

export default {
  data() {
    return {
      university: _.find(this.$store.state.universities, {
        uuid: this.$route.params.id,
      }),
    };
  },
};
</script>
