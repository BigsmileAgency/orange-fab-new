<template>
  <div id="keys" class="content-layout black">
    <el-row class="content">
      <h2 class="subtitle" v-html="$t('pages.whoWeAre.keys.title')"></h2>
      <h2 class="subtitle" v-html="$t('pages.whoWeAre.keys.subTitle')"></h2>

      <div class="keys-container">
        <div class="key-bloc" v-for="(key, i) in this.$t('pages.whoWeAre.keys.keys')" :key="i">
          <img :class="'img--'+ key.type" :src="require('@/assets/body/keys/'+ key.type +'.png')" alt />
          <h4 v-html="key.title"></h4>
          <ul>
            <li v-for="(item, i) in key.list" :key="i" v-html="item"></li>
          </ul>
          <!-- <div class="key-bloc--cta" v-html="key.cta"></div> -->
        </div>
      </div>
    </el-row>
  </div>
</template>

<script>
export default {

}
</script>
