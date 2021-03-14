<template>
     <div @keydown="selectWithTab($event)">
        <div class="row">
            <div class="col-6" >
                <div class="form-group">
                    <label class=" form-control-label">Customer</label>
                    <div class="input-group">
                        <input class="form-control" name="part_no" v-model="search" autocomplete="off" ref="search">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-12 table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>code</th>
                        <th>name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(cu,index) in customers"  v-bind:key="cu.name" :class="index == selected_index ? 'hovered' : ''" v-on:dblclick="selectCustomer(cu,index)">
                        <td> {{index+1}}</td>
                        <td>{{cu.short_name}}</td>
                        <td>{{cu.name}}</td>
                        
                    </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</template>

<script>
    export default {
        name: 'navBar',
        props: {
            customer: {
                type: Boolean,
                default: false
            }
        },
        data(){
            return {
                menus : [],
                limit : 10,
                search : '',
                customers : [],
                selected_index:0,
                
            }
        },
        mounted() {
            this.$refs.search.focus();
        },
        created: function () {
           
        },
        watch:{
            search(val){
                this.get_customers_by();
            }
        },
        methods: {
            /* get item
         **/
            selectWithTab(val){
                console.log(val)
                if(val.key == 'Tab'){
                    if(this.customers.length > this.selected_index+1){
                        this.selected_index = this.selected_index+1;
                    } else{
                        this.selected_index = this.selected_index-1;

                    }
                   
                }
            },
            get_customers_by:function(){

                var vm = this;
                axios.get('/quick/customers?limit=5&name='+this.search+'&code='+this.search+'&is_customer='+this.customer).then((response) => {
                    vm.customers = response.data;
                    // $("#itemModal").modal('toggle');
                }, (error) => {
                // vm.errors = error.errors;
                });

            },
            selectCustomer(val,index){
                this.selected_index = index;
                console.log(val)
                this.$emit('customer',val)
            }
        }

    }
</script>
<style lang="css" scoped>
    
   tr.hovered {
        background: #6a93d9;
        color: white;
    }
</style>
