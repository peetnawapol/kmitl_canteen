<template>
  <b-container fluid="true" class="pl-0 pr-0 pt-5">
    <h2 class="text-white cust-head ml-5">
      Recommended Meal
    </h2>
    <no-ssr placeholder="loading...">
      <vueper-slides
        :visible-slides="5"
        slide-multiple
        :slide-ratio="1/10"
        :breakpoints="{ 600: { visibleSlides: 4 } }"
        :bullets="false"
        :slide-content-outside="true"
        :slide-image-inside="true"
        :arrows-outside="false"
        :disable-arrows-on-edges="true"
        :parallax="true"
        :touchable="true"
        :draggingDistance="70"
        class="mb-5 mt-3 no-shadow"
      >
        <b-row class="ml-4 pl-2 d-flex h-100">
          <b-col>
            <vueper-slide
              v-for="(slide, i) in slide1"
              :key="i"
              :image="slide.image"
              :link="slide.link"
              class="mr-1"
            />
          </b-col>
        </b-row>
      </vueper-slides>
    </no-ssr>
    <h2 class="text-white cust-head ml-5">
      Main Course
    </h2>
    <no-ssr placeholder="loading...">
      <vueper-slides
        :visible-slides="5"
        slide-multiple
        :slide-ratio="1/10"
        :breakpoints="{ 600: { visibleSlides: 4 } }"
        :bullets="false"
        :slide-content-outside="true"
        :slide-image-inside="true"
        :arrows-outside="false"
        :disable-arrows-on-edges="true"
        :parallax="true"
        :touchable="true"
        :draggingDistance="70"
        class="mb-5 mt-3 no-shadow"
      >
        <b-row class="ml-4 pl-2 d-flex h-100">
          <b-col>
            <vueper-slide
              v-for="(slide, i) in slide2"
              :key="i"
              :image="slide.image"
              :link="slide.link"
              class="mr-1"
            />
          </b-col>
        </b-row>
      </vueper-slides>
    </no-ssr>
  </b-container>
</template>
<script>
import 'vueperslides/dist/vueperslides.css'
import { VueperSlides, VueperSlide } from 'vueperslides'

export default {
  components: {
    VueperSlides,
    VueperSlide
  },

  data () {
    return {
      slide1: [
        {
          image: 'https://placeimg.com/300/250/any?88',
          link: '#1'
        },
        {
          image: 'https://placeimg.com/300/250/any?32',
          link: '#3'
        },
        {
          image: 'https://placeimg.com/300/250/any?10',
          link: '#2'
        },
        {
          image: 'https://placeimg.com/300/250/any?35',
          link: '#5'
        },
        {
          image: 'https://placeimg.com/300/250/any?69',
          link: '#6'
        },
        {
          image: 'https://placeimg.com/300/250/any?47',
          link: '#7'
        },
        {
          image: 'https://placeimg.com/300/250/any?55',
          link: '#15'
        }
      ],
      slide2: [
        {
          image: 'https://placeimg.com/300/250/any?11',
          link: '#1'
        },
        {
          image: 'https://placeimg.com/300/250/any?12',
          link: '#3'
        },
        {
          image: 'https://placeimg.com/300/250/any?15',
          link: '#2'
        },
        {
          image: 'https://placeimg.com/300/250/any?18',
          link: '#5'
        },
        {
          image: 'https://placeimg.com/300/250/any?16',
          link: '#6'
        },
        {
          image: 'https://placeimg.com/300/250/any?17',
          link: '#7'
        }
      ]
    }
  }

  // methods: {
  //   next() {
  //     this.$refs.flickity.next();
  //   },

  //   previous() {
  //     this.$refs.flickity.previous();
  //   }
  // }
}
</script>

<style scoped>
.color-wh {
  background-color: rgb(76,76,76);
  height: 145px;
  margin: .5%;
}

.vueperslide:focus, .vueperslide:hover {
  transform: scale(1.2);
  transition: all .5s;
  z-index:33;
}

.cust-head {
  line-height: 1.25vw;
  font-size: 1.4vw;
  font-weight: 500;
}

button.vueperslides__arrow, *svg {
  color: #fff !important;
}

.vueperslides__arrow:active, .vueperslides__arrow:focus {
  outline: none !important;
}

</style>
