<template>
  <el-main id="steps" v-loading="loading">
    <el-row id="step-title">
      <el-col v-if="active == 1 || active == 2 || active == 3">
        <h2 class="subtitle">Register <span>(Step {{ active }}/3)</span></h2>
        <!-- <el-alert title="This site is optimized for Mozilla Firefox and Google Chrome." type="warning"></el-alert> -->
        <el-alert v-if='messageError' :title="messageError" type="error" effect="dark"></el-alert>
      </el-col>
      <el-col v-if="active === 4" align="center">
        <i class="el-icon-check" style="font-size : 100px"></i>
        <h1>Your form has been submitted</h1>
      </el-col>
    </el-row>
    <el-row class="form__container">
      <step-one :data="form.step1" @validate="submitStep" v-if="active == 1"></step-one>
      <step-two :data="form.step2" @validate="submitStep" v-if="active == 2" @goBack="changeStep"></step-two>
      <step-three :data="form.step3" :email="form.step1.email" @submitForm="submitForm" v-if="active == 3" @goBack="changeStep"></step-three>
    </el-row>

    <el-row class="required" v-if="!formFinish">
      <p>*Required field</p>
    </el-row>
  </el-main>
</template>

<script>
import UserService from "../../../services/user";
import StepOne from "../components/stepOne";
import StepTwo from "../components/stepTwo";
import StepThree from "../components/stepThree";

export default {
  name: "stepsLayout",
  components: {
    StepOne,
    StepTwo,
    StepThree
  },
  data() {
    return {
      form: {
        step1: {
          company: "",
          website: "",
          phone: "",
          firstname: "",
          lastname: "",
          email: "",
          activity: "",
          position: ""
        },
        step2: {
          selling_point: "",
          business_model: "",
          major_clients: "",
          market_problem: "",
          business_create: "",
          startup_country: "",
          startup_city: "",
          startup_people: 1,
          track_apply: ""
        },
        step3: {
          which_accelerator:"",
          money_raised: "",
          fab_expect: "",
          why_collaborate: "",
          hear_us: "",
          turnover: "",
          participate_accelerator: false,
          already_money_raised: false,
          file_additional: []
        }
      },
      messageError: false,
      active: 1,
      formFinish: false,
      loading: false,
      UserService: new UserService()
    };
  },
  methods: {
    submitStep(data) {
      this.active += 1;
      if(data.step == 1) {
        this.form.step1 = data.form;
      } else {
        this.form.step2 = data.form;
      }
    },
    submitForm(data) {
      this.form.step3 = data.form;
      this.loading = true
      this.UserService.save_steps(this.form, 3)
      .then( resp => {
          if(resp.data == "This user is already registered"){
            this.messageError = resp.data
            this.loading = false,
            this.active = 1
          }
          else{
            this.loading = false,
            this.active = 4
            this.formFinish = true
          }
        }
      )
      .catch(err => console.log(err))
    },
    changeStep(step) {
      this.active = step;
    }
  }
};
</script>
