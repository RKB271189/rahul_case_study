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
                <div class="row" v-if="!loading">
                  <paginate
                    :pageCount="product.last_page"
                    :click-handler="paginateCallback"
                    :prevText="'Prev'"
                    :nextText="'Next'"
                    :containerClass="'pagination'"
                    class="pagination"
                    :value="product.current_page"
                  ></paginate>
                </div>
                <div class="row" v-if="!loading">
                  <div
                    class="col-md-3"
                    v-for="(details,index) in product.products"
                    v-bind:key="index"
                  >
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img
                            class="profile-user-img img-fluid img-circle"
                            src="/images.jpeg"
                            alt="User profile picture"
                          />
                        </div>
                        <h3 class="profile-username text-center">
                          {{ details.title }}
                        </h3>
                        <p class="text-muted text-center">
                          {{ details.concept }}
                        </p>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Author </b>
                            <a class="float-right">{{ details.authors[0] }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Publication Date</b>
                            <a class="float-right">{{
                              details.publication_date
                            }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Tool </b>
                            <a class="float-right" v-if="details.tool">{{
                              details.tool
                            }}</a>
                            <a class="float-right" v-else>-</a>
                          </li>
                          <li class="list-group-item">
                            <b>Language </b>
                            <a class="float-right" v-if="details.language">{{
                              details.language
                            }}</a>
                            <a class="float-right" v-else>-</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
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
    this.fetchproduct()
      .then((result) => {})
      .catch((error) => {});
  },
  destroyed() {
    this.resetstate();
  },
  computed: {
    ...mapGetters("PacktIndex", ["loading", "product"]),
  },
  watch: {},
  methods: {
    ...mapActions("PacktIndex", [
      "resetstate",
      "fetchproduct",
      "fetchproductperpage",
    ]),
    paginateCallback(pagenumber) {
      this.fetchproductperpage(pagenumber);
    },
  },
};
</script>
<style>
.pagination a {
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd;
  background-color: white;
  color:blue !important;
}

.pagination a.active {
  background-color: green;
}

.pagination a:hover:not(.active) {
  background-color: yellow;
  color: black;
}

.pagination a:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.pagination a:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}
.pagination li {
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd;
  color: white;
  background-color: white;
  font-size: 1em;
}
.pagination li.pagination-active {
  background-color: green;
}

.pagination li:hover:not(.active) {
  background-color: yellow;
}
</style>
