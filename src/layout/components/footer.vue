<template>
  <el-footer height="auto">
    <el-row id="footer" :gutter="0">
      <div class="footer-container">
        <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6">
          <h6>{{this.$t('footer.other_countries')}}</h6>
          <ul>
            <li v-for="( country, i ) in this.$t('footer.countries')" :key="i">
              <a v-if="(i <= 6)" class="footer-font-size" :href="country.url" target="_blank">
                Orange Fab {{ country.name }}
              </a>
            </li>
          </ul>
        </el-col>
        <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6">
          <ul>
            <li v-for="( country, i ) in this.$t('footer.countries')" :key="i">
              <a v-if="(i > 6)" class="footer-font-size" :href="country.url" target="_blank">
                Orange Fab {{ country.name }}
              </a>
            </li>
          </ul>
        </el-col>
        <!-- <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6">
          <h6>
            Fab
            <span>- /fab/ (faeb)</span>
          </h6>
          <ol>
            <li class="footer-font-size">{{this.$t('footer.fab1')}}</li>
            <li class="footer-font-size">{{this.$t('footer.fab2')}}</li>
          </ol>
        </el-col> -->
        <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6">
          <h6>Social</h6>
          <ul>
            <!-- <li>
              <a href="https://www.facebook.com/OrangeBelgium/" target="_blank" class="footer-font-size">Facebook</a>
            </li> -->
            <li>
              <a :href="this.$t('footer.twitter')" target="_blank" class="footer-font-size">Twitter</a>
            </li>
            <!-- <li>
              <a href="https://www.linkedin.com/company/orange/" target="_blank" class="footer-font-size">Linkedin</a>
            </li>
            <li>
              <a href="https://www.instagram.com/orange_belgium/" target="_blank" class="footer-font-size">Instagram</a>
            </li> -->
          </ul>
        </el-col>
        <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6">
          <h6>Contact</h6>
          <p class="footer-font-size">
            {{this.$t('footer.address')}}<br>
            {{this.$t('footer.address2')}}<br>
            {{this.$t('footer.address3')}}
          </p>
          <h6>
            <a href="mailto:orangefab@orange.be">orangefab@orange.be</a>
          </h6>
        </el-col>
      </div>
    </el-row>
    <el-row id="subFooter">
      <div class="footer-container">
        <el-col :span="24">
          <p class="footer-font-size">
            <a :href="this.$t('footer.copyright')" target="_blank">{{this.$t('footer.cookies')}}</a> |
            <a class="privacy" :href="this.$t('footer.privateLink')" target="_blank">{{this.$t('footer.private')}}</a>
          </p>
          <p class="socials">
            <!-- <a href="https://www.facebook.com/OrangeBelgium/" target="_blank">
              <img :src="require('../../assets/socials/facebook.svg')" alt="Facebook">
            </a> -->
            <a :href="this.$t('footer.twitter')" target="_blank">
              <img :src="require('../../assets/socials/twitter.svg')" alt="Twitter">
            </a>
            <!-- <a href="https://www.linkedin.com/company/orange/" target="_blank">
              <img :src="require('../../assets/socials/linkedin.svg')" alt="Linkedin">
            </a>
            <a href="https://www.instagram.com/orange_belgium/" target="_blank">
              <img :src="require('../../assets/socials/instagram.svg')" alt="Instagram">
            </a> -->
          </p>
        </el-col>
      </div>
    </el-row>
  </el-footer>
</template>

<script>
export default {
  name: "footerMenu",
};
</script>
