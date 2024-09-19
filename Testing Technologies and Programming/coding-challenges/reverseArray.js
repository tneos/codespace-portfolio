// Reverse an array
const reverseArray = function (arr) {
  const reverseArr = [];
  while (arr.length > 0) {
    reverseArr.push(arr.pop());
  }

  console.log(reverseArr);
};
