<template>

  <v-layout id="layout">
    <div id="title">
      <slot name="before"></slot>
    </div>

    <div id="content" class="d-flex flex-column justify-space-around align-center flex-sm-row">
      <slot></slot>
    </div>


  </v-layout>
</template>

<style scoped>
  #layout{
    background-color:#D5F7FF;
    width:100vw;
    border-radius:60px;
    height:95vh;
    display:flex;
    flex-direction:column;
    justify-content:space-around;
  }

  #title{
    font-size:50px;
    color:#EDBF47;
  }




</style>
<script >

export default{
  data:() =>{
    return {
    }
  },
  props: {
    type: String
  },
  methods: {
    handleMouseOver(){
      console.log(this.type);
    }
  },
}
</script>