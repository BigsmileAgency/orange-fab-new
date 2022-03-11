<template>
  <div class="apply__blocs--container">
    <div class="apply-bloc" v-for="(bloc, i) in this.$t('pages.whoWeAre.apply.blocs')" :key="i" :class="{'orange' : bloc.image == 'orange'}">
      <router-link :to="{name : 'join_us_child'}" v-if="i == 0">
        <figure :class="bloc.color" :style="{backgroundImage: 'url(' + require('@/assets/body/who/'+ bloc.image +'.png') + ')'}"></figure>
        <div class="bot-bloc">
          <h4>{{ bloc.title }}</h4>
          <p v-if="bloc.description" v-html="bloc.description"></p>
        </div>
      </router-link>
      <template v-else>
        <figure :class="bloc.color" :style="{backgroundImage: 'url(' + require('@/assets/body/who/'+ bloc.image +'.png') + ')'}"></figure>
        <div class="bot-bloc" v-if="bloc.image != 'orange'">
          <h4>{{ bloc.title }}</h4>
          <p v-if="bloc.description" v-html="bloc.description"></p>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
