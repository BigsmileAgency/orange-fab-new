<template>
  <div class="main">
    <!-- <header-page mainTitle="Our start-ups"/>     -->
    <header-sub mainTitle="Our start-ups" :style="{backgroundImage: 'url(' + require('@/assets/body/header_startup.jpg') + ')'}" />
  

    <el-main class="container" ref="mainContainer">
      <div id="startup" class="main">
        <div class="content-layout white">
          <el-row class="content">            
            <h2 class="subtitle" v-html="$t('pages.startup.title')" style="margin-bottom: 0px"></h2>
            <h3 class="subtitle" v-html="$t('pages.startup.subtitle')" style="margin-bottom: 30px"></h3>
            <el-col class="" :md="24">
              <!-- <el-row>
                <el-col :md="24">
                  <h2 class="subtitle">{{$t('pages.startup.title')}}</h2>
                </el-col>
              </el-row> -->

              <el-row class="alumni__blocs" :gutter="20">
                <el-col :xs="{span : 24, offset : 0}" :sm="12" :md="8" class="start-content" v-for="(bloc, i) in this.$t('pages.startup.blocs')" :key="i">
                  <a :href="bloc.link" target="_blank">
                    <img :src="require('@/assets/body/logo/'+ bloc.image +'.jpg')" alt>
                  </a>
                  <el-row class="season-bot">
                    <el-col :xs="12" :md="12">
                      <a class="cta" :href="bloc.link" target="_blank">View more</a>
                    </el-col>
                    <el-col class="season" :xs="12" :md="12">Season {{ bloc.season }}</el-col>
                  </el-row>
                </el-col>
              </el-row>

            </el-col>
          </el-row>
        </div>
        <div id="business" class="content-layout white" v-view.once="onceHandler">
          <el-row class="content">
            <h2 class="subtitle" v-html="$t('pages.whoWeAre.season4.title')"></h2>
            <el-col :xs="24" :sm="12" :md="12"  v-for="(bloc, i) in this.$t('pages.whoWeAre.season4.acceleration1')" :key="i">
              <div class="mipple_container">
                <svg class="mipple1" v-for="(n, index) in 10" xmlns="http://www.w3.org/2000/svg" width="24.947" height="63.729" viewBox="0 0 24.947 63.729" style="opacity: .2">
                  <g id="Groupe_78" data-name="Groupe 78" transform="translate(-5.007 -8.569)">
                    <path id="Groupe_78" fill="#50be87" d="M30,31.6v13.6c0,1.3-1,2.3-2.3,2.3l0,0
                      c-1.3,0-2.3-1-2.3-2.3V32.7c0-0.2-0.2-0.4-0.4-0.4l0,0c-0.2,0-0.4,0.2-0.4,0.4v36.4c0,1.8-1.4,3.2-3.2,3.2c0,0,0,0,0,0l0,0
                      c-1.8,0-3.2-1.4-3.2-3.2l0,0V49.7c0-0.3-0.3-0.6-0.6-0.6l0,0c-0.3,0-0.6,0.3-0.6,0.6v19.5c0,1.8-1.4,3.2-3.2,3.2c0,0,0,0,0,0l0,0
                      c-1.8,0-3.2-1.4-3.2-3.2l0,0V32.5c0-0.2-0.2-0.4-0.4-0.4l0,0c-0.2,0-0.4,0.2-0.4,0.4v12.7c0,1.3-1,2.3-2.3,2.3l0,0
                      c-1.3,0-2.3-1-2.3-2.3V31.6c0-4.8,3.9-8.7,8.7-8.7h7.5C26,22.9,30,26.8,30,31.6C30,31.6,30,31.6,30,31.6z M17.5,8.6
                      c3.7,0,6.7,3,6.7,6.7s-3,6.7-6.7,6.7s-6.7-3-6.7-6.7S13.8,8.6,17.5,8.6z"/>
                  </g>
                </svg>
              </div>
              <span ref="num" class="numb" :class="bloc.color" :data-value="bloc.value">0</span></span><span class="numb green">%</span>
              <h4>{{ bloc.title }}</h4>
            </el-col>
            <el-col :xs="24" :sm="12" :md="12"  v-for="(bloc, i) in this.$t('pages.whoWeAre.season4.acceleration2')" :key="i">
              <div class="mipple_container">
                <svg class="mipple2" v-for="(n, index) in 9" xmlns="http://www.w3.org/2000/svg" width="24.947" height="63.729" viewBox="0 0 24.947 63.729" style="opacity: .2">
                  <g id="Groupe_78" data-name="Groupe 78" transform="translate(-5.007 -8.569)">
                    <path id="Groupe_78" fill="#9164CD" d="M30,31.6v13.6c0,1.3-1,2.3-2.3,2.3l0,0
                      c-1.3,0-2.3-1-2.3-2.3V32.7c0-0.2-0.2-0.4-0.4-0.4l0,0c-0.2,0-0.4,0.2-0.4,0.4v36.4c0,1.8-1.4,3.2-3.2,3.2c0,0,0,0,0,0l0,0
                      c-1.8,0-3.2-1.4-3.2-3.2l0,0V49.7c0-0.3-0.3-0.6-0.6-0.6l0,0c-0.3,0-0.6,0.3-0.6,0.6v19.5c0,1.8-1.4,3.2-3.2,3.2c0,0,0,0,0,0l0,0
                      c-1.8,0-3.2-1.4-3.2-3.2l0,0V32.5c0-0.2-0.2-0.4-0.4-0.4l0,0c-0.2,0-0.4,0.2-0.4,0.4v12.7c0,1.3-1,2.3-2.3,2.3l0,0
                      c-1.3,0-2.3-1-2.3-2.3V31.6c0-4.8,3.9-8.7,8.7-8.7h7.5C26,22.9,30,26.8,30,31.6C30,31.6,30,31.6,30,31.6z M17.5,8.6
                      c3.7,0,6.7,3,6.7,6.7s-3,6.7-6.7,6.7s-6.7-3-6.7-6.7S13.8,8.6,17.5,8.6z"/>
                  </g>
                </svg><svg width="24.947" height="63.729" viewBox="0 0 24.947 63.729" style="opacity: .2">
                  <g id="Groupe_78" data-name="Groupe 78" transform="translate(-5.007 -8.569)">
                    <path id="Groupe_78" fill="#9164CD" d="M30,31.6v13.6c0,1.3-1,2.3-2.3,2.3l0,0
                      c-1.3,0-2.3-1-2.3-2.3V32.7c0-0.2-0.2-0.4-0.4-0.4l0,0c-0.2,0-0.4,0.2-0.4,0.4v36.4c0,1.8-1.4,3.2-3.2,3.2c0,0,0,0,0,0l0,0
                      c-1.8,0-3.2-1.4-3.2-3.2l0,0V49.7c0-0.3-0.3-0.6-0.6-0.6l0,0c-0.3,0-0.6,0.3-0.6,0.6v19.5c0,1.8-1.4,3.2-3.2,3.2c0,0,0,0,0,0l0,0
                      c-1.8,0-3.2-1.4-3.2-3.2l0,0V32.5c0-0.2-0.2-0.4-0.4-0.4l0,0c-0.2,0-0.4,0.2-0.4,0.4v12.7c0,1.3-1,2.3-2.3,2.3l0,0
                      c-1.3,0-2.3-1-2.3-2.3V31.6c0-4.8,3.9-8.7,8.7-8.7h7.5C26,22.9,30,26.8,30,31.6C30,31.6,30,31.6,30,31.6z M17.5,8.6
                      c3.7,0,6.7,3,6.7,6.7s-3,6.7-6.7,6.7s-6.7-3-6.7-6.7S13.8,8.6,17.5,8.6z"/>
                  </g>
                </svg>
              </div>
              <span ref="num" class="numb" :class="bloc.color" :data-value="bloc.value">0</span><span class="numb mauve">/10</span>
              <h4>{{ bloc.title }}</h4>
            </el-col>
          </el-row>
        </div>

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

        <div id="who" class="content-layout white">
          <el-row class="content">
            <h2 class="subtitle" v-html="$t('pages.startup.video.title')" style="margin-bottom: 30px;"></h2> 
            <el-row :gutter="20">
              <el-col :xs="{span : 24, offset : 0}" :md="12" v-for="(video, i) in this.$t('pages.startup.videos')" :key="i">
                <video @change="Vue.$forceUpdate()" :src="video.src" type="video/mp4" width="100%" controls :poster="require('@/assets/body/video/poster'+ video.poster +'.jpg')"
                >Your browser does not support the video tag.</video>
              </el-col>
            </el-row>      
            <a class="cta bordered" :href="$t('pages.startup.actuality.url')" v-html="$t('pages.startup.actuality.cta')"></a>         
          </el-row>
        </div>

      </div>
    </el-main>
  </div>
</template>


<script>
import headerSub from "../../components/headerSub.vue";
export default {
  name: "startUpsLayout",
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
        TweenMax.staggerTo(".mipple1", 0.3, {opacity:1}, 0.3);
        TweenMax.staggerTo(".mipple2", 0.3, {opacity:1}, 0.35);
      });
    }
  },
  components: {
    headerSub
  },
};
</script>
