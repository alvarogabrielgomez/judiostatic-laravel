<template>
  <div class="content-modulo modulo-row">
      <div id="dashboard-lista-deals">
          <transition name="fade" >
                <div v-show="loadingMss" id="loading-overlay" style="max-height: calc(100vh - 110px);">
                    <div class="loader-small-container">
                        <div class="loader-small"></div>
                    </div>
                </div>
          </transition>
          <div class="dashboard-item-lista-deals" v-for="post in postsActive" v-bind:key="post.transaction_id" @click="openPost(post.transaction_id)">
              <div class="dashboard-item-avatar-icon"></div>
              <div class="dashboard-item-text-container">
                  <div class="dashboard-item-text item-text-titulo"><span>{{post.title}}</span></div>
                  
                  <div class="dashboard-item-text item-container-row">
                  <div class="dashboard-item-text item-text-buss">
                      <div class="item-icon-button">></div>
                      <div class="item-text-button"><span>{{post.buss_name}}</span></div>
                      </div>
                    <div class="dashboard-item-text item-text-date">
                        <span>{{post.created_at}}</span>
                    </div>
                    </div>


                  <div class="dashboard-item-text item-text-desc"><span>{{post.description}}</span></div>
              </div>
          </div>

      </div>
      <div id="dashboard-details-deals">
        <div class="dashboard-details-deals-header">
            <div class="dashboard-details-deals-header-title"><span>PromoÃ§Ã£o do Ximxim de Galinha 2x3</span></div>
            <div class="dashboard-details-deals-header-container-row">
                <div class="dashboard-details-deals-header-buss"><span>Vallar Vergulis</span></div>
                <div class="dashboard-details-deals-header-data"><span>2019-10-24 </span></div>
            </div>
            <div class="dashboard-details-deals-header-desc"><span>Um saboroso prato de promoÃ§Ã£o do Xi</span></div>
        </div>
          <div class="card card-md card-item-deals" >
            <div class="card-header"></div>
            <div class="card-hero-img"></div>
            <div class="card-text">
                <span>Lorem Ipsum Dolor Sir Amet Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis reprehenderit, dolores doloremque expedita nulla corrupti, qui aut, perferendis harum eum libero deserunt voluptates. Non qui, illum totam at a placeat?</span>
            </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name:'dashboard-modulo-1',
    data(){
        return{
            postsActive: [],
            loadingMss: true,
            responseMss: "success",
            responseContent: "",
            
            userdata:{},
        }
    },
    mounted(){
        this.userdata = this.$store.state.userdata;
        this.loadPostsActive();
    },
    methods:{
    openPost: function(id){
        console.log(id);
    },

    loadPostsActive: function(){
        axios.get("/api/v1/get/activeCoupons", {
            params: {
            client_id: this.userdata.id
            }
        })
        .then(res => {
          this.postsActive = res.data.data;
          this.loadingMss = false;
          this.responseMss = res.data.response;
          this.responseContent =  res.data.message;
        })
        .catch(err => {
          console.log(err);
          this.responseMss = "error";
          this.loadingMss = false;
          this.responseContent =  err.data.message;
        });
      return this.postsActive;
    },

    },
}
</script>

<style>
.dashboard-item-avatar-icon{
    width: 45px;
    margin: 0px 7px;
    position: relative;
    min-width: 45px;
}
.dashboard-item-text-container{
    width: calc(100% - 67px);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.item-text-titulo{
width: 100%;
font-size: 14px;
}
.item-text-buss{
 color:var(--highlight-input);
 transition: all .09s ease-in-out;
 width: 70%;
 font-size: 14px;
}
.item-text-desc{
width: 100%;
font-size: 14px;
}

.item-text-date{
    width: 30%;
    font-size: 12px;
    font-weight: 600;
        color: #828282;
}

.dashboard-item-text{
    /* width: 100%; */
    height: 24px;
    overflow: hidden;
    /* font-size: 14px; */
    display: flex;
    flex-direction: row;
}
.dashboard-item-text span{
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

#dashboard-lista-deals{
    display: flex;
    width: 100%;
    max-width: 358px;
    height: 100%;
    background: #f4f6fb;
    top: -1px;
    left: 0px;
    min-height: calc(100vh - 110px);
    flex-direction: column;
    flex-wrap: nowrap;
    flex-grow: 1;
    position: relative;
    overflow-x: auto;
}
.dashboard-item-lista-deals{
    position: relative;
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
    z-index:1000;
    box-shadow: 0px 15px 20px -14px hsla(233, 1%, 69%, 0.28);
    border: 1px solid #f3f2f2;
    
}
.dashboard-item-lista-deals:hover{
    background-color: var(--highlight-input);
    color:white!important;
    border: 1px solid var(--highlight-input);
}
.dashboard-item-lista-deals:hover > .dashboard-item-text-container > .item-container-row > .item-text-buss{
    color:white!important;
    transition: all .09s ease-in-out;
}

.dashboard-item-lista-deals:hover > .dashboard-item-text-container > .item-container-row > .item-text-date{
    color:white!important;
    transition: all .09s ease-in-out;
}

.dashboard-item-lista-deals:hover > .dashboard-item-text-container > .item-container-row > .item-text-buss > .item-icon-button{
    color:white!important;
    /* transition: none; */
    background: #1e70b3;
}
.item-container-row{
    width: 100%;
    flex-wrap: nowrap;
    justify-content: space-between;
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
    min-width: 18px;
    min-height: 18px;
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
    /* transition: none; */
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
    min-height: calc(100vh - 110px);
    background: #fff;
    top: 0px;
    right: 0px;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    align-items: center;
    flex-grow: 2;
}


.card{
    display: flex;
    flex-direction: column;
    position: relative;
    box-sizing: border-box;
    padding: 12px;
    border-radius: 10px;
    text-decoration: none;
    list-style: none;
    border-color: rgba(173,124,124,.19);
    border-style: solid;
    border-width: 1px;
    transition: all .2s ease;
    overflow: hidden;
    text-overflow: ellipsis;
    overflow: hidden;
}

.card-md{
padding: 4%;
}

.card-item-deals{
    width: 82%;
    max-width: 730px;
}
.dashboard-details-deals-header{
    position: relative;
    width: 100%;
    height: auto;
    background: hsla(60, 46%, 97%, 1);
    display: flex;
    flex-direction: column;
}
.dashboard-details-deals-header-title{

}
.dashboard-details-deals-header-buss{

}
.dashboard-details-deals-header-data{

}
.dashboard-details-deals-header-desc{

}
.dashboard-details-deals-header-container-row{

}

</style>