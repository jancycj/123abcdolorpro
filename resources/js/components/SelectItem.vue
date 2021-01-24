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
                        <th>part No</th>
                        <th>part name</th>
                        <th>part unit</th>
                        <th>part category</th>
                        <th>part type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(cu,index) in customers"  v-bind:key="cu.name" :class="index == selected_index ? 'hovered' : ''" @click="selectCustomer(cu,index)">
                        <td> {{index+1}}</td>
                        <td>{{cu.part_no}}</td>
                        <td>{{cu.name}}</td>
                        <td>{{cu.unit}}</td>
                        <td>{{cu.category}}</td>
                        <td>{{cu.part_type}}</td>
                        
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
            this.get_customers_by();
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
                axios.get('/quick/items?limit=5&name='+this.search+'&code='+this.search).then((response) => {
                    vm.customers = response.data;
                    // $("#itemModal").modal('toggle');
                }, (error) => {
                // vm.errors = error.errors;
                });

            },
            selectCustomer(val,index){
                this.selected_index = index;
                console.log(val)
                this.$emit('selected',val)
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
