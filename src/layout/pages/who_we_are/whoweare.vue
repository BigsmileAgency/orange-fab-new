<template>
  <div class="main">
    <header-page mainTitle="Orange Fab BeLux"/>
  
    <el-main class="container" ref="mainContainer">
      <div id="whoWeAre" class="main">
        <el-main class="container">


          <!--  -->
          <div id="vision" class="content-layout white">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.Vision.title')"></h2>
              <p v-html="$t('pages.whoWeAre.Vision.text1')" style="margin-bottom:0;"></p>
              <p class="bullet-points" v-html="$t('pages.whoWeAre.Vision.text2')" style="margin-bottom:0;"></p>
              <p v-html="$t('pages.whoWeAre.Vision.text3')" ></p>
              <a class="cta bordered" :href="$t('pages.whoWeAre.Vision.url')" v-html="$t('pages.whoWeAre.Vision.cta')"></a>
            
            </el-row>
          </div>
          <!--  -->

          <!--  -->
          <div id="team" class="content-layout black">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.Team.title')"></h2>
              <!-- <img class="team_img" :src="require('@/assets/body/who/team-placeholder.png')"> -->
              <div class="team_container">
                <div class="member" v-for="(member, i) in this.$t('pages.whoWeAre.Team.members')" :key="i">
                  <img :src="require('@/assets/body/who/people/'+ member.img)">
                  <h4>{{ member.name }}</h4>
                  <p>{{ member.bio }}</p>
                </div>
              </div>
            </el-row>
          </div>
          <!--  -->

          <!--  -->
          <div id="welcome" class="content-layout white apply">
            <el-row class="content">
              <h3 class="subtitle" v-html="$t('pages.whoWeAre.welcome.subtitle')" style="margin-bottom: 30px"></h3>
              <iframe width="100%" height="100%" class='iframe-home' src="https://www.youtube.com/embed/FBb8i3qmpNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <a class="cta bordered" :href="$t('pages.whoWeAre.welcome.link')" v-html="$t('pages.whoWeAre.welcome.cta')"></a>
           
            </el-row>
          </div>
          <!--  -->

          <!--  -->
          <!-- <div id="contact" class="content-layout white apply">
            <el-row class="content">
              <h2 v-html="$t('pages.whoWeAre.contact.title')"></h2>
              <p v-html="$t('pages.whoWeAre.contact.address')"></p>
            </el-row>
          </div> -->
          <!--  -->

          <!--  -->
          <div id="international" class="content-layout white">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.international.title')"></h2>
              <p v-html="$t('pages.whoWeAre.international.subTitle')"></p>
              <img :src="require('@/assets/body/who/map.png')" alt />
            </el-row>
          </div>
          <!--  -->

          <!--  -->
          <div id="partners" class="content-layout white">
            <el-row class="content">
              <h2 class="subtitle" v-html="$t('pages.whoWeAre.partners.title')"></h2>
              <div class="partners_container">
                <div class="partner" v-for="(partner, i) in this.$t('pages.whoWeAre.partners.partners')" :key="i">
                  <img :src="require('@/assets/body/who/partners/'+ partner.img)">
                  <h4>{{ partner.name }}</h4>
                  <!-- <p>{{ partner.bio }}</p> -->
                </div>
              </div>
            </el-row>
          </div>
          <!--  -->

        </el-main>
      </div>
    </el-main>
  </div>
</template>

<script>
import { TweenMax } from "gsap/all";
import apply from "../../components/apply.vue";
import keys from "../../components/keys.vue";
import headerPage from "../../components/headerPage.vue";
export default {
  name: "whoweareLayout",
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
    headerPage
  },
};
</script>
