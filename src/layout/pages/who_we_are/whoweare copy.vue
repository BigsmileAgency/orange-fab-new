<template>
  <div id="whoWeAre" class="main">
    <el-main class="header-top"></el-main>

    <el-main class="container">
      <div id="whyorange" class="content-layout black">
        <el-row class="content">
          <h2 v-html="$t('pages.whoWeAre.whyOrange.title')"></h2>
          <el-col :xs="24" :sm="12" :md="4">
            <img :src="require('../../../assets/body/who/network.png')" alt>
            <h4>{{$t('pages.whoWeAre.whyOrange.network.title')}}</h4>
            <ul>
              <li
                v-for="( list,index ) in this.$t('pages.whoWeAre.whyOrange.network.list')"
                :key="index"
                v-html="list.txt"
              ></li>
            </ul>
          </el-col>
          <el-col :xs="24" :sm="12" :md="4">
            <img :src="require('../../../assets/body/who/mentor.png')" alt>
            <h4>{{$t('pages.whoWeAre.whyOrange.mentor.title')}}</h4>
            <ul>
              <li
                v-for="( list,index ) in this.$t('pages.whoWeAre.whyOrange.mentor.list')"
                :key="index"
                v-html="list.txt"
              ></li>
            </ul>
          </el-col>
          <el-col :xs="24" :sm="12" :md="4">
            <img :src="require('../../../assets/body/who/collab.png')" alt>
            <h4>{{$t('pages.whoWeAre.whyOrange.collab.title')}}</h4>
            <ul>
              <li
                v-for="( list,index ) in this.$t('pages.whoWeAre.whyOrange.collab.list')"
                :key="index"
                v-html="list.txt"
              ></li>
            </ul>
          </el-col>
          <el-col :xs="24" :sm="12" :md="4">
            <img :src="require('../../../assets/body/who/events.png')" alt>
            <h4>{{$t('pages.whoWeAre.whyOrange.events.title')}}</h4>
            <ul>
              <li
                v-for="( list,index ) in this.$t('pages.whoWeAre.whyOrange.events.list')"
                :key="index"
                v-html="list.txt"
              ></li>
            </ul>
          </el-col>
          <el-col :xs="24" :sm="24" :md="4">
            <img :src="require('../../../assets/body/who/inter.png')" alt>
            <h4>{{$t('pages.whoWeAre.whyOrange.inter.title')}}</h4>
            <ul>
              <li
                v-for="( list,index ) in this.$t('pages.whoWeAre.whyOrange.inter.list')"
                :key="index"
                v-html="list.txt"
              ></li>
            </ul>
          </el-col>
        </el-row>
      </div>
      <div id="international" class="content-layout white">
        <el-row class="content">
          <h2 v-html="$t('pages.whoWeAre.international.title')"></h2>
          <p v-html="$t('pages.whoWeAre.international.subTitle')"></p>
          <img :src="require('../../../assets/body/who/map.jpg')" alt>
        </el-row>
      </div>
      <div id="keys" class="content-layout black">
        <el-row class="content">
          <h2 v-html="$t('pages.whoWeAre.keys.title')"></h2>
          <div class="keys-container">
            <div class="side">
              <div class="key-bloc">
                <h4>{{$t('pages.whoWeAre.keys.sample.sample1_title')}}</h4>
                <ul>
                  <li
                    v-for="(item, index) in $t('pages.whoWeAre.keys.sample.sample1_items')"
                    :key="index"
                  >{{item}}</li>
                </ul>
              </div>
              <div class="key-bloc">
                <h4>{{$t('pages.whoWeAre.keys.sample.sample2_title')}}</h4>
                <ul>
                  <li
                    v-for="(item, index) in $t('pages.whoWeAre.keys.sample.sample2_items')"
                    :key="index"
                  >{{item}}</li>
                </ul>
              </div>
            </div>
            <div class="center">
              <h3 v-html="$t('pages.whoWeAre.keys.centerTitle')"></h3>
            </div>
            <div class="side">
              <div class="key-bloc">
                <h4>{{$t('pages.whoWeAre.keys.sample.sample3_title')}}</h4>
                <ul>
                  <li
                    v-for="(item, index) in $t('pages.whoWeAre.keys.sample.sample3_items')"
                    :key="index"
                  >{{item}}</li>
                </ul>
              </div>
              <div class="key-bloc">
                <h4>{{$t('pages.whoWeAre.keys.sample.sample4_title')}}</h4>
                <ul>
                  <li
                    v-for="(item, index) in $t('pages.whoWeAre.keys.sample.sample4_items')"
                    :key="index"
                  >{{item}}</li>
                </ul>
              </div>
            </div>
          </div>
        </el-row>
      </div>
      <div id="apply" class="content-layout white">
        <el-row class="content">
          <h2 v-html="$t('pages.whoWeAre.apply.title')"></h2>
          <el-col class="apply-bloc" :sm="12" :xl="6">
            <figure class="orange">
              <img :src="require('../../../assets/body/who/apply1.jpg')" alt>
            </figure>
            <div class="bot-bloc">
              <h4>{{$t('pages.whoWeAre.apply.apply1_title')}}</h4>
              <p>{{$t('pages.whoWeAre.apply.apply1_date')}}</p>
            </div>
          </el-col>
          <el-col class="apply-bloc" :sm="12" :xl="6">
            <figure class="blue">
              <img :src="require('../../../assets/body/who/apply2.png')" alt>
            </figure>
            <div class="bot-bloc">
              <h4>{{$t('pages.whoWeAre.apply.apply2_title')}}</h4>
              <p>{{$t('pages.whoWeAre.apply.apply2_date')}}</p>
            </div>
          </el-col>
          <el-col class="apply-bloc" :sm="12" :xl="6">
            <figure class="green">
              <img :src="require('../../../assets/body/who/apply3.png')" alt>
            </figure>
            <div class="bot-bloc">
              <h4>{{$t('pages.whoWeAre.apply.apply3_title')}}</h4>
              <p>{{$t('pages.whoWeAre.apply.apply3_date')}}</p>
            </div>
          </el-col>
          <el-col class="apply-bloc" :sm="12" :xl="6">
            <figure class="yellow">
              <img :src="require('../../../assets/body/who/apply4.png')" alt>
            </figure>
            <div class="bot-bloc">
              <h4>{{$t('pages.whoWeAre.apply.apply4_title')}}</h4>
              <p>{{$t('pages.whoWeAre.apply.apply4_date')}}</p>
            </div>
          </el-col>
        </el-row>
      </div>
      <div id="business" class="content-layout black" v-view.once="onceHandler">
        <el-row class="content">
          <h2 v-html="$t('pages.whoWeAre.business.title')"></h2>
          <el-col :xs="24" :sm="8" :md="4">
            <span ref="num1" class="numb white" data-value="163">0</span>
            <h6>{{$t('pages.whoWeAre.business.business1')}}</h6>
          </el-col>
          <el-col :xs="24" :sm="8" :md="4">
            <span ref="num2" class="numb green" data-value="6">0</span>
            <h6>{{$t('pages.whoWeAre.business.business2')}}</h6>
          </el-col>
          <el-col :xs="24" :sm="8" :md="4">
            <span ref="num3" class="numb mauve" data-value="4">0</span>
            <h6>{{$t('pages.whoWeAre.business.business3')}}</h6>
          </el-col>
          <el-col :xs="24" :sm="8" :md="4">
            <span ref="num4" class="numb orange" data-value="2">0</span>
            <h6>{{$t('pages.whoWeAre.business.business4')}}</h6>
          </el-col>
          <el-col :xs="24" :sm="8" :md="4">
            <span ref="num5" class="numb grey" data-value="6">0</span>
            <h6>{{$t('pages.whoWeAre.business.business5')}}</h6>
          </el-col>
        </el-row>
        <el-row class="content quote">
          <q>
            <i>{{$t('pages.whoWeAre.business.quote')}}</i>
          </q>
          <div class="from">
            <img :src="require('../../../assets/body/who/from.png')" alt>
            <p>Head of Orange FAB</p>
          </div>
        </el-row>
      </div>
    </el-main>
  </div>
</template>

<script>
import { TweenMax, Power3 } from "gsap/all";
export default {
  name: "whoweare",
  methods: {
    onceHandler(e) {
      let arr = Object.values(this.$refs);

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
  }
};
</script>
