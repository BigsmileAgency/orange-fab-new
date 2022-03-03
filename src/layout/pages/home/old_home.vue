<template>
  <div class="main">
    <!-- <header-sub mainTitle="Orange Fab Belgium & Luxemburg <br><span>Start-up accelerator program</span>"/> -->
    <header-sub mainTitle="Join our Twitter Network<br><a href='#' class='header_button'>Click here to apply</a></span>"/>

    <el-main class="container" ref="mainContainer">
      <div id="whoWeAre" class="main">
        <el-main class="container">

          <div id="whyorange" class="content-layout black">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.whyOrange.title')"></h2>

              <div class="whyorange__together">
                <p class="subtitle__p">Our offer:</p>
                <div class="whyorange__together--bloc">
                  <img :src="require('@/assets/body/who/rocket.jpg')" alt="">
                  <h5>Develop a business-oriented innovation project together with <span>Orange</span></h5>
                </div>
              </div>

              <p class="subtitle__p" v-html="$t('pages.whoWeAre.whyOrange.subtitle')"></p>

              <div class="grid">
                <el-col class="whyorange__content" v-for="(list, i) in this.$t('pages.whoWeAre.whyOrange.blocs')" :key="i">
                  <img :class="'img--'+ list.type" :src="require('@/assets/body/who/'+ list.type +'.svg')" alt />
                  <div class="whyorange__content--title">
                    <h4>{{ list.title }}</h4>
                  </div>
                  <ul>
                    <li v-for="(list, index) in list.list" :key="index" v-html="list"></li>
                  </ul>
                </el-col>
              </div>

            </el-row>
          </div>

          <keys/>

          <div id="apply" class="content-layout white apply">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.apply.title')" style="margin-bottom: 30px"></h2>

              <apply/>
            </el-row>
          </div>

          <div id="business" class="content-layout black" v-view.once="onceHandler">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.business.title')"></h2>

              <el-col :xs="24" :sm="8" :md="4"  v-for="(bloc, i) in this.$t('pages.whoWeAre.business.acceleration')" :key="i">
                <span ref="num" class="numb" :class="bloc.color" :data-value="bloc.value">0</span>
                <h6>{{ bloc.title }}</h6>
              </el-col>
            </el-row>

            <el-row class="content quote">
              <q>
                <i>{{ $t("pages.whoWeAre.business.quote") }}</i>
              </q>
              <div class="from">
                <img :src="require('../../../assets/body/who/from.png')" alt />
                <p><span>Juliette Malherbe</span><br/>Head of Orange Fab</p>
              </div>
            </el-row>
          </div>

          <div id="previous" class="previous content-layout black">
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

          <div id="international" class="content-layout white">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.international.title')"></h2>
              <p v-html="$t('pages.whoWeAre.international.subTitle')"></p>
              <img :src="require('@/assets/body/who/map.png')" alt />
            </el-row>
          </div>

          <div id="home" class="content-layout black">
            <el-row>
              <el-col class="content" :md="24">
                <section>
                  <iframe width="100%" height="100%" class='iframe-home' src="https://www.youtube.com/embed/FBb8i3qmpNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <iframe width="100%" height="100%" class='iframe-home' src="https://www.youtube.com/embed/x8QAUXlOWGA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </section>
              </el-col>
            </el-row>
          </div>

        </el-main>
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
