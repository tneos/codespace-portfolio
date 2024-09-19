// Find most expensive item
const mostExpensiveItem = function (array) {
  let totalPrice = 0;

  // Find and save higher cost
  array.forEach(item => {
    totalPrice < item.stock * item.price ? (totalPrice = item.stock * item.price) : totalPrice;
  });

  // Find item in array with the higher cost
  let mostExpensive = array.find(item => item.stock * item.price === totalPrice);

  console.log(mostExpensive);
};
