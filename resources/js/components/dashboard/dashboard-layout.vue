<template>
  
        <div>
        <div id="dashboard-action-bar">
            <div id="btn-show-menu" class="btn-action-bar btn-action-icon" @click='hideSidebarToggle()'><i class="fas fa-bars"></i></div>
            <div id="btn-explorar" class="btn-action-bar btn-action-primary red">Explorar</div>
        </div>
        <div id="main-container" class="dashboard-container">
            <div id="sidebar-dashboard" v-bind:class="{'sidebar-detached-hide': hideSidebar}">
                <nav class="sidebar-menu">
                    <ul>
                        <li>
                            
                            <a href="#" v-on:click="modulo = 1">
                                <div class="sidebar-icon"><i class="fas fa-qrcode"></i></div>
                                <div class="sidebar-label">Cupones Activos</div>
                            </a>
                            <div class="sidebar-menu-hover"></div>
                        </li>
                        <li>
                        
                            <a href="#" v-on:click="modulo = 2">
                                    <div class="sidebar-icon"><i class="fas fa-clock"></i></div>
                                    <div class="sidebar-label">Historial</div>
                            </a>
                            <div class="sidebar-menu-hover"></div>
                        </li>
                        <li>
                            
                            <a href="#" v-on:click="modulo = 3">
                                <div class="sidebar-icon"><i class="far fa-check-circle"></i></div>
                                <div class="sidebar-label">Por calificar</div>
                            </a>
                            <div class="sidebar-menu-hover"></div>
                        </li>
                        
                        <li class = "sidebar-menu-list" id='menu-list-config'>
                            
                                <a href="#" onclick="custom.toggleSidebarMenu('menu-list-config')">
                                    <div class="sidebar-icon"><i class="fas fa-cogs"></i></div>
                                    <div class="sidebar-menu-arrow arrow"></div>
                                    <div class="sidebar-label">Configuraciones</div>
                                </a>
                                <div class="sidebar-menu-hover"></div>
                                <nav class="sidebar-menu-list-items">
                                <ul>
                                  <li><a class="sidebar-list-item" href="#" v-on:click="modulo = 4, configmodule = 1">Lorem</a></li>
                                  <li><a class="sidebar-list-item" href="#" v-on:click="modulo = 4, configmodule = 1">Lorem</a></li>
                                  <li><a class="sidebar-list-item" href="#" v-on:click="modulo = 4, configmodule = 1">Lorem</a></li>
                                  <li><a class="sidebar-list-item" href="#" v-on:click="modulo = 4, configmodule = 1">Lorem</a></li>

                                </ul>
                                </nav>
                            </li>

                    </ul>
                </nav>
            </div>
             <div class="dashboard-main" v-bind:class="{'main-dashboard-fullsize': hideSidebar, 'main-dashboard-spacesidebar':!hideSidebar}">

                 <transition name="fade">
                    <div class="card-dashboard" v-if="modulo == 1">
                        <dashboard-modulo-1></dashboard-modulo-1>
                    </div>
                </transition>

                <transition name="fade">
                    <div class="card-dashboard" v-if="modulo == 2">
                        <dashboard-modulo-2 ></dashboard-modulo-2>
                    </div>
                </transition>

                <transition name="fade">
                    <div class="card-dashboard" v-if="modulo == 3">
                        <dashboard-modulo-3></dashboard-modulo-3>
                    </div>
                </transition>

                <transition name="fade">
                    <div class="card-dashboard" v-if="modulo == 4">
                        <dashboard-modulo-4 :configmodule = configmodule></dashboard-modulo-4>
                    </div>
                </transition>
    
                    
             </div>
        </div>
        </div>
        
    

</template>

<script>
export default {
    name:'dashboard-layout',
    props:{
        userdata:{
            required: true
        },
    },
    data(){
        return{
            loading: false,
            loadingMss: false,
            responseMss: "success",
            responseContent: "",
            loged: false,
            modulo: 1,
            configmodule: 1,
            hideSidebar:false,
        }
    },
    beforeMount(){
        this.$store.state.userdata = JSON.parse(this.userdata);
    },
    mounted(){
        if(this.$store.state.userdata.email != ""){
            this.loged = true;
        }
      this.unshowLoadingExterno();
    },
    updated(){
        if(this.hideSidebar){
            return;
        }
    },
    methods:{

    hideSidebarToggle: function (){
       this.hideSidebar = !this.hideSidebar;
       console.log("test");
    },

    unshowLoadingExterno: function(){
        setTimeout(() => {
            document.getElementById("loading-overlay").classList.toggle("loading-overlay-hide");
        }, 80);
    },

    }
}
</script>

<style>
#dashboard-action-bar{
position: relative;
    width: 100%;
    height: 50px;
    display: flex;
    flex-direction: row;
    background-color: #fbfbf2;
    border-bottom: 1px solid #f3f2f2;
}
#btn-explorar{

}
#btn-show-menu{
    margin-left: 5px;
}
.btn-action-bar{
    padding: 10px;
    border: none;
    color: white;
    vertical-align: middle;
    display: flex;
    justify-content: center;
    justify-items: center;
    align-items: center;
    align-content: center;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all .4s ease;
    margin: 4px 0px;
}
.btn-action-bar:hover{
    background-color: #f0e8e5;
    transition: all .4s ease;
}
.btn-action-primary{
    border-radius: 4px;
    padding: 10px;
    margin: 5px 7px;
    box-shadow: 0px 1px 2px 0px rgba(128,128,128,.49);
}
.btn-action-icon{
    width: 30px;
    padding: 9px;
    color: black;
}

.dashboard-main{
   transition: width 0.2s ease-out;
    min-height: calc(100vh - 110px);
    position:absolute;
    display:flex;
    flex-direction:column;
    right: 0px;
}

</style>