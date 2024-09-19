// Reverse a string
const reverseString = function (string) {
  const strArray = string.split("");

  const reverseArr = [];

  while (strArray.length > 0) {
    reverseArr.push(strArray.pop());
  }

  console.log(reverseArr.toString().replaceAll(",", ""));
};
