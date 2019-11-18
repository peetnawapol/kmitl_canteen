<template>
  <div id="section">
    <b-container fluid="true" class="pt-5 mb-5 pb-0 pl-4 pr-4">
      <b-row class="items-box" align-v="end">
        <!-- <div class="col-lg-12 p-5 pt-5 d-flex justify-content-center align-items-center">
          <form class="form-inline md-form form-sm active-pink-2 mt-5" style="width:100% !important;">
            <input
              class="form-control form-control-lg mr-3 w-100"
              type="text"
              placeholder="Search"
              aria-label="Search"
              autofocus
            >
            <i class="fas fa-search" aria-hidden="true" />
          </form>
        </div> -->
        <b-col lg="12" align-self="end" class="d-flex justify-content-center mt-5">
          <i class="fas fa-chevron-down text-white" />
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>

export default {
}
</script>

<style scoped>
i.fas.fa-chevron-down {
  font-size: 3rem;
}

.items-box {
  z-index: 1;
  height: 89vh;
}

.items-box h1.h1-post {
  font-size: 4.4rem;
  font-weight: 700;
  color: #fafafa !important;
  text-shadow: 0 1.5px #292929;
  word-break: break-all;
  word-wrap: break-word;
}

.color-wh {
  background-color: rgb(76,76,76);
  height: 145px;
  margin: .5%;
}

ul#item-calousel {
  list-style: none;
  width:100%;
  height: 180px;
}

ul#item-calousel li {
  display: inline-block;
  width: 123px;
}

</style>
