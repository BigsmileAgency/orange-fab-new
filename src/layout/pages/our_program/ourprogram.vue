<template>
  <div class="main">
    <!-- <header-page mainTitle= "Our program"/> -->
    <header-sub mainTitle="Our program" :style="{backgroundImage: 'url(' + require('@/assets/body/header_program.jpg') + ')'}" />
  
    <el-main class="container" ref="mainContainer">
      <div id="ourprogram" class="main">
        <!--  -->
        <div id="apply" class="content-layout white apply">
          <el-row class="content">
            <h2 class="subtitle" v-html="$t('pages.ourprogram.apply.title')" style="margin-bottom: 30px"></h2>
            <p class="intro" v-html="$t('pages.ourprogram.apply.intro')"></p>
            <!-- <img class="theme_picture" :src="require('@/assets/body/theme.jpg')"> -->

            <apply/>

            <h2 id="timeline" class="subtitle marged" v-html="$t('pages.ourprogram.timeline.title')" style="margin-bottom: 30px"></h2>
            <img class="timeline_picture" :src="require('@/assets/body/timeline.jpg')">
            <a :href="$t('pages.ourprogram.ServiceOffer.url')" class="cta bordered" v-html="$t('pages.ourprogram.ServiceOffer.cta')"></a>
          </el-row>
        </div>
        <!--  -->
        <!--  -->
        <div id="ServiceOffer" class="content-layout white">
          <el-row class="content">
            <h2 class="subtitle" v-html="$t('pages.ourprogram.ServiceOffer.title')"></h2>

            <div class="grid">
              <el-col class="ServiceOffer__content" v-for="(list, i) in this.$t('pages.ourprogram.ServiceOffer.blocs')" :key="i">
                <img :class="'img--'+ list.type" :src="require('@/assets/body/who/'+ list.type +'.svg')" alt />
                <div class="ServiceOffer__content--title">
                  <h4>{{ list.title }}</h4>
                </div>
                <ul>
                  <li v-for="(list, index) in list.list" :key="index" v-html="list"></li>
                </ul>
              </el-col>
            </div>
            <h2 class="subtitle marged" v-html="$t('pages.ourprogram.ServiceOffer.eligibility.title')"></h2>
            <ul class="eligibility_list">
              <li v-for="(condition, index) in this.$t('pages.ourprogram.ServiceOffer.eligibility.conditions')" :key="index" v-html="condition.text"></li>
            </ul>
            <div class="cta_container">
              <a :href="$t('pages.ourprogram.ServiceOffer.url')" class="cta bordered" v-html="$t('pages.ourprogram.ServiceOffer.cta')"></a>
              <a :href="$t('pages.ourprogram.ServiceOffer.url_startups')" class="cta bordered" v-html="$t('pages.ourprogram.ServiceOffer.cta_startups')"></a>
            </div>
          </el-row>
        </div>
        <!--  -->
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
  name: "ourProgramLayout",
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
