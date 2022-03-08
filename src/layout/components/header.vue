<template>
  <el-header   height="auto" ref="header" :class="this.$route.name">
    <el-row :gutter="1" id="sub-header" ref="subHeader">
      <div ref="burgerMenu" :class="!menu ? 'el-col el-col-24 burger-menu' : 'el-col el-col-24 burger-menu menu-on'" @click="openCloseMenu()">
        <div class="burger" ></div>
      </div>
    </el-row>

    <el-row id="header" type="flex">
      <div class="header-container">
        <div class="header-title">
          <router-link :to="{name : 'main_child'}" tag="div" class="logo_container">
            <img :src="require('@/assets/logo.svg')" alt>
            <h2 id="header-text">{{ $t('header.title') }}</h2>
          </router-link>
        </div>

        <div class="header-menu desktop-menu" ref="menu" @mouseleave="hideNav()">
          <nav>
            <ul ref="menu" class="main_nav">
              <template v-for="(item, index) in this.$t('header.items')">
                <li v-if="item.subLinks" :key="index" :index="item.name" v-bind:id="'desk_'+index" class="first_level_el expandable desk-expandable closed"  >
                  <div>
                    <router-link :to="item.link.hash">
                      <span @mouseover="expandNavDesk('desk_'+index)">{{ item.name }}</span>
                    </router-link>
                    <i class="el-submenu__icon-arrow el-icon-arrow-down"></i></div>
                  <ul class="subnav">
                    <template v-for="(subitem, index) in item.subLinks" :index="item.name">
                      <li @click="openCloseMenu()" class="subnav_item">
                        <router-link :to="subitem.link.hash">
                          {{ subitem.name }}
                        </router-link>
                      </li>
                    </template>
                  </ul>
                </li>
                <li @click="openCloseMenu()" v-else :key="index" :index="item.name" class="first_level_el">
                  <router-link :to="item.link">
                    <span >{{ item.name }}</span>
                  </router-link>
                </li>
              </template>
            </ul>
          </nav> 
        </div>

        <div class="header-menu mobile-menu" ref="menu">
          <nav>
            <ul ref="menu" class="main_nav">
              <template v-for="(item, index) in this.$t('header.items')">
                <li v-if="item.subLinks" :key="index" :index="item.name" v-bind:id="index" class="first_level_el expandable mobile_expandable closed"  @click="expandNav(index)">
                  <div>
                      {{ item.name }}
                    <i class="el-submenu__icon-arrow el-icon-arrow-down"></i></div>
                  <ul class="subnav">
                    <template v-for="(subitem, index) in item.subLinks" :index="item.name">
                      <li @click="openCloseMenu()" class="subnav_item">
                        <router-link :to="subitem.link.hash">
                          {{ subitem.name }}
                        </router-link>
                      </li>
                    </template>
                  </ul>
                </li>
                <li @click="openCloseMenu(), expandNav('all')" v-else :key="index" :index="item.name" class="first_level_el">
                  <router-link :to="item.link">
                    <span >{{ item.name }}</span>
                  </router-link>
                </li>
              </template>
            </ul>
          </nav>
        </div>


      </div>
    </el-row>

  </el-header>
</template>

<script>
import { TweenMax, Power3 } from "gsap/all";

export default {
  name: "headerMenu",
  data() {
    return {
      lang: "",
      token: sessionStorage.getItem("token") ? true : false,
      menu: false,
      isAnimating: false,
      subOpen: undefined
    };
  },
  computed: {
    subMenuType: function() {
      return  window.innerWidth <= 767 ? 'click' : 'hover'
    },
    responsive: function() {
      return  window.innerWidth <= 767 ? true : false
    }
  },
  mounted() {
    this.$nextTick(function() {
      var menu = this.$refs["menu"];
      window.addEventListener("resize", e => {
        if (document.documentElement.clientWidth >= 767) {
          TweenMax.to(menu, 0, { autoAlpha: 1 });
        } else if (document.documentElement.clientWidth < 750 && !this.menu) {
          TweenMax.to(menu, 0, { autoAlpha: 0 });
        }
      });

    });



  },
  created() {
      if (process.browser) {
        document.addEventListener("click", this.documentClick);
      }
  },
  destroyed() {
    if (process.browser) {
    document.removeEventListener("click", this.documentClick);
    }
  },
  methods: {
     documentClick(e){
      let el = this.$refs['menu']
      let target = e.target;
      if (el !== target && !el.contains(target) && this.clicked_index) {
        var expandables = document.getElementsByClassName('mobile_expandable');
        for(var i = 0; i < expandables.length; i++){
          expandables[i].className = "first_level_el expandable mobile_expandable closed";
        }
      }
      this.clicked_index = true
    },
    changeLang(lang) {
      this.$router.push({ name: this.$route.name, params: { lang } });
    },
    isAnimate() {
      this.isAnimating = !this.isAnimating;
    },
    
    expandNav(id){
      var expandables = document.getElementsByClassName('mobile_expandable');
      if(id == "all"){
        for(var i = 0; i < expandables.length; i++){
            expandables[i].className = "first_level_el expandable mobile_expandable closed";
        }
      } else {
        for(var i = 0; i < expandables.length; i++){
          if(i != id){
            expandables[i].className = "first_level_el expandable mobile_expandable closed";
          } else {
            var el = document.getElementById(id);
            el.classList.toggle("closed");
          }
        }
      }
    },
    expandNavDesk(id){
      var header = document.getElementById("header");
      header.classList="el-row el-row--flex open";
      var expandables = document.getElementsByClassName('desk-expandable');
      for(var i = 0; i < expandables.length; i++){
        expandables[i].className = "first_level_el expandable desk-expandable closed";
      }
      var el = document.getElementById(id);
      el.classList.toggle("closed");
    },
    hideNav(){
      console.log("hide");
      var header = document.getElementById("header");
      header.classList="el-row el-row--flex";
      var expandables = document.getElementsByClassName('desk-expandable');
      for(var i = 0; i < expandables.length; i++){
        expandables[i].className = "first_level_el expandable desk-expandable closed";
      }
    },
    openCloseMenu() {
      var responsive = window.innerWidth <= 767 ? true : false;
      console.log("open*close");
      if (responsive && !this.isAnimating) {
        this.menu = !this.menu;
        var subHeader = this.$refs["subHeader"];
        var menu = this.$refs["menu"];
        var menuEl = menu.children[0].children;

        if (this.menu) {
          var tl = new TimelineMax({
            delay: "0.1",
            onStart: this.isAnimate,
            onComplete: this.isAnimate
          });
          tl.to(document.body, 0, { overflow: "hidden" })
            .to(menu, 0.2, {
              autoAlpha: 1,
              overflowY: "hidden",
              ease: Power3.easeOut
            })
            .staggerFrom(
              menuEl,
              0.4,
              {
                opacity: 0,
                y: 30,
                skewY: "-6deg",
                rotationY: "-1deg",
                ease: Power3.easeOut
              },
              ".15"
            );
        } else {
          TweenMax.to(document.body, 0, { overflowY: "scroll" });
          TweenMax.to(menu, 0.1, { autoAlpha: 0, overflow: "initial" });
          TweenMax.to('div.el-menu--horizontal', 0, { visibility: 'inherit', opacity: '1', display: 'none' });
        }
      }
    }
  }
};
</script>
