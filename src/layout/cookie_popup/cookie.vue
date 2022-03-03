<template>
  <el-main class="cookie container">
    <el-row class="content-layout">
      <el-col :xs="24" :sm="20" :md="20">
        <strong>{{$t('cookie.title')}}</strong>
        <p>
          {{$t('cookie.text')}}
        </p>
        <a :href="$t('cookie.link')">{{$t('cookie.textLink')}}</a>
      </el-col>
      <el-col :xs="24" :sm="4" :md="4">
        <button @click="acceptCookie()">ok</button>
      </el-col>
    </el-row>
  </el-main>
</template>

<script>
export default {
  name: 'cookie',
  data(){
      return{

      }
  },
  methods :  {
      acceptCookie(){
        this.$emit('cookieClosed');
      }
  },

}
</script>

<style lang="scss" scoped>
  @import '@/css/variables.scss';
  .cookie{
    margin: 0 auto;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: flex-end;
    justify-content: space-around;
    background: rgba($color: #000000, $alpha: .9);
    position:fixed;
    bottom: 0;
    z-index: 999;
    transform: translateY(100%);
    animation: fade 1s .5s forwards;
    font-family: Helvetica, sans-serif;
    @media screen and (max-width: $break-small) {
      &.el-main{
      padding: 20px!important;
      }
    }
    @media screen and (max-width: $break-lsmall) {
      &.el-main{
      padding: 20px 0!important;
      }
    }
    .el-col{
      display: flex;
      flex-direction: column;
      &:first-child{
        padding: 0 20px 0 0;
      }
    }
    .content-layout{
      display: flex;
      flex-direction: row;
      align-items: flex-end;
      margin-top: 0!important;
      padding: 0 20px;
      @media screen and (max-width: $break-small) {
        flex-direction: column;
      }
    }
  }
  p, strong{
    color: white;
    margin-top: 0;
    font-weight: 700;
  }
  button{
    background: #FF6600;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 700;
    color: white;
    text-transform: uppercase;
    font-family: Helvetica, sans-serif;
    margin-top: 15px;
  }
  a{
    text-decoration: underline;
  }

  @keyframes fade{
    from { transform: translateY(100%)}
    to { transform: translateY(0%)}
  }
</style>
