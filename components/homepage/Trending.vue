<template>
  <b-container fluid="true">
    <b-row class="p-3 d-flex h-100 pb-5 pt-0">
      <!-- Row for Recommended Meal -->
      <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-award mr-2" />Recommended Meal
      </h2>
      <span class="w-100 mb-3" />
      <b-col lg="3" md="6" sm="6" class="pl-2 pr-2 mb-4">
        <a href="#" class="trending">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ4nfZ0iFaRkYfX7SRH5IEtIL1FeF3SXqEfCd8dy59SwcQG7TC9" alt="Food Name" class="img-fluid rounded hoverable">
          <h3>ข้าวผัดกะเพราหมูสับ</h3>
          <p />
        </a>
      </b-col>
      <b-col lg="3" md="6" sm="6" class="pl-2 pr-2 mb-4">
        <a href="#" class="trending">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRpRQNJPcGo7iKWQkQEXGtEIZvuHB5TUKjZG-8l0GlNj5V5z9GO" alt="Food Name" class="img-fluid rounded hoverable">
          <h3>สปาเก็ตตี้ไก่</h3>
          <p />
        </a>
      </b-col>
      <b-col lg="3" md="6" sm="6" class="pl-2 pr-2 mb-4">
        <a href="#" class="trending">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ4nfZ0iFaRkYfX7SRH5IEtIL1FeF3SXqEfCd8dy59SwcQG7TC9" alt="Food Name" class="img-fluid rounded hoverable">
          <h3>ข้าวผัดกะเพราหมูสับ</h3>
          <p />
        </a>
      </b-col>
      <b-col lg="3" md="6" sm="6" class="pl-2 pr-2 mb-4">
        <a href="#" class="trending">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ4nfZ0iFaRkYfX7SRH5IEtIL1FeF3SXqEfCd8dy59SwcQG7TC9" alt="Food Name" class="img-fluid rounded hoverable">
          <h3>ข้าวผัดกะเพราหมูสับ</h3>
          <p />
        </a>
      </b-col>
      <!-- Row for FastFood -->
      <h2 class="cust-head pl-2 pr-3">
        <i class="fas fa-hamburger mr-2" />Fast Food
      </h2>
      <span class="w-100 mb-3" />
      <b-col lg="3" md="6" sm="6" class="pl-2 pr-2 mb-4">
        <a href="#" class="trending">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ4nfZ0iFaRkYfX7SRH5IEtIL1FeF3SXqEfCd8dy59SwcQG7TC9" alt="Food Name" class="img-fluid rounded hoverable">
          <h3>ข้าวผัดกะเพราหมูสับ</h3>
          <p />
        </a>
      </b-col>
      <b-col lg="3" md="6" sm="6" class="pl-2 pr-2 mb-4">
        <a href="#" class="trending">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ4nfZ0iFaRkYfX7SRH5IEtIL1FeF3SXqEfCd8dy59SwcQG7TC9" alt="Food Name" class="img-fluid rounded hoverable">
          <h3>ข้าวผัดกะเพราหมูสับ</h3>
          <p />
        </a>
      </b-col>
      <b-col lg="3" md="6" sm="6" class="pl-2 pr-2 mb-4">
        <a href="#" class="trending">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ4nfZ0iFaRkYfX7SRH5IEtIL1FeF3SXqEfCd8dy59SwcQG7TC9" alt="Food Name" class="img-fluid rounded hoverable">
          <h3>ข้าวผัดกะเพราหมูสับ</h3>
          <p />
        </a>
      </b-col>
      <b-col lg="3" md="6" sm="6" class="pl-2 pr-2 mb-4">
        <a href="#" class="trending">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ4nfZ0iFaRkYfX7SRH5IEtIL1FeF3SXqEfCd8dy59SwcQG7TC9" alt="Food Name" class="img-fluid rounded hoverable">
          <h3>ข้าวผัดกะเพราหมูสับ</h3>
          <p />
        </a>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>

export default {
}
</script>

<style scoped>

.color-wh {
  background-color: rgb(76,76,76);
  height: 145px;
  margin: .5%;
}

.cust-head {
  line-height: 1.25vw;
  font-size: 1.35rem;
  font-weight: 500;
  color: rgb(243, 148, 34);
  text-transform: uppercase;
}

a.trending {
  display:block;
  width: 100%;
}

a.trending img {
  width: 100%;
  object-fit: cover;
  margin-bottom: 1.2rem;
}

a.trending img:hover {
  opacity: .6;
}

a.trending:hover h3 {
  color: rgba(243, 148, 34, .8);
  transition: .6s ease-in;
}

a.trending h3 {
  color: rgb(211,217,225);
  font-family: Roboto, Kanit;
  font-size: 1.25rem;
  font-weight: 400;
  transition: .6s ease-out;
}

/** Extra small devices (portrait phones, less than 576px) **/
@media (max-width: 575.98px) {
  a.trending img {
    height: 52vw !important;
  }
 }

/** Small devices (landscape phones, 576px and up) **/
@media (min-width: 576px) and (max-width: 767.98px) {
  a.trending img {
    height: 30vw !important;
  }
 }

/**  Medium devices (tablets, 768px and up) **/
@media (min-width: 768px) and (max-width: 991.98px) {
  a.trending img {
    height: 26vw !important;
  }
 }

/** Large devices (desktops, 992px and up) **/
@media (min-width: 992px) and (max-width: 1199.98px) {
  a.trending img {
    height: 16vw !important;
  }
}

/** Extra large devices (large desktops, 1200px and up) **/
@media (min-width: 1200px) {
  a.trending img {
    height: 14vw !important;
  }
}

</style>
