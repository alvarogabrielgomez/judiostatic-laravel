<template>
    <div class="clock-time-deals" v-bind:class="classClock">

    </div>

</template>

<script>
export default {
    name:'clock-sm',
    props:["post_offer_end_at", "post_updated_at"],
    data(){
        return{
            clock: 100,
            classClock:"clock-100",

            endAt: this.post_offer_end_at,
            updatedAt: this.post_updated_at,
            countdown: true,
            speedy:false,
            postOfferFormated: "",
        }
    },
    mounted(){
       
    },
    updated(){

            

    },
    computed:{

        classClockFF: function(){
            if(this.speedy == false){
                if(this.clock == 100){
                    this.classClock = "clock-100";
                }
                if(this.clock == 90){
                    this.classClock = "clock-90";
                }
                if(this.clock == 70){
                    this.classClock = "clock-70";
                }                    
                if(this.clock == 30){
                    this.classClock = "clock-30";
                }
                if(this.clock == 25){
                    this.classClock = "clock-25";
                }
                if(this.clock == 15){
                    this.classClock = "clock-15";
                }
                if(this.clock == 7){
                    this.classClock = "clock-7";
                }
            }else{
                this.classClock = "clock-speedy";
            }
            return this.classClock;
        }

    },
    methods:{

    }
}
</script>

