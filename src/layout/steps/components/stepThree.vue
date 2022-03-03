<template>
  <el-main id="step3" v-loading="loading" class="step">
    <el-form ref="form" :rules="rules" :model="form" label-width="120px" label-position="top">

      <el-row :gutter="20" class="toggle__bloc">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step3.form.accelerator.title')" prop="participate_accelerator">
            No&nbsp;
            <el-switch v-model="form.participate_accelerator"></el-switch>&nbsp;&nbsp;Yes
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20" v-if="form.participate_accelerator">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step3.form.which_accelerator.title')" prop="which_accelerator">
            <el-input v-model="form.which_accelerator"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step3.form.turnover.title')" prop="turnover">
            <el-input v-model="form.turnover"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20" class="toggle__bloc">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step3.form.already_money_raised.title')" prop="already_money_raised">
            No&nbsp;
            <el-switch v-model="form.already_money_raised"></el-switch>&nbsp;&nbsp;Yes
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20" v-if="form.already_money_raised">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step3.form.money_raised.title')" prop="money_raised">
            <el-input v-model="form.money_raised">
              <template slot="append">€</template>
            </el-input>
            <div class="custom sub-label">If you don't feel comfortable disclosing this information, we're happy to have this discussion at a later stage.</div>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="12">
          <el-form-item :label="$t('pages.form.step3.form.files.title')">
            <el-upload
              class="uploader"
              drag
              :action="`${BASE_URL}/upload.php`"
              :on-remove="handleRemove"
              :on-success="handleSuccess"
              :limit="3"
              :headers="headerReq"
              accept=".jpg, .jpeg, .png, .bmp, .pdf, .csv, .xls, .gif, .docx, .doc"
              :on-exceed="handleExceed"
              :file-list="form.file_additional"
              multiple
            >
              <!-- <i class="el-icon-upload"></i> -->
              <div class="el-upload--button">
                <img :src="require('@/assets/upload.png')" alt>
              </div>
              <div class="el-upload__text">{{$t('pages.form.step3.upload.drop')}}</div>
              <div class="el-upload__tip sub-label" slot="tip">{{$t('pages.form.step3.upload.types')}}</div>
            </el-upload>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="18">
          <el-form-item label="What are your expectations for Orange Fab?" prop="fab_expect">
            <el-input type="textarea" v-model="form.fab_expect"></el-input>
            <div class="custom sub-label">What is your dream scenario? (e.g.: Try out different use cases of your product with a Telco player / Distribute your products in the retail outlets of Orange / ... )</div>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="18">
          <el-form-item label="How would you help us create more value for Orange?" prop="why_collaborate">
            <el-input type="textarea" v-model="form.why_collaborate"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :xs="{span : 24, offset : 0}" :md="18">
          <el-form-item label="How did you hear about us?" prop="hear_us">
            <el-input type="textarea" v-model="form.hear_us"></el-input>
          </el-form-item>
        </el-col>
      </el-row>

        <el-button type="back" @click="goBack">Go back</el-button>
      <el-button type="primary" @click="submitForm('form')">Submit</el-button>
    </el-form>
  </el-main>
</template>

<script>
import { BASE_URL } from "../../../conf";
export default {
  name: "stepThree",
  props: ['data', 'email'],
  data() {
    var checkMoney = (rule, value, cb) => {
      if (value.length == 0) {
        cb();
      }
      if (!Number.isInteger(value)) {
        cb(new Error("Please enter a valid number"));
      } else {
        cb();
      }
    };
    return {
      form: {
        which_accelerator:"",
        money_raised: "",
        fab_expect: "",
        why_collaborate: "",
        hear_us: "",
        turnover: "",
        participate_accelerator: false,
        already_money_raised: false,
        file_additional: []
      },
      rules: {
        wich_accelerator: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        turnover: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        participate_accelerator: [
          {
            required: false,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        already_money_raised: [
          {
            required: false,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        fab_expect: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        why_collaborate: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        hear_us: [
          {
            required: true,
            message: this.$t("login.error.required"),
            trigger: "blur"
          }
        ],
        money_raised: [{ trigger: ["blur", "change"] }]
      },
      loading: false,
      error_limit: false,
      BASE_URL: BASE_URL,
      headerReq: {
        email: this.email
      }
    };
  },
  mounted() {
    this.form = this.data
  },
  methods: {
    handleExceed(files, fileList) {
      this.$message({
        message: "Maximum 3 files",
        type: "error"
      });
    },
    handleSuccess(res, file, fileList) {
      this.form.file_additional = [...this.form.file_additional, res];
    },
    handleRemove(file) {
      let fileToDel = undefined;

      if (file.response) {
        fileToDel = file.response;
      } else {
        fileToDel = file.name;
      }
      this.UserService.delete_image(fileToDel)
        .then(r => {
          this.form.file_additional = this.form.file_additional.filter(
            fileUploaded => fileUploaded !== file.response
          );
        })
        .catch(err => console.log(err));
    },
    submitForm(form) {
      this.$refs[form].validate(valid => {
        if (!valid) return false;
        this.$emit('submitForm', {form:this.form, step:3})
        TweenMax.to(window, 1, { scrollTo: {y: '#apply', offsetY: 100}});
      });
    },
    goBack() {
      this.$emit("goBack", 2);
      TweenMax.to(window, 1, { scrollTo: {y: '#apply', offsetY: 100}});
    }
  }
};
</script>
