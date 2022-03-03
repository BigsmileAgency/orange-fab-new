<template>
    <el-main class="box">
        <el-col :md="8" :xs="24">
            <h1>Download CSV</h1>
            <el-form ref="form" :model="form">
                <el-form-item label="Username">
                    <el-input v-model="form.username"></el-input>
                </el-form-item>
                <el-form-item label="Password">
                    <el-input type="password" v-model="form.password"></el-input>
                </el-form-item>
                <el-form-item label="Data Break ?">
                  <el-switch v-model="form.dataBreak"></el-switch>
                </el-form-item>
                <el-button type="primary" @click="get_csv" >Download</el-button>
            </el-form>
        </el-col>
    </el-main>
</template>

<script>

import UserService from '../../services/user';
import fileDownload from 'js-file-download';

export default {
  name: 'adminLayout',
  data() {
      return {
          form : {
              username : "",
              password : "",
              dataBreak : false
          },
          error :  false,
          UserService : new UserService()
      }
  },
  methods : {
      get_csv() {
          this.UserService.get_csv(this.form)
            .then(r => {
              console.log(r);
              if (![4,6].includes(r.data.code)) {
                const time = Date.now();
                fileDownload(r.data, 'orangeFabUser_'+time+'.csv')
              }
            })
            .catch(err => {
                this.error = true;
            })
      }
  }
}
</script>

