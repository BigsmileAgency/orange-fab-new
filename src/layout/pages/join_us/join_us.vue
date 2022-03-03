<template>
  <div id="join" class="main">
    <!-- <el-main class="header-top"></el-main> -->
    <header-sub mainTitle="Apply now"/>

    <el-main class="container">
      <div class="content-layout white apply">
        <el-row class="content">
          <!-- <h2 class="subtitle" v-html="$t('pages.whoWeAre.apply.subtitle')"></h2> -->
          <!-- <h2 class="subtitle" v-html="$t('pages.whoWeAre.apply.title')"></h2> -->

          <apply/>
        </el-row>

        <keys/>

        <el-row id='apply' class="content">
          <steps-layout></steps-layout>
        </el-row>
      </div>
    </el-main>
  </div>
</template>

<script>
import apply from "../../components/apply.vue";
import keys from "../../components/keys.vue";
import stepsLayout from "../../steps/layout/steps";
import headerSub from "../../components/headerSub.vue";
import { TweenMax, ScrollToPlugin } from "gsap/all";
export default {
  name: "newsLayout",
  components: {
    apply,
    keys,
    stepsLayout,
    headerSub
  },
  mounted() {
    TweenMax.to(window, 2, { scrollTo: {y: '#apply', offsetY: 100}, delay: 0.75});
  }
};
</script>
