<template>
  <el-container :class="{'hide': scrolled}">
    <header-menu></header-menu>
    <cookie v-show="cookie" v-on:cookieClosed="closeCookie()"></cookie>
    <body-layout></body-layout>
    <footer-menu></footer-menu>
  </el-container>
</template>

<script>
import headerMenu from "./components/header.vue";
import cookie from "./cookie_popup/cookie.vue";
import bodyLayout from "./pages/body.vue";
import footerMenu from "./components/footer.vue";

export default {
  name: "mainLayout",
  data() {
    return {
      scrolled: false,
      scroll: false,
      scrollY: 0,
      cookie: sessionStorage.getItem("cookie") ? false : true
    };
  },
  components: {
    headerMenu,
    cookie,
    bodyLayout,
    footerMenu
  },
  methods: {
    handleScroll() {
      this.scrolled = window.scrollY > 40;
      this.scrollY = window.scrollY;
    },
    closeCookie() {
      sessionStorage.setItem("cookie", false);
      this.cookie = !this.cookie;
    }
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
    window.addEventListener("resize", this.handleResize);
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.handleScroll);
    window.removeEventListener("resize", this.handleResize);
  }
};
</script>
