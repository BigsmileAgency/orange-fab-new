<template>
  <div id="join" class="main">
    <!-- <el-main class="header-top"></el-main> -->
    <header-page mainTitle= "Apply!"/>

    <el-main class="container">
      <!--  -->
      <div class="content-layout white apply">
        <el-row id='apply' class="content">
          <h2 class="subtitle">Registrations are closed.<br/>See you <span>next year</span>.</h2>


          <!-- <steps-layout></steps-layout> -->
        </el-row>
      </div>
      <!--  -->
      <!--  -->
      <div id="contact" class="content-layout white apply">
        <el-row class="content">
          <h2 v-html="$t('pages.whoWeAre.contact.title')"></h2>
          <p v-html="$t('pages.whoWeAre.contact.address')"></p>
        </el-row>
      </div>
      <!--  -->
    </el-main>
  </div>
</template>

<script>
import apply from "../../components/apply.vue";
import keys from "../../components/keys.vue";
import stepsLayout from "../../steps/layout/steps";
import headerPage from "../../components/headerPage.vue";
import { TweenMax, ScrollToPlugin } from "gsap/all";
export default {
  name: "newsLayout",
  components: {
    apply,
    keys,
    stepsLayout,
    headerPage
  },
  mounted() {
    TweenMax.to(window, 2, { scrollTo: {y: '#apply', offsetY: 100}, delay: 0.75});
  }
};
</script>
