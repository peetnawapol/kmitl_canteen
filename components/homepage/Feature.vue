<template>
  <div id="section">
    <b-container class="pt-5 mb-5 pb-0 pl-4 pr-4 w-100">
      <b-row class="items-box" align-v="end">
        <div class="col-lg-12 p-5 pt-5 d-flex justify-content-center align-items-center wrap">
          <mdb-input
            type="text"
            label="กินอะไรดี?"
            icon="search"
            size="lg"
            outline
            class="w-100"
          />
        </div>
        <b-col lg="12" align-self="end" class="d-flex justify-content-center mt-5">
          <i class="fas fa-chevron-down text-white" />
        </b-col>
      </b-row>
    </b-container>
    <!-- 243, 148, 34 -->
  </div>
</template>

<script>
import { mdbInput } from 'mdbvue'

export default {
  components: {
    mdbInput
  }
}
</script>

<style>

.wrap {
  background-color: rgba(34, 40, 49, .6) !important;
  color: rgb(165,176,193);
  font-family: Kanit, Roboto;
}

.wrap .md-form.md-outline input[type="text"] {
  border-top:none !important;
  border-left: none;
  border-right: none;
  border-radius: 0;
  border-color: rgb(153,166,185);
  color: rgb(223,227,233);
}

.wrap .md-form.md-outline input[type="text"]+label {
  color: rgb(165,176,193);
}

.wrap .md-form.md-outline input[type="text"]:focus:not([readonly]) {
  border-radius: 4px;
  border-color: rgb(243, 148, 34);
  box-shadow: 0 0 0 1px rgb(243, 148, 34) inset;
  color: #dfe3e9;
  font-size: 1.15rem;
  padding: 14px 0 6px 12px;
}

.wrap .md-form.md-outline input[type="text"]:focus:not([readonly])+label {
  color: rgb(243, 148, 34);
}

.wrap i.prefix.active {
  color:rgb(243, 148, 34);
}

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

</style>
