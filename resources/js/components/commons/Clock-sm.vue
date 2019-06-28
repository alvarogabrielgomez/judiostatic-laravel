<template>
    <div class="clock-time-deals" v-bind:class="classClock" :key="clock">

    </div>

</template>

<script>

export default {
    
    name:'clock-sm',
    props:["post_offer_end_at", "post_created_at", "realtime"],
    data(){
        return{
            clock: 7,
            classClock:"clock-7",
            endAt: Date.parse(this.post_offer_end_at)/1000, //esto transforma en srtDate
            createdAt: Date.parse(this.post_created_at)/1000,
            now: Math.round(Date.now()/1000),
            countdown: true,
            live:this.realtime.toLowerCase() == 'true' ? true:false, // convierte en booleano
            speedy:false,
            x:0,
        }
    },
    created(){
    this.dateFF();
    },
    updated(){
    this.classClockFF();
    },

    computed:{
        computando :function(){
            return this.classClockFF();
        }
    },
    methods:{
        classClockFF: function(){ 
            if(this.countdown == true){
                if(this.speedy == false){
                    if(this.clock >= 100){
                        this.classClock = "clock-100";
                    }
                    if(this.clock >= 90 && this.clock < 100){
                        this.classClock = "clock-90";
                    }
                    if(this.clock >= 70 && this.clock < 90){
                        this.classClock = "clock-70";
                    }                    
                    if(this.clock >= 30 && this.clock < 70){
                        this.classClock = "clock-30";
                    }
                    if(this.clock >= 25 && this.clock < 30){
                        this.classClock = "clock-25";
                    }
                    if(this.clock >= 15 && this.clock < 25){
                        this.classClock = "clock-15";
                    }
                    if(this.clock >= 0 && this.clock < 15){
                        this.classClock = "clock-7";
                    }
                }else{
                    this.classClock = "clock-speedy";
                }
            }else{
                this.classClock = "clock-classic"
            }
            this.$store.state.clock = this.classClock;
            return this.classClock;
            
        },


        dateFF: function(){
            var a = Math.abs(this.endAt - this.createdAt); //100%
            var c = this.now - this.endAt;
            this.x = Math.abs(parseInt(100 * c / a));
            this.clock = this.x; 
            return this.classClockFF();
        },

    }
}
</script>

