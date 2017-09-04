<template>
  <div class="_f-container _f-productspreview-padding">
      <h3>Sells Report</h3>
      <hr>
      <div class="row">
          <div class="col-6">
              <p>
                  Units Sold: <span class="_f-float-right"> {{unitsSold}} </span>
              </p>
              <p>
                  Units in Stock: <span class="_f-float-right"> {{unistsInStock}} </span>
              </p>
          </div>
          <div class="col-6 _f-border-left">
              <p>
                  Earned: <span class="_f-float-right"> {{earned}} </span>
              </p>
              <p>
                  Cost: <span class="_f-float-right"> {{cost}} </span>
              </p>
              <p class="font-weight-bold">
                  Profit: <span class="_f-float-right"> {{profit}} </span>
              </p>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  data : function(){
      return {
          unitsSold: 0,
          unistsInStock: 0,
          earned: 0,
          cost: 0,
          profit: 0
      }
  },
  created: function(){
      axios.get('http://localhost:3000/api/sellsReport')
           .then((response) => {
               this.unitsSold = response.data.sold;
               this.unistsInStock = response.data.inStock;
               this.earned = response.data.earned;
               this.cost = response.data.cost;
               this.profit = response.data.profit;
           })
           .catch((e) => {
               console.error(e);
           });
  }
}
</script>

<style>

</style>
