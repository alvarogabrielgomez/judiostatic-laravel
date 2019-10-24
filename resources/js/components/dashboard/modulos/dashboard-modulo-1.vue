<template>
  <div class="content-modulo modulo-row">
      <div id="dashboard-lista-deals">
          <div class="dashboard-item-lista-deals">
              <div class="dashboard-item-avatar-icon"></div>
              <div class="dashboard-item-text-container">
                  <div class="dashboard-item-text item-text-titulo">Lorem Ipsum</div>
                  <div class="dashboard-item-text item-text-buss">
                      <div class="item-icon-button">></div>
                      <div class="item-text-button">Lorem inc</div>
                      </div>
                  <div class="dashboard-item-text item-text-desc">Lorem dolor sit amet consesct</div>
              </div>
          </div>
      </div>
      <div id="dashboard-details-deals">
          Test
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            loading: false,
            loadingMss: false,
            responseMss: "success",
            responseContent: "",
            userdata:{},
        }
    },
    mounted(){
        this.userdata = this.$store.state.userdata;
    },
}
</script>

<style>
.dashboard-item-avatar-icon{
    width: 45px;
    margin: 0px 7px;
    position: relative;
}
.dashboard-item-text-container{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.item-text-titulo{
    
}
.item-text-buss{
 color:var(--highlight-input);
 transition: all .09s ease-in-out;
}
.item-text-desc{

}
.dashboard-item-text{
    width: 100%;
    height: 24px;
    overflow: hidden;
    font-size: 14px;
    display: flex;
    flex-direction: row;
}

#dashboard-lista-deals{
    display: flex;
    width: 100%;
    max-width: 330px;
    height: 100%;
    background: azure;
    top: 0px;
    left: 0px;
    min-height: 100vh;
    flex-direction: column;
    flex-wrap: wrap;
    flex-grow: 1;
    
}
.dashboard-item-lista-deals{
    width: 100%;
    height: auto;
    background-color: #fdfdf7;
    padding: 8px;
    box-sizing: border-box;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    cursor: pointer;
    transition: all .09s ease-in-out;
}
.dashboard-item-lista-deals:hover{
    background-color: var(--highlight-input);
    color:white!important;
}
.dashboard-item-lista-deals:hover > .dashboard-item-text-container > .item-text-buss{
    color:white!important;
    transition: all .09s ease-in-out;
}

.dashboard-item-lista-deals:hover > .dashboard-item-text-container > .item-text-buss > .item-icon-button{
    color:white!important;
    transition: all .09s ease-in-out;
    background: #1e70b3;
}

.item-text-button{
    width:fit-content;
    box-sizing: border-box;
    padding: 3px;
    padding: 0px 10px;
    transform: translateX(-10px);
    display: flex;
    flex-direction: row;
}
.item-icon-button{
    width: 18px;
    height: 18px;
    color: white;
    border-radius: 50px;
    display: flex;
    background: #5ba1e4;
    justify-content: center;
    justify-items: center;
    align-items: center;
    font-size: 12px;
    align-self: center;
    align-content: center;
    margin-right: 6px;
}

.item-icon-button:hover ~ .item-text-button{
    background: white;
    color: black;
    border-radius: 4px;
    transform: translateX(0px);
    transition: all .09s ease-in-out;
}

#dashboard-details-deals{
display: flex;
    width: 100%;
    height: 100%;
    min-height: 100vh;
    background: #fff;
    top: 0px;
    right: 0px;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    flex-grow: 2;
}
</style>