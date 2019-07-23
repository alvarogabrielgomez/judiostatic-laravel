<template>
  <div id="time-bar-container">
    <nav v-if="this.sm == false">
      <ul>
        <div class="clock-time-deals" v-bind:class="classClock" :key="clock"></div>
        <li>{{this.message}}</li>
      </ul>
    </nav>

    <div
      v-if="this.sm == true && this.countdown == true"
      class="clock-time-deals"
      v-bind:class="classClock"
      :key="clock"
    ></div>
  </div>
</template>

<script>
export default {
  name: "clock-sm",
  props: ["post_offer_end_at", "post_created_at", "realtime", "small"],
  data() {
    return {
      clock: 7,
      sm: this.small.toLowerCase() == "true" ? true : false, // convierte en booleano
      classClock: "clock-7",
      endAt: Date.parse(this.post_offer_end_at) / 1000, //esto transforma en srtDate
      endAtFormatted: "",
      createdAt: Date.parse(this.post_created_at) / 1000,
      now: Math.round(Date.now() / 1000),
      countdown: true,
      live: this.realtime.toLowerCase() == "true" ? true : false, // convierte en booleano
      speedy: false,
      x: 0,
      message: "message",
      test:0,
      test2:0,
    };
  },
  created() {
    this.dateFF();
    this.test = this.endAt - this.createdAt;
    this.test2 = this.test / 86400;
  },
  updated() {
    this.classClockFF();
  },

  computed: {
    computando: function() {
      return this.classClockFF();
    }
  },
  methods: {
    dateFF: function() {
      if (this.post_offer_end_at != "" && this.post_offer_end_at != null) {
        this.countdown = true;
        console.log((this.endAt - this.createdAt));

        if (this.createdAt < this.endAt) {
          var a = Math.abs(this.createdAt - this.endAt); //100%
          var c = Math.abs(this.createdAt - this.now);
          this.x = Math.abs(parseInt((100 * c) / a));

          if (Math.abs((this.endAt - this.createdAt)) <= 3 * 86400) {
            this.speedy = true;
            this.clock = this.x;
            console.log("speedy");

          } else {
            this.speedy = false;
            if (this.x > 30 && this.x < 97) {
              if (this.x > 30 && this.x > 70) {
                this.clock = this.x + 12;
              } else {
                this.clock = this.x + 7;
              }
            } else if (this.x >= 97 || this.x <= 30) {
              this.clock = this.x;
            }
          }
        } else {
          this.x = 111;
          this.clock = 111;
        }
      } else {
        this.countdown = false;
      }
      return this.classClockFF();
    },


    classClockFF: function() {
      if (this.countdown == true) {
        if (this.speedy == false) {
          if (this.clock >= 100) {
            this.classClock = "clock-100";
          }
          if (this.clock >= 90 && this.clock < 100) {
            this.classClock = "clock-90";
          }
          if (this.clock >= 70 && this.clock < 90) {
            this.classClock = "clock-70";
          }
          if (this.clock >= 30 && this.clock < 70) {
            this.classClock = "clock-30";
          }
          if (this.clock >= 25 && this.clock < 30) {
            this.classClock = "clock-25";
          }
          if (this.clock >= 15 && this.clock < 25) {
            this.classClock = "clock-15";
          }
          if (this.clock >= 0 && this.clock < 15) {
            this.classClock = "clock-7";
          }
        } else {
          if (this.clock < 100) {
            this.classClock = "clock-speedy";
          } else {
            this.classClock = "clock-100";
          }
        }
      } else {
        this.classClock = "clock-classic";
      }
      this.datelimit();
      this.$store.state.clock = this.classClock;
      return this.classClock;
    },


    datelimit: function() {
      var date = new Date(this.post_offer_end_at);
      var date =
        date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
      this.endAtFormatted = date;
      return this.messageClock();
    },

    messageClock: function() {
      if (!this.sm) {
        if (this.countdown) {
          if (!this.speedy) {
            if (this.clock >= 100) {
              this.message = "A oferta terminou no dia " + this.endAtFormatted;
            }
            if (this.clock >= 90 && this.clock < 100) {
              this.message =
                "A oferta está prestes a terminar no dia " +
                this.endAtFormatted;
            }
            if (this.clock < 90 && this.clock >= 0) {
              this.message = "A oferta termina no dia " + this.endAtFormatted;
            }
          } else {
            // es speedy
            if (this.clock < 100) {
              this.message =
                "A oferta está prestes a terminar no dia " +
                this.endAtFormatted;
            } else {
              this.message = "A oferta terminou no dia " + this.endAtFormatted;
            }
          }
        } else {
          var dateformatted = new Date(this.post_created_at);
          this.message = dateformatted.getDate() + "-" + (dateformatted.getMonth() + 1) + "-" + dateformatted.getFullYear(); // no es countdown
        }
      }
    }
  }
};
</script>

