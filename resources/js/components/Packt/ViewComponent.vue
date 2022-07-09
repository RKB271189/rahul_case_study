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
        headername: "Product - View",
        issummary: false,
      },
    };
  },
  created() {
    this.fetchsingleproduct();
  },
  destroyed() {
    this.resetstate();
  },
  computed: {
    ...mapGetters("PacktIndex", ["loading", "singleproduct"]),
  },
  methods: {
    ...mapActions("PacktIndex", ["resetstate", "fetchsingleproduct"]),
  },
};
</script>
<style scoped>
</style>
