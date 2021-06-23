<template>
     <div >
        <div class="row">
            <div class="col-6" >
                <div class="form-group">
                    <label class=" form-control-label">Search Product</label>
                    <div class="input-group">
                        <input class="form-control" name="part_no" v-model="search" autocomplete="off" ref="search">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-12 table-responsive">
                <table class="table table-bordered">
                    <thead v-if="data.length > 0">
                    <tr>
                        <th>S/L</th>
                        <th v-for="field in fields" v-bind:key="field">{{field}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(cu,index) in data"  v-bind:key="cu.name" :class="index == selected_index ? 'hovered' : ''" v-on:dblclick="selectData(cu,index)">
                        <td> {{index+1}}</td>
                        <td v-for="field in fields" v-bind:key="field">
                            {{cu[field]}}
                        </td>
                    </tr>
                    <tr v-if="data.length <= 0">
                        <h3>No dtata found. please create some data</h3>
                    </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</template>

<script>
    export default {
        // @keyup.down="getSelected($event)"
        name: 'Select Component',
        props:['query','fields','search_filed','table','where_value','where_field'],
        data(){
            return {
                menus : [],
                limit : 10,
                search : '',
                data : [],
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
                if(val != ''){
                    this.get_customers_by();

                }
            }
        },
        methods: {

            
            /* get item
         **/
            getSelected(val){
                console.log(val)
                if(val.key == 'Tab' || val.key == 'down'){
                    if(this.customers.length > this.selected_index+1){
                        this.selected_index = this.selected_index+1;
                    } else{
                        this.selected_index = this.selected_index-1;

                    }
                   
                }
            },
            get_customers_by:function(){

                var vm = this;
                axios.post('/quick/general',{
                    table:this.table,
                    fields:this.fields,
                    search : this.search,
                    search_filed : this.search_filed,
                    where_field : this.where_field,
                    where_value : this.where_value,
                }).then((response) => {
                    if(response.data.message == 'success'){
                        vm.data = response.data.data;
                        console.log('vm.data',vm.data)
                    }
                    // $("#itemModal").modal('toggle');
                }, (error) => {
                // vm.errors = error.errors;
                });

            },
            selectData(val,index){
                console.log('selected',val)
                this.$emit('selected',val)
                this.selected_index = index;
                this.search = '';
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
