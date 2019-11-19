<template>
  <b-container fluid="true" class="pl-0 pr-0 pt-5">
    <h2 class="text-white cust-head ml-5">
      Recommended Meal
    </h2>
    <no-ssr placeholder="loading...">
      <vueper-slides
        :visible-slides="5"
        slide-multiple
        :slide-ratio="5/17"
        :breakpoints="{ 600: { visibleSlides: 2}, 900: { visibleSlides: 4 }, 1200: { visibleSlides: 6 } }"
        :bullets="false"
        :slide-content-outside="false"
        :slide-image-inside="true"
        :arrows-outside="false"
        :disable-arrows-on-edges="true"
        :parallax="false"
        :touchable="true"
        :dragging-distance="70"
        class="mb-5 mt-2 no-shadow"
      >
        <b-row class="ml-4 pl-2 d-flex h-100 pb-5 pt-2">
          <b-col>
            <vueper-slide
              v-for="(slide, i) in slide1"
              :key="i"
              :image="slide.image"
              :link="slide.link"
              :title="slide.title"
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
        :slide-ratio="1/6"
        :breakpoints="{ 600: { visibleSlides: 3 }, 900: { visibleSlides: 4 }, 1200: { visibleSlides: 6 } }"
        :bullets="false"
        :slide-content-outside="true"
        :slide-image-inside="true"
        :arrows-outside="false"
        :disable-arrows-on-edges="true"
        :parallax="false"
        :touchable="true"
        :dragging-distance="70"
        class="mb-5 mt-2 no-shadow"
      >
        <b-row class="ml-4 pl-2 d-flex h-100 pb-5 pt-2">
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
          image: 'http://media.ginraidee.s3.amazonaws.com/restaurant/24009/rst_lres_24009_F_56769.jpg',
          link: '#1',
          title: 'ข้าวผัดกระเพาหมู'
        },
        {
          image: 'https://r-han.com/wp-content/uploads/2019/03/%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%A7%E0%B8%9C%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B8%E0%B9%89%E0%B8%871-780x439.jpg',
          link: '#3',
          title: 'ข้าวผัดกุ้ง'
        },
        {
          image: 'https://food.mthai.com/app/uploads/2016/01/Hainanese-chicken-rice.jpg',
          link: '#2',
          title: 'ข้าวมันไก่'
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
}
</script>

<style scoped>

.color-wh {
  background-color: rgb(76,76,76);
  height: 145px;
  margin: .5%;
}

.vueperslide {
  filter:contrast(110%) saturate(1) sepia(10%);
}

.vueperslide:hover {
  transform: scale(1.2);
  transition: all .5s;
  z-index: 33;
}

.cust-head {
  line-height: 1.25vw;
  font-size: 1.35rem;
  font-weight: 500;
}

a.vueperslide {
  color:#fafafa;
  font-size: 1.4rem;
  font-weight: 500;
  font-family: Kanit;
  line-height: 1.56rem;
  text-shadow: 0 1.5px #292929;
}

a.vueperslide:hover {
  width: 100%;
  height: 100%;
}

.vueperslide__content-wrapper:not(.vueperslide__content-wrapper--outside-top):not(.vueperslide__content-wrapper--outside-bottom)::before {
  display: none;
}

</style>
