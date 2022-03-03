<template>
  <div class="main">
    <header-page mainTitle="Our start-ups"/>

    <el-main class="container" ref="mainContainer">
      <div id="startup" class="main">
        <div class="content-layout white">
          <el-row class="content">            
            <h2 class="subtitle" v-html="$t('pages.startup.title')" style="margin-bottom: 30px"></h2>
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
            <h2 class="subtitle" v-html="$t('pages.whoWeAre.business.title')"></h2>

            <el-col :xs="24" :sm="8" :md="4"  v-for="(bloc, i) in this.$t('pages.whoWeAre.business.acceleration')" :key="i">
              <span ref="num" class="numb" :class="bloc.color" :data-value="bloc.value">0</span>
              <h6>{{ bloc.title }}</h6>
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

        <div id="actuality" class="previous content-layout white">
          <el-row class="content">
            <h2 class="subtitle" v-html="$t('pages.startup.actuality.title')"></h2>              
            <a class="cta bordered" :href="$t('pages.startup.actuality.url')" v-html="$t('pages.startup.actuality.cta')"></a> 
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
          </el-row>
        </div>

      </div>
    </el-main>
  </div>
</template>


<script>
import headerPage from "../../components/headerPage.vue";
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
      });
    }
  },
  components: {
    headerPage
  },
};
</script>
