<template>
<div>
    <toolbar></toolbar>
     <router-view></router-view>
    <app-footer></app-footer>
        
</div>
</template>

<script>

import toolbar from './ToolBar';
import AppFooter from './AppFooter';
import login from './Login/login';

export default {
components:{toolbar,AppFooter,login}

}
</script>

<style>

</style>