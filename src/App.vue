<template>
  <div id="app">
    <main-layout></main-layout>
  </div>
</template>

<script>
import mainLayout from "./layout/layout.vue";
import "./css/main.scss";
import "./vendor/polyfill.js";

export default {
  name: "App",
  components: {
    mainLayout
  },
  mounted() {
    // let tealium = document.createElement("script");
    // tealium.type = "text/javascript";
    // tealium.innerHTML = "var utag_data = {};";
    // tealium.innerHTML +=
    //   "(function(a,b,c,d){a='//tags.tiqcdn.com/utag/mobistar/orangefab.be/prod/utag.js';b=document;c='script';d=b.createElement(c);d.src=a;d.type='text/java'+c;d.async=true;a=b.getElementsByTagName(c)[0];a.parentNode.insertBefore(d,a);})();";

    // document.addEventListener("DOMContentLoaded", function() {
    //   document.body.prepend(tealium);
    // });
  },
  head: {
    // To use "this" in the component, it is necessary to return the object through a function
    script: [
      { type: 'text/javascript', inner: 'var utag_data = {};', async: true},
      { type: 'text/javascript', inner: "(function(a,b,c,d){a='//tags.tiqcdn.com/utag/mobistar/orangefab.be/prod/utag.js';b=document;c='script';d=b.createElement(c);d.src=a;d.type='text/java'+c;d.async=true;a=b.getElementsByTagName(c)[0];a.parentNode.insertBefore(d,a);})();", async: true},
      // ...
    ],
  }
};
</script>
