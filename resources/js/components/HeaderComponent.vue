<template>
     <div class="container-fluid bg-dark mb-3">
         <div class="container">
             <nav class="navbar navbar-dark">
                 <span class="navbar-brand mb-0 h1">MyRoom熱中症警報</span>
                 <div>
                        <router-link v-bind:to="{name: 'heatstroke.list'}">
                            <button class="btn btn-success">更新</button>
                        </router-link>
                 </div>
             </nav>
         </div>
     </div>
</template>
<script>
     export default {}
</script>