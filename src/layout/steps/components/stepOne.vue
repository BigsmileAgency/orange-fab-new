<template>
  <el-main id="step1" v-loading="loading" class="step">
    <el-form ref="form" :model="form" :rules="rules" label-width="120px" label-position="top">

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step1.form.company')" prop="company">
            <el-input v-model="form.company"></el-input>
          </el-form-item>
        </el-col>
        <el-col class="website__input" :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step1.form.website')" prop="website">
            <el-input v-model="form.website">
              <template slot="prepend">http://</template>
            </el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step1.form.firstname')" prop="firstname">
            <el-input v-model="form.firstname"></el-input>
          </el-form-item>
        </el-col>
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step1.form.lastname')" prop="lastname">
            <el-input v-model="form.lastname"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step1.form.position')" prop="position">
            <el-input v-model="form.position"></el-input>
          </el-form-item>
        </el-col>
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step1.form.phone')" prop="phone">
            <el-input v-model="form.phone"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step1.form.email')" prop="email">
            <el-input v-model="form.email"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="24">
          <el-form-item :label="$t('pages.form.step1.form.activity')" prop="activity">
            <el-input v-model="form.activity" type="text"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row>
        <el-col :md="24">
          <el-button type="primary" @click="connect('form')">Next Step</el-button>
        </el-col>
      </el-row>

    </el-form>
  </el-main>
</template>

<script>
import UserService from "../../../services/user";

function validateUrl(value) {
  return /^(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(
    value
  );
}

export default {
  name: "StepOne",
  props: ['data'],
  data() {
    var checkUrl = (rule, value, callback) => {
      if (!validateUrl(this.form.website)) {
        callback(new Error(this.$t("register.error.website")));
      }

      callback();
    };

    var checkPhone = (rule, value, callback) => {
      if (this.form.phone.length < 10) {
        callback(new Error(this.$t("register.error.phone")));
      }
      callback();
    };

    return {
      form: {
        company: "",
        website: "",
        phone: "",
        firstname: "",
        lastname: "",
        email: "",
        activity: "",
        position: ""
      },
      rules: {
        email: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          },
          {
            type: "email",
            message: this.$t("login.error.email"),
            trigger: ["blur", "change"]
          }
        ],
        website: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          },
          { validator: checkUrl }
        ],
        phone: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          },
          { validator: checkPhone, trigger: ["blur", "change"] }
        ],
        firstname: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        lastname: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        company: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        position: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        activity: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ]
      },
      UserService: new UserService(),
      error: false,
      e_message: "",
      loading: false
    };
  },
  methods: {
    connect(form) {
      this.$refs[form].validate(valid => {
        if (!valid) return false;
        this.$emit('validate', {form:this.form, step:1})
        TweenMax.to(window, 1, { scrollTo: {y: '#apply', offsetY: 100}});
      });
    }
  },
  mounted() {
    this.form = this.data
  }
};
</script>
