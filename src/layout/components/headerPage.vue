<template>
  <el-main class="header-top header_page">
    <el-row class="header-layout">
      <el-col class="header-content" :md="24" ref="headerContent">

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
