<template>
  <el-main id="step2" v-loading="loading" class="step">
    <el-form ref="form" :rules="rules" :model="form" label-width="120px" label-position="top">

      <el-row :gutter="20">
        <el-col :xs="24" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.business_create.title')" prop="business_create">
            <el-input v-model="form.business_create"></el-input>
          </el-form-item>
          <el-form-item :label="$t('pages.form.step2.form.city.title')" prop="startup_city">
            <el-input v-model="form.startup_city"></el-input>
          </el-form-item>
          <el-form-item :label="$t('pages.form.step2.form.people.title')" prop="startup_people">
            <el-input-number v-model="form.startup_people" :min="1"></el-input-number>
          </el-form-item>
        </el-col>
        <el-col :xs="24" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.market_problem.title')" prop="market_problem">
            <el-input type="text" v-model="form.market_problem"></el-input>
          </el-form-item>
          <el-form-item :label="$t('pages.form.step2.form.business_model.title')" prop="business_model">
            <el-input type="text" v-model="form.business_model"></el-input>
          </el-form-item>
          <el-form-item :label="$t('pages.form.step2.form.major_clients.title')" prop="major_clients">
            <el-input type="text" v-model="form.major_clients"></el-input>
          </el-form-item>
          <el-form-item :label="$t('pages.form.step2.form.country.title')" prop="startup_country">
            <el-input v-model="form.startup_country"></el-input>
          </el-form-item>
          <el-form-item :label="$t('pages.form.step2.form.selling_point.title')" prop="selling_point">
            <el-input type="text" v-model="form.selling_point"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <!-- <el-row :gutter="20">
        <el-col :xs="24" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.business_create.title')" prop="business_create">
            <el-input v-model="form.business_create"></el-input>
          </el-form-item>
        </el-col>
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.city.title')" prop="startup_city">
            <el-input v-model="form.startup_city"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.people.title')" prop="startup_people">
            <el-input-number v-model="form.startup_people" :min="1"></el-input-number>
          </el-form-item>
        </el-col>
        <el-col :xs="24" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.market_problem.title')" prop="market_problem">
            <el-input type="text" v-model="form.market_problem"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="24" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.business_model.title')" prop="business_model">
            <el-input type="text" v-model="form.business_model"></el-input>
          </el-form-item>
        </el-col>
        <el-col :xs="24" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.major_clients.title')" prop="major_clients">
            <el-input type="text" v-model="form.major_clients"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.country.title')" prop="startup_country">
            <el-input v-model="form.startup_country"></el-input>
          </el-form-item>
        </el-col>
        <el-col :xs="24" :md="12">
          <el-form-item :label="$t('pages.form.step2.form.selling_point.title')" prop="selling_point">
            <el-input type="text" v-model="form.selling_point"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20" class="steps__button--nav">
        <el-col :xs="24">
          <el-button type="back" @click="goBack">Go back</el-button>
          <el-button type="primary" @click="submitStep2('form')">Next Step</el-button>
        </el-col>
      </el-row> -->

    </el-form>
  </el-main>
</template>

<script>
import axios from "axios";
import UserService from "../../../services/user";

export default {
  name: "stepTwo",
  props: ['data'],
  data() {
    return {
      form: {
        selling_point: "",
        business_model: "",
        major_clients: "",
        market_problem: "",
        business_create: "",
        startup_country: "",
        startup_city: "",
        startup_people: "",
        track_apply: ""
      },
      date: "",
      rules: {
        business_model: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        major_clients: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        selling_point: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        market_problem: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        business_create: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        startup_country: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        startup_city: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        startup_people: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        track_apply: [
          {
            required: false,
            message: this.$t("login.error.required"),
            trigger: ["blur", "change"]
          }
        ]
      },
      countries: [],
      UserService: new UserService(),
      loading: false
    };
  },
  beforeMount: function() {
    // this.token = sessionStorage.getItem("token");
    // axios.get("https://restcountries.eu/rest/v2/all").then(r => {
    //   this.countries = r.data.map(country => {
    //     if (
    //       country.translations.fr === "Belgique" ||
    //       country.translations.fr === "Luxembourg"
    //     ) {
    //       return false;
    //     }
    //     return { name: country.name, value: country.name };
    //   });
    //   this.countries = [
    //     { name: "Belgium", value: "Belgium" },
    //     { name: "Luxembourg", value: "Luxembourg" },
    //     ...this.countries
    //   ];
    // });
  },
  mounted() {
    this.form = this.data
  },
  methods: {
    // querySearch(queryString, cb) {
    //   var sectors = this.$t("pages.form.step2.sectors");
    //   var results = queryString
    //     ? sectors.filter(this.createFilter(queryString))
    //     : sectors;

    //   cb(results);
    // },

    createFilter(queryString) {
      return link => {
        return (
          link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0
        );
      };
    },
    submitStep2(form) {
      this.$refs[form].validate(valid => {
        if (valid) {
          this.$emit('validate', {form:this.form, step:2})
          TweenMax.to(window, 1, { scrollTo: {y: '#apply', offsetY: 100}});
        }
        return false;
      });
    },
    goBack() {
      this.$emit("goBack", 1);
      TweenMax.to(window, 1, { scrollTo: {y: '#apply', offsetY: 100}});
    }
  }
};
</script>
