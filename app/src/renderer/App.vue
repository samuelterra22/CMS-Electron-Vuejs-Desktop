<template>
    <div id="app">

        <header id="header">
            <nav class="navbar navbar-light bg-light">
                <span class="navbar-brand h1">
                    <i class="fa fa-space-shuttle"></i> CMS Electron
                </span>
            </nav>
        </header>

        <router-view></router-view>
    </div>
</template>

<script>
  export default {
    name: 'electron-cms'
  }
</script>

<style>
    #header {
        margin-bottom: 10px;
    }
</style>
