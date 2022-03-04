<template>
  <div id="news" class="main">

    <header-page mainTitle= "News"/>
    <!-- <el-main class="header-top"></el-main> -->

    <el-main class="container">
      <!--  -->
      <!-- <div class="content-layout white">
        <el-row class="content">
          <h2 class="subtitle" v-html="$t('pages.news.title1')" style="margin-bottom: 30px"></h2>
          <p class="intro" v-html="$t('pages.news.intro')"></p>
          <div class="areas">
            <div class="area" v-for="(area, i) in this.$t('pages.news.areas')" :key="i">
              <img  :src="require('@/assets/news/'+area.image+'.jpg')">
              <p v-html="area.title"></p>
            </div>
          </div>
        </el-row>
      </div> -->
      <!--  -->
      <!--  -->
      <div id="recent_news" class="content-layout white">
        <el-row class="content">
          <h2 class="subtitle" v-html="$t('pages.news.title2')" style="margin-bottom: 30px"></h2>
          <el-col :md="24">
            <el-row :gutter="20" type="flex">

              <el-col :xs="24" :sm="24" :md="24" class="article large" v-for="(article, i) in this.$t('pages.news.lastArticles')" :key="i">
                <a :href="article.link" target="_blank"><img width="100%" :src="require('@/assets/news/'+ article.image +'.jpg')" :alt="article.title"></a>
                <a :href="article.link" target="_blank" class="title--article" v-html=" article.title"></a>
                <p v-html="article.txt"></p>
              </el-col>

            </el-row>
          </el-col>
        </el-row>
      </div>
      <!--  -->
      <!--  -->
      <div id="previews_news" class="content-layout white">
        <el-row class="content">
          <h2 class="subtitle" v-html="$t('pages.news.title3')" style="margin-bottom: 30px"></h2>
          <el-col :md="24">
            <el-row :gutter="20" type="flex">

              <el-col :xs="24" :sm="12" :md="8" class="article" v-for="(article, i) in this.$t('pages.news.articles')" :key="i">
                <a :href="article.link" target="_blank"><img width="100%" :src="require('@/assets/news/'+ article.image +'.jpg')" :alt="article.title"></a>
                <a :href="article.link" target="_blank" class="title--article" v-html=" article.title"></a>
                <p v-html="article.txt"></p>
              </el-col>

            </el-row>
          </el-col>
        </el-row>
      </div>
      <!--  -->
    </el-main>
  </div>
</template>

<script>
import headerPage from "../../components/headerPage.vue";
export default {
  name: "newsLayout",
  components: {
    headerPage
  },
};
</script>
