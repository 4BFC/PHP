//================ 서버와 데이터 처리를 위한 소스/부품 ===
let hidden_text = document.querySelector(".hidden_text");//hidden_text는 현재 type이 숨겨져 있기 때문에 보이지 않는다.
let hidden_num = document.querySelector(".hidden_num");
let btn = document.querySelector(".btn");

let random = Math.floor(Math.random() * 10);
let random_text = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j']
let addBtn = (e) => btn.addEventListener("click", () => {
  hidden_text.value = random_text[random];
  hidden_num.value = random;
  console.log("After : " + hidden_text.value);
  e.preventDefault();
})

// ===================실제 서버와 데이터 처리===========
fetch('button.php').then(() => addBtn());
console.log("Before : " + hidden_text.value);
console.log(random);

//페이지가 전환이 되면서 해당 button의 콜백함수가 실행이 되지 않는다. 즉, 이전 페이지에서 수행을 하고 바뀐 페이지에서는 해당 log가 찍히지 않는 다는 것을 알 수 있다. 여기서 우리는 POST와 같은  data전송을 해줘야한다. 이로 ajax를 이용해야 한다.
// button.addEventListener("submit", () => {
//   fetch(newURL, {
//     method: "POST"
//   }).then(response => {
//     if (response.status === 200) {
//       console.log("SUCCESSFULLY!");
//     } else {
//       console.error("ERROR!");
//     }
//   })
//     .catch(error => {
//       console.error(error.message);
//     })
//   console.log("Check this btn");
// })