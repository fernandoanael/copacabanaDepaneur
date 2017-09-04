<template>
  <div class="_f-container _f-productspreview-padding">
    <h3 class="_f-productspreview-header-margin">
        Latests Orders  
        <span class="_f-float-right ">      
        <a href="http://localhost:3000/orders" class="btn btn-outline-dark _f-bold">
            View All
        </a>
        <a href="http://localhost:3000/orders/create/new" class="btn btn-outline-dark _f-bold">
            New
        </a>
        </span>
    </h3>
    <table class="table table-hover">
        <tbody>
            <tr v-for="order in orders" >
                <td>{{order.date}}</td>
                <td>x{{order.units}}</td>
                <td>${{order.totalPrice}}</td>
            </tr>
        </tbody>
    </table> 
  </div>
</template>

<script>
export default {
  data: function(){
      return {
          orders: []
      }
  },
  created: function(){
        axios.get('http://localhost:3000/api/latestsOrders')
        .then((response) => {
            this.orders = response.data;
        })
        .catch((e) => {
            console.error(e);
        });
  }
}
</script>

<style>

</style>
