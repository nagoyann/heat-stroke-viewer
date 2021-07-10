<template>
     <div class="container">
         <table class="table table-hover">
             <thead class="thead-light">
             <tr>
                 <th scope="col">日時</th>
                 <th scope="col">気温</th>
                 <th scope="col">湿度</th>
                 <th scope="col">メモ</th>
             </tr>
             </thead>
             <tbody>
             <tr v-for="(heatstroke, index) in heatstrokes" :class="getBgColor(heatstroke.status)">
                <td>{{ heatstroke.date }}</td>
                <td>{{ heatstroke.temp }}℃</td>
                <td>{{ heatstroke.wet }}％</td>
                <td>{{ heatstroke.remarks }}</td>
             </tr>
             </tbody>
         </table>
     </div>
</template>
 
<script>
    export default {
        data: function () {
            return {
                heatstrokes: []
            }
        },
        methods: {
            getHeatStrokes() {
                axios.get('/api/hs')
                    .then((res) => {
                        this.heatstrokes = res.data;
                    });
            },
            getBgColor(status)
            {
                if(status == 9)
                    return "red";
                else if(status == 1 || status == 2)
                    return "yellow";
                else
                    return "green";
            }
        },        
        mounted() {
            this.getHeatStrokes();
            this.timer = setInterval(this.getHeatStrokes, 60000);
        }
    }
</script>

<style scoped>
    .red
    {
        background-color: #FF0000;
    }

    .yellow
    {
        background-color: #FFFF66;
    }

    .green
    {
        background-color: #A9D08E;
    }
</style>