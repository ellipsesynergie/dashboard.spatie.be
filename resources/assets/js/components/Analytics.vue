<template>
   <grid :position="grid" modifiers="padded">
      <section class="analytics">
         <h1>{{website}} Pages View</h1>
         <div class="rain-forecast__graph ">
            <graph
                 :labels="days"
                 :values="pageViews"
                 line-color="rgba(19,134,158, .75)"
                 background-color="rgba(19,134,158, .25)"
                 :displayXLabels="true"
                 :displayYLabels="true"
                 :maxTicksLimit="7"
                 :suggestedYMax="50"
                 :pointRadius="2"
            ></graph>
         </div>
      </section>
   </grid>
</template>
<script>

    import echo from '../mixins/echo';
    import saveState from 'vue-save-state';
    import Graph from './Graph';
    import Grid from './Grid';

    export default {

        components: {
            Grid,
            Graph
        },

        mixins: [echo, saveState],

        props: ['grid', 'website', 'view'],

        data() {
            return {
                days: [],
                pageViews: []
            }
        },

        methods: {

           getEventHandlers() {
               return {
                   [`Analytics.AnalyticsFetched.${this.view}`] : response => {
                       this.days = response.analytics.days;
                       this.pageViews = response.analytics.pageViews;
                   }
               }
           },

            getSaveStateConfig() {
                return {
                    cacheKey: 'analytics.' + this.view,
                };
            },
        }
    }
</script>