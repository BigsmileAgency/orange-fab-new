<template>
  <el-main class="header-top">
    <el-row class="header-layout">
      <el-col class="header-content" :md="24" ref="headerContent">

        <!--- <div class="black-black">
          <h1 class="title" v-html="mainTitle"></h1>
        </div> -->

          <h1 class="title" v-html="mainTitle"></h1>
      </el-col>
    </el-row>
  </el-main>
</template>

<script>
export default {
  props: ['mainTitle']
}
</script>

<style>

</style>
