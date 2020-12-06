<template>
     <ul class="nav navbar-menu">
           <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
           <li class="nav-item  ">
           <a href="/home" class="nav-link"><i data-feather="pie-chart"></i> Home</a>
           </li>

           <li class="nav-item " :class="menu.sub_menus.length > 0 ?'with-sub ' :''" v-for="menu in menus" v-bind:key="menu.menu">
            <a :href="menu.url" class="nav-link"><i data-feather="package"></i> {{menu.menu}}</a>
            <ul class="navbar-menu-sub" >
                <li class="nav-sub-item" v-for="sub_menu in menu.sub_menus" v-bind:key="sub_menu.menu"><a :href="sub_menu.url" class="nav-sub-link"><i data-feather="message-square"></i>{{sub_menu.menu}}</a></li>
            </ul>
          </li>
          
         </ul>
         
</template>

<script>
    export default {
        name: 'navBar',
        data(){
            return {
                menus : [],
                
            }
        },
        mounted() {
            $('#acc_dropdown').click(function() {
                $('.acc_dropdown').toggleClass('show');
            });
            $('#mainMenuOpen').on('click touchstart', function(e){
                e.preventDefault();
                $('body').addClass('navbar-nav-show');
            });
            $('#mainMenuClose').on('click', function(e){
                console.log('ddddd')
                e.preventDefault();
                $('body').removeClass('navbar-nav-show');
            });
            
        },
        created: function () {
            if (localStorage.menus) {
                this.menus = JSON.parse(localStorage.menus);
            }
            $('.navbar-menu .with-sub .nav-link').on('click', function(e){
                $(this).parent().toggleClass('show');
                $(this).parent().siblings().removeClass('show');

                if(window.matchMedia('(max-width: 991px)').matches) {
                psNavbar.update();
                }
            })
        },
        methods: {
        }

    }
</script>
<style lang="css" scoped>
    
</style>
