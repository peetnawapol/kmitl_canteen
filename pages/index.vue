<template>
  <div id="background">
    <Feature />
    <Trending />
  </div>
</template>

<script>
import Trending from '@/components/homepage/Trending'
import Feature from '@/components/homepage/Feature'

export default {
  components: {
    Feature,
    Trending
  }
}
</script>
