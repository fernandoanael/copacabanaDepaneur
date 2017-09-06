<template>
    <div class="_f-container _f-ordernew-padding">
        <h3 class="text-center">New Order</h3>
        <div class="_f-flex-center">
            <select class="form-control form-control-sm _f-sm-select" v-model="selectedEmployee" >
                <option disabled value="">Select Employee</option>
                <option v-for="employee in employees" :value="employee.id">{{employee.name}}</option>
            </select>
        </div>
        <h5 class="text-center">Order details</h5>
        <table class="table table-sm table-hover _f-orderselected-table-scroll">
            <tbody>
                <tr v-for="product in selectedProducts">
                    <td>{{product.name}}</td>
                    <td>x{{product.quantity}}</td>
                    <td>${{product.prePrice}}</td>
                </tr>
            </tbody>
        </table>
        <hr class="_f-total-line">
        <div class="_f-flex-center">
            <div class="row _f-total-container">
                <div class="col-6">
                    Total:
                </div>
                <div class="col-6 text-right font-weight-bold">
                    ${{totalPrice}}
                </div>
            </div>
        </div>
        <div class="_f-flex-center">
            <button v-if="totalPrice > 0 && selectedEmployee !== '' "
                    v-on:click="saveOrder"
                    class="btn btn-outline-info _f-save-order-btn"
            >
                        Confirm Order
            </button>
        </div>
    </div>
</template>

<script>
import bus from '../bus';
export default {
  data: function(){
      return{
          employees: [],
          selectedEmployee: '',
          selectedProducts: [],
          orderPackage: {}
      }
  },
  methods: {
      saveOrder: function(){
          this.orderPackage.selectedProducts = this.selectedProducts;
          this.orderPackage.selectedEmployee = this.selectedEmployee;
          this.orderPackage.totalPrice = this.totalPrice;
            //console.log(this.orderPackage.selectedProducts);
            
          axios.post('http://localhost:3000/api/saveOrder', this.orderPackage)
               .then(function(response){
                   console.log(response);
                   if(response.data == 'saved'){
                       Vue.swal('Order Saved', 'Your order was successfully received', 'success')
                          .then(()=>{
                              location.reload();
                        });
                       
                   }
               })
               .catch(function(e){
                   console.error(e);
               });
      }
  },
  created: function(){
      axios.get('http://localhost:3000/api/employees')
           .then((response)=>{
               this.employees = response.data;
           })
           .catch(function(e){
               console.error(e);
           });
        /* NEW PRODUCT ADDED */
        bus.$on('addBuy', (product) => {
            //Gotta check if it's empty to avoid errors
            if(this.selectedProducts.length >=1 ){
                // tell if product exists and where
                var flag = [false, 0];

                //Check if Product already exist in the array
                for(let i = 0; i < this.selectedProducts.length; i++){
                    var element = this.selectedProducts[i];
                    
                    if(element.id == product.id){
                        flag[0] = true;
                        flag[1] = i; // flag position
                    }
                }
                // If true, just add and let vue know
                if(flag[0] == true){
                    var element = this.selectedProducts[flag[1]];
                    
                    element.prePrice += product.price;
                    //Round number
                    element.prePrice = Number((element.prePrice).toFixed(1));
                    element.quantity += 1;
                    Vue.set(this.selectedProducts, flag[1], element);

                // Else just push new product
                }else{
                    
                    product.prePrice = product.price;
                    product.quantity = 1;
                    this.selectedProducts.push(product);
                    
                }
                flag[0] = false;
            //If no products buyed add first one
            }else{
                console.log('zero');
                product.prePrice = product.price;
                product.quantity = 1;
                this.selectedProducts.push(product);
            }
        });
        /* PRODUCT REMOVED */
        bus.$on('removeBuy', (product)=>{
            // Flag contains the index or error flag
            var flag = false;
            console.log('flag b4 is: ' + flag);
            //Check where is the product
            for(let i = 0; i < this.selectedProducts.length; i++){
                var element = this.selectedProducts[i];
                if(element.id == product.id){
                    flag = i;
                    console.log('flag is in: ' + flag);
                    break;
                }
            }
            console.log('flag after is: ' + flag);
            //runs only if flag has found index
            if(flag !== false){
                var element = this.selectedProducts[flag];
                if(element.quantity >=2 ){
                    element.quantity -= 1;
                    element.prePrice -= product.price;
                    element.prePrice = Number((element.prePrice).toFixed(1));
                    Vue.set(this.selectedProducts, flag, element);
                }else{
                    this.selectedProducts.splice(flag,1);
                }
            }else{
                console.error('something is not right');
            }
            flag=false;
        });
  },
  computed: {
      totalPrice: function(){
          var total = 0;
          if(this.selectedProducts.length > 0){
              for(let i = 0; i < this.selectedProducts.length; i++){
                  total += this.selectedProducts[i].prePrice;
              }
          }
          return Number((total).toFixed(1));
      }
  }
}
</script>

<style>

</style>
