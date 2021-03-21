
<template>
    <div data-label="Example" class="df-example">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
            <a class="nav-link menu-item active" id="poform-tab" data-toggle="tab" href="#poform" role="tab" aria-controls="poform" aria-selected="true">Supply chain</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link menu-item" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">PPC</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link menu-item " id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Production</a>
            </li>
        </ul>
        <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" >
            <div class="tab-pane fade show active" id="poform" role="tablist" >
                <div class="table-responsive menu-container">
                    <h6>Masters</h6>

                    <table class="table mg-b-0" id="privilagesetting">
                        
                        <tbody>
                        <!-- <tr v-for="(x,y) in value.data"> -->
                        <tr >
                            <td scope="row">Lookup</td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">view</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">create</label>
                                </div>
                            </td>
                        </tr>
                        <tr >
                            <td scope="row">Item</td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">view</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">edit</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">delete</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">update</label>
                                </div>
                            </td>

                        </tr>
                        <tr >
                            <td scope="row">Rates</td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">view</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">edit</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">delete</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">update</label>
                                </div>
                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class="table-responsive menu-container">
                    <h6>Client</h6>

                    <table class="table mg-b-0" id="privilagesetting">
                        
                        <tbody>
                        <!-- <tr v-for="(x,y) in value.data"> -->
                        <tr >
                            <td scope="row">Client</td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">view</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">create</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">edit</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">delete</label>
                                </div>
                            </td>
                        </tr>
                       
                        

                        </tbody>
                    </table>
                </div>
                <div class="table-responsive menu-container">
                    <h6>Transavtions</h6>

                    <table class="table mg-b-0" id="privilagesetting">
                        
                        <tbody>
                        <!-- <tr v-for="(x,y) in value.data"> -->
                        <tr >
                            <td scope="row">PO</td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">view</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">create</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">edit</label>
                                </div>
                            </td>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">delete</label>
                                </div>
                            </td>
                        </tr>
                        <tr >
                            <td scope="row">PO Approval</td>
                            
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="perm.url" value="true">
                                    <label class="custom-control-label" for="perm.url">update</label>
                                </div>
                            </td>
                            
                            <td >
                                
                                <label class="" for="perm.url">Amount limit</label>
                                <input type="text" class="limit" id="perm.url" >

                            </td>
                        </tr>
                       
                        

                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="tab-pane fade" id="profile" role="tablist">
                <h6>Profile</h6>
                <p class="mg-b-0">Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat.</p>
            </div>
            <div class="tab-pane fade " id="contact" role="tablist">
                <h6>Contact</h6>
                <p class="mg-b-0">Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.</p>
            </div>
        </div>

        
    </div>
</template>
<style lang="scss" scoped>
.per-tab{
    padding:0px 10px;
}
 #userAdd.modal.right .modal-content{
        height: 100vh;
        overflow-y: hidden;
        .modal-body{
            height: calc(100vh - 136px);
            overflow: scroll;
        }
    }
    .menu-container {
    padding: 10px;
    border: 1px solid black;
    margin-bottom: 5px;
}
.limit {
    max-width: 90px;
}
</style>
<script>
    export default {
        props:['name','url'],
        data(){
            return{
                tab:1,
                class1:'',
                class2:'',
                class3:'',
                first_name:'',
                last_name:'',
                user:{},
                email:'',
                errors:'',
                permissions:[],
                loading:false,
                reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
                first_complete:false,
                second_complete:false,
                third_complete:false,
                removed_permissions:[],
                action_flag:false,
                email_selected:false,
                suggested_users:[],
                customToolbar: [
                    ["bold", "italic", "underline"],
                    [{ list: "ordered" }, { list: "bullet" }],
                    ["code-block"]
                ],
                invite_msg : '<p><br></p><p>You have been granted admin rights . Please use the below link to set your password and login.</p><p><br></p><p><br></p><p><br></p>',



            }
        },
        watch:{
            email: function (val) {
                // this.suggested_users = [];
                // if(!this.email_selected && val !=''){
                //     axios.get(this.url+'/api/users?email='+val).then((response) => {
                //             this.suggested_users = response.data;
                //         }, (error) => {
                //     });

                // }
                // this.email_selected = false;

             },
        },
        mounted() {
            console.log('Component mounted.');
            // this.getPermissions();

        },
        methods: {
             suggest_email : function(user){
                        this.email = user.email;
                        this.email_selected = true;
                        this.suggested_users = [];
                        this.user.email = user.email;
                        this.user.user_id = user.id;
                    },

            getPermissions:function(){

              var vm = this;
              vm.loading = true;
              axios.get('/v1/settings/permission').then(function(response){
                vm.permissions = response.data;

              }).catch(function(error){
                vm.loading = false;
              });
            },
            next:function(tab){
                var flag = false;
                switch(tab) {
                    case 1:
                         flag = this.check_first_stage();

                        break;
                    case 2:
                        flag = this.check_second_stage();
                        this.second_complete=true;
                        break;
                    case 3:
                        flag = this.check_third_stage();
                        this.third_complete=true;
                        break;
                    default:
                        // code block
                }
                if(flag){
                    this.tab = this.tab+1;
                }
                this.active = this.tab;
            },
            previous:function(tab){
                this.tab = this.tab-1;
                this.active = this.tab;
            },

            /**
            *Create the user
            */
            finish:function(){
                this.user.first_name = this.first_name;
                this.user.last_name = this.last_name;
                this.user.email = this.email;
                this.remove_permissions_by_array();
                axios.post('/v1/settings/user/create',{
                    permission:this.permissions,
                    user:this.user,
                    message:this.invite_msg
                    })
                .then(response => {
                    this.user = {};
                    this.first_name = '';
                    this.last_name = '';
                    this.email = '';
                    this.tab = 1;
                    this.getPermissions();
                    this.email_selected = true;
                    this.second_complete=false;
                    this.third_complete=false;
                    this.first_complete=false;

                    this.$emit('refresh',true);
                    this.active = 1;
                    this.$awn.success('The new user has been invited');

                })
                .catch((err) =>{
                    // this.job_errors = err.response.data.errors;
                    if(err.response.data.errors.email[0]) {
                        this.$awn.warning(err.response.data.errors.email[0]);
                    } else {
                        this.$awn.warning('A user is already exist on this email address..!');
                    }
                });
            },
            check_first_stage(){

                if(this.first_name==''){
                    this.errors='First name is required';
                    this.first_complete=false;
                    return false;
                }else{
                    this.first_complete=true;
                }
                 if(this.email==''){
                    this.errors='Email field is required';
                    this.second_complete=false;
                    return false;
                }
                if(!this.check_mail(this.email)){
                    this.errors='Choose a valid email';
                    this.third_complete=false;
                    return false;
                }
                this.errors='';
                // this.name = this.first_name;
                return true;
            },
            check_second_stage(){
                return true;
            },
            check_third_stage(){
                return true;
            },
            // check mail
			check_mail(mail){
				return this.reg.test(mail);
			},
            select_all_permission(name,refName){
                var title = name;
                // alert(name);
               if(this.$refs[refName][0].checked==true){

                   _.each(this.permissions, function(a){
                        if(a.name==title){
                            _.each(a.data,function(key,value){
                                _.map(key, function(el){

                                    return el.value=true;

                                });
                            })
                        }
                    });
                //    console.log( this.permissions);
               }else{
                   _.each(this.permissions, function(a){
                        if(a.name==title){
                            _.each(a.data,function(key,value){
                                _.map(key, function(el){

                                    return el.value=false;

                                });
                            })
                        }
                    });
               }
            },
            /**
            *select all privilages
            */
            select_all_priviliages:function(){
                _.each(this.permissions, function(a){
                        _.each(a.data,function(key,value){
                            _.map(key, function(el){

                                return el.value=true;

                            });
                        })
                    });
            },

            /**
            *select all privilages
            */
            de_select_all_priviliages:function(){
                _.each(this.permissions, function(a){
                        _.each(a.data,function(key,value){
                            _.map(key, function(el){

                                return el.value=false;

                            });
                        })
                });
            },
            // checking the array whether all value true or not
            isAllTrue:function(data){

                var vl = 't';
                _.each(data,function(key,value){
                    _.each(key,function(el){
                        if(el.value===false){

                                vl='f';
                        }
                    })
                })

                return vl==='t';
            },

            /**
            *Pushing the toggle button item to the array
            */
            remove_permission:function(value, title){

               if(!value){
                   this.removed_permissions.push(title);
               }else{

                   this.removed_permissions.splice(this.removed_permissions.indexOf(title), 1);
               }
               console.log(this.removed_permissions);
            },

            /**
            *Removing the permission by toggle button selected item array
            */
            remove_permissions_by_array:function(){
                var vm = this;
                _.each(vm.removed_permissions,function(el){
                        vm.permissions = _.map(vm.permissions, function(o) {
                            if (o.name != el) return o;
                        });
                    })
                vm.removed_permissions = [];
            },

            /*
            refersh modal data
            **/
            refresh_modal : function(){
                this.user = {};
                this.first_name = '';
                this.last_name = '';
                this.email = '';
                this.tab = 1;
                this.getPermissions();
                this.email_selected = true;
                this.second_complete=false;
                this.third_complete=false;
                this.first_complete=false;
                this.$emit('refresh',true);
                this.active = 1;
            }
        },
    }
</script>
<style>
.suggest{
    position: relative !important;
}
.suggest-drop{
    width: 100%;
    border: none;

}
.suggest-drop a{
    font-size: 13px !important;
    color: #7d7777;
}
.avtr-suggest{
    width: 25px !important;
    height: 25px !important;
    margin-right: 5px;
}

</style>
<style scoped>

    .nav-tabs .nav-link {
        font-size: 11px;
    }
</style>
