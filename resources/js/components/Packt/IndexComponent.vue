<template>
  <section class="content pt-3">
    <div class="container-fluid">
      <div class="content-wrapper">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <!-- Header of the page Apply cardprops details -->
              <cardheader-component
                :headerprops="headerprops"
              ></cardheader-component>
              <div class="card-body">
                <!-- Full screen loader -->
                <loadingoverlay-component
                  v-if="loading"
                ></loadingoverlay-component>
                <!-- Simple loader -->
                <!-- <loadingtable-component v-if="loading"></loadingtable-component> -->
                <!-- Product Summary Here -->
                <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      headerprops: {
        headername: "Product - Details",
        issummary: false,
      },
    };
  },
  created() {
    this.fetchproduct();
  },
  destroyed() {
    this.resetstate();
  },
  computed: {
    ...mapGetters("PacktIndex", ["loading", "product"]),
  },
  methods: {
    ...mapActions("PacktIndex", ["resetstate", "fetchproduct"]),
  },
};
</script>
<style scoped>
</style>
