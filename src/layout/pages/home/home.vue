<template>
  <div class="main">
    <!-- <header-sub mainTitle="Orange Fab Belgium & Luxemburg <br><span>Start-up accelerator program</span>"/> -->
    <header-sub mainTitle="Apply for Season 5<br><a href='/applynow' class='header_button'>Click here</a></span>" :style="{backgroundImage: 'url(' + require('@/assets/body/header_home.jpg') + ')'}"/>

    <el-main class="container" ref="mainContainer">
      <div id="whoWeAre" class="main">


          <!--<keys/>-->

          <div id="welcome" class="content-layout white apply">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.welcome.title')" style="margin-bottom: 30px"></h2>
              <!-- <h3 class="subtitle" v-html="$t('pages.whoWeAre.welcome.subtitle')" style="margin-bottom: 30px"></h3> -->
              <p class="subtext" v-html="$t('pages.whoWeAre.welcome.text')" style="margin-bottom: 30px"></p>
              <iframe width="100%" height="100%" class='iframe-home' src="https://www.youtube.com/embed/FBb8i3qmpNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </el-row>
          </div>
          <!--  -->
          <!--  -->
          <div id="season5" class="content-layout white" v-view.once="onceHandler">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.season5.title')" style="margin-bottom: 30px"></h2>
              <p class="subtext" v-html="$t('pages.whoWeAre.season5.subtitle')" style="margin-bottom: 30px"></p>
              <img class="theme_picture" :src="require('@/assets/body/theme.jpg')">
              <a class="cta bordered" :href="$t('pages.ourprogram.ServiceOffer.url')" v-html="$t('pages.ourprogram.ServiceOffer.cta')"></a>
            </el-row>
          </div>
          <!--  -->
          <!--  -->
          <div id="apply" class="content-layout black apply">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.apply.title')" style="margin-bottom: 30px"></h2>

              <apply/>
              <a class="cta" :href="$t('pages.whoWeAre.apply.url')" v-html="$t('pages.whoWeAre.apply.cta')"></a>
            </el-row>
          </div>
          <!--  -->
          <!--  -->
          <div id="business" class="content-layout white" v-view.once="onceHandler">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.business.title')"></h2>

              <el-col :xs="24" :sm="8" :md="4"  v-for="(bloc, i) in this.$t('pages.whoWeAre.business.acceleration')" :key="i">
                <span ref="num" class="numb" :class="bloc.color" :data-value="bloc.value">0</span>
                <h6>{{ bloc.title }}</h6>
              </el-col>
            </el-row>
          </div>
          <!--  -->
          <!--  -->
          <div id="previous" class="previous content-layout white">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.previous.title')"></h2>

              <div class="grid">
                <div class="previous__content" v-for="(bloc, i) in this.$t('pages.whoWeAre.previous.blocs')" :key="i">
                  <img :src="require('@/assets/body/'+ bloc.image +'.png')" alt />
                  <div class="previous__content--txt">
                    <p v-html="bloc.txt"></p>
                    <p class="position" v-html="bloc.position"></p>
                  </div>
                </div>
              </div>
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

          <!-- <div id="international" class="content-layout white">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.international.title')"></h2>
              <p v-html="$t('pages.whoWeAre.international.subTitle')"></p>
              <img :src="require('@/assets/body/who/map.png')" alt />
            </el-row>
          </div> -->

          <!-- <div id="home" class="content-layout black">
            <el-row>
              <el-col class="content" :md="24">
                <section>
                  <iframe width="100%" height="100%" class='iframe-home' src="https://www.youtube.com/embed/FBb8i3qmpNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <iframe width="100%" height="100%" class='iframe-home' src="https://www.youtube.com/embed/x8QAUXlOWGA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </section>
              </el-col>
            </el-row>
          </div> -->

      </div>
    </el-main>
  </div>
</template>

<script>
import { TweenMax } from "gsap/all";
import apply from "../../components/apply.vue";
import keys from "../../components/keys.vue";
import headerSub from "../../components/headerSub.vue";
export default {
  name: "homeLayout",
  methods: {
    onceHandler(e) {
      let arr = Object.values(this.$refs.num);

      arr.forEach(function(item) {
        var counter = { var: 0 };
        let value = item.dataset.value;
        TweenMax.to(counter, 3, {
          var: value,
          onUpdate: function() {
            item.innerHTML = Math.ceil(counter.var);
          },
          ease: Circ.easeOut
        });
      });
    }
  },
  components: {
    apply,
    keys,
    headerSub
  },
};
</script>
