<template>
  <transition name="slide-fade" mode="out-in">
    <router-view/>
  </transition>
</template>

<script>
export default {
  name: "bodyLayout",
  data() {
    return {
      active: 0
    };
  },
  beforeMount() {
    this.$store.commit("isToken");
    window.addEventListener("scroll", this.handleScroll);
  },
  methods: {
    handleScroll() {
      // console.log("hey");
    }
  }
};
</script>
